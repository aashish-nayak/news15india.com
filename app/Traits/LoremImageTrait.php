<?php 
namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

// https://picsum.photos/600/400
trait LoremImageTrait{
    public static function imageSave($filename = 'temp-image',$storeAt = 'public/media',$width = 600,$height = 400)
    {
        if(!Storage::exists('public/temp/')){
            Storage::makeDirectory('public/temp/');
        }
        $filename = $filename.'.jpg';
        $tempImage = tempnam(storage_path('app/public/temp'), $filename);
        copy('https://picsum.photos/'.$width.'/'.$height, $tempImage);
        $res = response()->download($tempImage, $filename);
        Storage::putFileAs($storeAt,$res->getFile()->getPathname(),$filename);
        $filedata = new Collection([
            'filename' => $filename,                            // wMUktAWN0L.jpg
            'tmp' => $res->getFile()->getPathname(),            // C:\xampp\htdocs\Aashish\Laravel Package Development\news15india.com\storage\app\public\temp\wMU20D9.tmp
            'type' => $res->getFile()->getMimeType(),           // image/jpeg
            'extension' => $res->getFile()->guessExtension(),   // jpg
            'size' => $res->getFile()->getSize(),               // 19031
            'dimension' => $width.'x'.$height,                  // 600x400
            'width' => $width,                                  // 600
            'height' => $height                                 // 400
        ]);
        return $filedata;
    }
}
?>