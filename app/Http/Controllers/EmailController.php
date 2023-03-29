<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Webklex\IMAP\Facades\Client;
class EmailController extends Controller
{

    public function clientLogin()
    {
        if(auth('admin')->user()->imap_username != null && auth('admin')->user()->imap_password != null){
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
            Admin::findOrFail(auth('admin')->id())->update([
                'imap_username' => $request->username,
                'imap_password' => $request->password
            ]);
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
            $client->username = auth('admin')->user()->imap_username;
            $client->password = auth('admin')->user()->imap_password;
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
                'from'       => array('address' => auth('admin')->user()->imap_username, 'name' => auth('admin')->user()->name),
                'encryption' => 'tls',
                'username'   => auth('admin')->user()->imap_username,
                'password'   => auth('admin')->user()->imap_password,
            );
            Config::set('mail', $config);
            $client = Client::account('default');
            $client->username = auth('admin')->user()->imap_username;
            $client->password = auth('admin')->user()->imap_password;
            $client->connect();
            $view = view('backpanel.emailbox.mail-template',['data'=>$request->all()])->render();
            $date = date('D, d M Y H:i:s');
            $message = "From: ".auth('admin')->user()->imap_username."\r\n"
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
        if(auth('admin')->user()->imap_username == null || auth('admin')->user()->imap_password == null){
            return redirect()->route('admin.emailbox.login');
        }
        try {
            $attachment_mask = \Webklex\PHPIMAP\Support\Masks\AttachmentMask::class;
            $mode = request()->mode ?? 'list';
            $box = request()->mbox ?? 'INBOX';
            $messages = [];
            $readMessage = '';
            $client = Client::account('default');
            $client->username = auth('admin')->user()->imap_username;
            $client->password = auth('admin')->user()->imap_password;
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
