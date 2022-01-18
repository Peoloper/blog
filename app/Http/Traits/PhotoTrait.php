<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait PhotoTrait
{
    public function updateImage($model, $name, $data)
    {
        $photoxd = null;

        $path = $data['image']->store($name, 'public');
        if($path)
        {

            foreach ($model->photos as $photo)
            {
                $photoxd = $photo->path;
            }

            Storage::delete($photoxd);

            $data['image'] = $path;
            $model->photos()->update(['path' => $data['image']]);
        }
    }
}
