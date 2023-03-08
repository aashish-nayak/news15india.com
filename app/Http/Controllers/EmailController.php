<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
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
        $this->setCookie('CLIENT_USERNAME',$request->username);
        $this->setCookie('CLIENT_PASSWORD',$request->password);
        session()->flash('success','Email Client Loggedin');
        return redirect()->route('admin.emailbox.index');
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
                $messages = $currentFolder->messages()->all()->limit($limit = 10, $page = 1)->get();
            }else{
                $readMessage = $currentFolder->query()->getMessageByUid(request()->message);
                $readMessage->setFlag('Seen');
            }
            return view('backpanel.emailbox.index',compact('folders','messages','readMessage','mode','box'));
            
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return view('backpanel.emailbox.index',['error'=>$e->getMessage()]);
        }
    }
}
