<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{
    public function create(Request $request)
    {
        try {
            // $request->validate();
            $validator = Validator::make($request->all(), [
                'file.*' => 'required|mimes:jpeg,png,jpg,pdf,ppt, pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg,mp3,wav|max:51200',
            ]);
            
            if ($validator->fails())
            {
                return response()->json(['status'=>'error','message'=> $validator->errors()->all()]);
            }
            foreach ($request->file as $key => $value) {
                $filename = pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $value->getClientOriginalExtension();
                $type = $value->getMimeType();
                $size = $value->getSize();
                $file = Str::limit($filename, 100, '') . '_' . time() . '.' . $extension;
                $value->storeAs('public/media', $file);
                $media = new Media;
                if($type == 'image/*'){
                    $dimension =  getimagesize($value);
                    $width = $dimension[0];
                    $height = $dimension[1];
                    $media->dimension = $width . 'x' . $height;
                }
                $media->admin_id = Auth::guard('admin')->user()->id;
                $media->filename = $file;
                $media->alt = $filename;
                $media->type = $type;
                $media->size = $size;
                $media->save();
            }
            $response = ['status'=>'success','message'=> 'Media Files Uploaded successfully!'];
        } catch (\Exception $e) {
            $response = ['status'=>'error','message'=> $e->getMessage()];
        }
        return response()->json($response);
    }

    public function fetch(Request $request)
    {   
        if ($request->ajax()) {
            // dd($request->all());
            $media = Media::query();
            if($request->filter != 'all'){
                $media->where('type','like',"$request->filter%");
            }
            if($request->sort != ''){
                $column = explode(",",$request->sort)[0];
                $sort = explode(",",$request->sort)[1];
                $media->orderBy($column,$sort);
            }
            if (auth('admin')->user()->hasRole('super-admin') == false){
                $media->where('admin_id',auth('admin')->user()->id);
            }
            $skip = $request->skip;
            $total = $media->count();
            $take = 18;
            $media = $media->offset($skip)->take($take)->get();
            $view = ($request->view == 'list') ? 'backpanel.media.media-list' : 'backpanel.media.media-grid';
            return view($view, compact('media','take','skip','total'))->render();
        }
    }
    public function update(Request $request)
    {   
        try {
            foreach ($request->filename as $key => $value) {
                $media = Media::find($key);
                $file = explode(".", $value)[0] . "." . pathinfo($media->filename, PATHINFO_EXTENSION);
                if (Storage::exists('public/media/' . $media->filename) && $media->filename != $file) {
                    Storage::move("public/media/" . $media->filename, "public/media/" . $file);
                }
                $media->filename = $file;
                $media->alt = $file;
                $media->save();
            }
            return response()->json(["status"=>"success", "message" => "File Renamed successfully"]);
        } catch (\Exception $e) {
            return response()->json(["status"=>"error", "message" => $e->getMessage()]);
        }
    }
    public function download(Request $request)
    {
        try {
            $links = explode("\r\n",$request->download);
            if(is_array($links) && count($links) > 0){
                foreach ($links as $link) {
                    $basename = pathinfo($link, PATHINFO_FILENAME);
                    $ext = pathinfo($link, PATHINFO_EXTENSION);
                    $filename = "Downloaded_".$basename.'_' . time().".".$ext;
                    $tempImage = tempnam(storage_path('app/public/temp'), $filename);
                    copy($link, $tempImage);
                    $res = response()->download($tempImage, $filename);
                    Storage::putFileAs('public/media',$res->getFile()->getPathname(),$filename);
                    $filedata = new Collection([
                        'filename' => $filename,                            // wMUktAWN0L.jpg
                        'tmp' => $res->getFile()->getPathname(),            // C:\xampp\htdocs\Aashish\Laravel Package Development\news15india.com\storage\app\public\temp\wMU20D9.tmp
                        'type' => $res->getFile()->getMimeType(),           // image/jpeg
                        'extension' => $res->getFile()->guessExtension(),   // jpg
                        'size' => $res->getFile()->getSize(),                // 400
                    ]);
                    $media = new Media;
                    $media->admin_id = Auth::guard('admin')->user()->id;
                    $media->filename = $filedata['filename'];
                    $media->alt = $filename;
                    $media->type = $filedata['type'];
                    $media->size = $filedata['size'];
                    $media->save();
                }
            }
            return response()->json(["status"=>"success", "message" => "Files Downloaded successfully"]);
        } catch (\Exception $e) {
            return response()->json(["status"=>"error", "message" => $e->getMessage()]);
        }
    }
    public function destroy(Request $request)
    {
        // dd($request->all());
        try {
            $media = Media::find($request->ids);
            foreach ($media as $key => $value) {
                if (Storage::exists('public/media/' . $value->filename)) {
                    Storage::delete('public/media/' . $value->filename);
                }
                $value->delete();
            }
            $response = ['status'=>'success','message'=> 'Media Files Deleted successfully!'];
        } catch (\Exception $e) {
            $response = ['status'=>'error','message'=> $e->getMessage()];
        }
        return response()->json($response);
    }

    public function bulkDelete(Request $request)
    {   
        try{
            $media = Media::find($request->ids);
            foreach ($media as $key => $value) {
                if (Storage::exists('public/media/' . $value->filename)) {
                    Storage::delete('public/media/' . $value->filename);
                }
                $value->delete();
            }
            return response()->json(["status"=>"success", "message" => "Files Deleted Successfully!!!"]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>"error", "message" => $th->getMessage()]);
        }
    }
}
