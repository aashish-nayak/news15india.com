<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function create(Request $request)
    {
        try {
            $request->validate([
                'file.*' => 'required|mimes:jpeg,png,jpg,pdf,ppt, pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg|max:51200',
            ]);
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
            $media = Media::latest()->paginate(12);
            $view = ($request->view == 'list') ? 'backpanel.media.media-list' : 'backpanel.media.media-grid';
            return view($view, compact('media'))->render();
        }
    }
    public function update(Request $request)
    {   
        try {
            $media = Media::find($request->id);
            $file = explode(".", $request->filename)[0] . "." . pathinfo($media->filename, PATHINFO_EXTENSION);
            if (Storage::exists('public/media/' . $media->filename) && $media->filename != $file) {
                Storage::move("public/media/" . $media->filename, "public/media/" . $file);
            }
            $media->filename = $file;
            $media->alt = $request->alt_name;
            $media->save();
            return response()->json(["status"=>"success", $media, "message" => "File updated successfully"]);
        } catch (\Throwable $th) {
            return response()->json(["status"=>"error", "message" => $th->getMessage()]);
        }
    }
    public function destroy($id)
    {
        $media = Media::find($id);
        if (Storage::exists('public/media/' . $media->filename)) {
            Storage::delete('public/media/' . $media->filename);
        }
        $media->delete();
        return redirect()->back()->with('success', 'Media deleted successfully');
    }
    public function bulkDelete(Request $request)
    {   try{
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
