<?php

namespace App\Traits;

trait HasImage
{
    public function uploadImage($request, $path)
    {
        $image = null;

        if($request->file('pp')){
            $image = $request->file('pp');
            $image->storeAs($path, $image->hashName());
        }

        return $image;
    }
}