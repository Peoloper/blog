<?php

namespace App\Http\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait PhotoTrait
{

    public function uploadImage($image, $folder, $width, $height)
    {
        $extension = $image->getClientOriginalExtension();
        $originalName = $image->getClientOriginalName();
        $originalName = sha1($originalName . time());
        $date = Carbon::now()->format('Y-m-d');
        $fileName = $date . '_' . uniqid() . '_' . $originalName . '.' . $extension;

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize($width, $height);

        $image_resize->save(public_path('images/'.$folder .'/'.$fileName));

        $path = $folder.'/'.$fileName;

        return $path;
    }


    public function deleteImage($model, $folder)
    {
        foreach ($model->photos as $photo)
        {
            $file_name = basename($photo->path);
            $test = public_path().'/images/'.$folder.'/'.$file_name;
            File::delete($test);
        }
    }
}
