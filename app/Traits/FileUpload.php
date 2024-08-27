<?php

namespace App\Traits;

use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    public function fileUpload($request, $path, $file)
    {
        $image = null;

        if ($request->file($file)) {
            $image = $request->file($file);
            $image->storeAs($path, $image->hashName());
        }
        return $image;
    }

}
