<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Webklex\IMAP\Facades\Client;
class EmailController extends Controller
{
    public function setCookie($key,$value,$time = 120)
    {
        Cookie::queue($key, $value, $time);
  
        return response()->json(['Cookie set successfully.']);
    }

    public function getCookie($key)
    {
        return Cookie::get($key);
    }

    public function deleteCookie(...$keys)
    {
        foreach ($keys as $key => $value) {
            Cookie::forget($value);
        }
  
    }

    public function clientLogin()
    {
        if($this->getCookie('CLIENT_USERNAME') != null && $this->getCookie('CLIENT_PASSWORD') != null){
            return redirect()->route('admin.emailbox.index');
        }
        return view('backpanel.emailbox.login');
    }

    public function login(Request $request)
    {
        try {
            $client = Client::account('default');
            $client->username = $request->username;
            $client->password = $request->password;
            $client->connect();
            $this->setCookie('CLIENT_USERNAME',$request->username);
            $this->setCookie('CLIENT_PASSWORD',$request->password);
            session()->flash('success','Email Client Loggedin');
            return redirect()->route('admin.emailbox.index');
        } catch (\Exception $e) {
            session()->flash('error','Credentials does not match!');
            return redirect()->back();
        }
    }
    
    public function trash(Request $request)
    {
        try {
            $client = Client::account('default');
            $client->username = $this->getCookie('CLIENT_USERNAME');
            $client->password = $this->getCookie('CLIENT_PASSWORD');
            $client->connect();
            $currentFolder = $client->getFolderByPath($request->folder);
            $ids = (is_array($request->email_uids)) ? $request->email_uids : [$request->email_uids];
            $messages = $currentFolder->query()->whereUidIn($ids)->get();
            foreach ($messages as $key => $message) {
                if($request->folder != "INBOX.Trash"){
                    $message->move('INBOX.Trash');
                }else{
                    $message->delete();
                }
            }
            $status = "success";
            $message = "Emails Moved to Trash";
        } catch (\Exception $e) {
            $status = "error";
            $message = $e->getMessage();
        }
        if(!$request->ajax()){
            $request->session()->flash($status,$message);
            return redirect()->route('admin.emailbox.index');
        }
        return response()->json(['status'=>$status,'message'=>$message]);
    }

    public function compose(Request $request)
    {
        try {
            $config = array(
                'driver'     => 'smtp',
                'host'       => "smtp.hostinger.com",
                'port'       => "587",
                'from'       => array('address' => $this->getCookie('CLIENT_USERNAME'), 'name' => auth('admin')->user()->name),
                'encryption' => 'tls',
                'username'   => $this->getCookie('CLIENT_USERNAME'),
                'password'   => $this->getCookie('CLIENT_PASSWORD'),
            );
            Config::set('mail', $config);
            $client = Client::account('default');
            $client->username = $this->getCookie('CLIENT_USERNAME');
            $client->password = $this->getCookie('CLIENT_PASSWORD');
            $client->connect();
            $view = view('backpanel.emailbox.mail-template',['data'=>$request->all()])->render();
            $date = date('D, d M Y H:i:s');
            $message = "From: ".$this->getCookie('CLIENT_USERNAME')."\r\n"
                    ."To: $request->mailto\r\n"
                    ."Subject: $request->subject\r\n"
                    ."Date: $date\r\n"
                    ."Content-Type: text/html\r\n"
                    . "\r\n"
                    ."$view\r\n";
            if($request->submit == 'send'){
                Mail::send('backpanel.emailbox.mail-template',['data'=>$request->all()], function($message) use($request) {
                    $message->to($request->mailto);
                    $message->subject($request->subject);
                });
                $folder = $client->getFolderByPath('INBOX.Sent');
                $folder->appendMessage($message,['\\Seen']);
                $request->session()->flash('success','E-Mail Sent!');
            }else{
                $folder = $client->getFolderByPath('INBOX.Drafts');
                $folder->appendMessage($message,['\\Seen']);
                $request->session()->flash('success','E-Mail Saved to Draft!');
            }
        } catch (\Exception $e) {
            $request->session()->flash('error',$e->getMessage());
        }
        return redirect()->back();

    }

    public function index()
    {
        if($this->getCookie('CLIENT_USERNAME') == null || $this->getCookie('CLIENT_PASSWORD') == null){
            return redirect()->route('admin.emailbox.login');
        }
        try {
            $attachment_mask = \Webklex\PHPIMAP\Support\Masks\AttachmentMask::class;
            $mode = request()->mode ?? 'list';
            $box = request()->mbox ?? 'INBOX';
            $messages = [];
            $readMessage = '';
            $client = Client::account('default');
            $client->username = $this->getCookie('CLIENT_USERNAME');
            $client->password = $this->getCookie('CLIENT_PASSWORD');
            $client->connect();
            $client->setDefaultAttachmentMask($attachment_mask);
            $folders = $client->getFolders();
            $currentFolder = $client->getFolderByPath($box);
            if($mode == 'list'){
                $messages = $currentFolder->messages()->all()->setFetchBody(false)->paginate(10);
            }else{
                $readMessage = $currentFolder->query()->getMessageByUid(request()->message);
                $readMessage->setFlag('Seen');
            }
            return view('backpanel.emailbox.index',compact('folders','messages','readMessage','mode','box'));
            // dd($messages->toArray());
            // return view('backpanel.emailbox.index',compact('messages','readMessage','mode','box'));
            
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return view('backpanel.emailbox.index',['error'=>$e->getMessage()]);
        }
    }
}
