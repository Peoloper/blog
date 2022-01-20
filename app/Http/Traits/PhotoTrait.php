<?php

namespace App\Http\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

trait PhotoTrait
{

    public function uploadImage($image, $folder)
    {
        $extension = $image->getClientOriginalExtension();
        $originalName = $image->getClientOriginalName();
        $originalName = sha1($originalName.time());
        $date = Carbon::now()->format('Y-m-d');

        $fileName = $date.'_'.uniqid().'_'.$originalName.'.'.$extension;

        $path = $image->storeAs($folder, $fileName, 'public');

        return $path;
    }


    public function deleteImage($model)
    {
        foreach ($model->photos as $photo)
        {
            Storage::disk('public')->delete($photo->path);
        }
    }
}
