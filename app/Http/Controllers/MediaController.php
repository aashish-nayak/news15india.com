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
        $request->validate([
            'file' => 'required|max:2048',
        ]);
        foreach ($request->file as $key => $value) {
            $filename = pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $value->getClientOriginalExtension();
            $type = $value->getMimeType();
            $size = $value->getSize();
            $dimension = getimagesize($value);
            $width = $dimension[0];
            $height = $dimension[1];
            $file = Str::limit($filename, 100, '') . '_' . time() . '.' . $extension;
            $value->storeAs('public/media', $file);
            $media = new Media;
            $media->admin_id = Auth::guard('admin')->user()->id;
            $media->filename = $file;
            $media->alt = $filename;
            $media->type = $type;
            $media->size = $size;
            $media->dimension = $width . 'x' . $height;
            $media->save();
        }
        $request->session()->flash('success', 'Media Files Uploaded successfully!');
        return redirect()->back();
    }

    public function index()
    {
        $media = Media::latest()->paginate(12);
        return view("backpanel.media.media", compact('media'));
    }
    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $media = Media::latest()->paginate(12);
            return view('backpanel.media.media-paginate', compact('media'))->render();
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
