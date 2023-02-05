<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webklex\IMAP\Facades\Client;

class EmailController extends Controller
{
    public function index()
    {
        try {
            $attachment_mask = \Webklex\PHPIMAP\Support\Masks\AttachmentMask::class;
            $mode = request()->mode ?? 'list';
            $box = request()->mbox ?? 'INBOX';
            $messages = [];
            $readMessage = '';
            $client = Client::account('default');
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
            dd($e->getMessage());
        }
    }
}
