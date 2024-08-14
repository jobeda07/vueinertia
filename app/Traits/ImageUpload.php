<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait ImageUpload {
    public function imageUpload(UploadedFile $fieldName, int $width, int $height, string $directory = 'images/')
    {
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()) . '.' . $fieldName->getClientOriginalExtension();
        $img = $manager->read($fieldName);
        $img = $img->resize($width, $height);
        if (!File::exists(public_path($directory))) {
            File::makeDirectory(public_path($directory), 0777, true);
        }
        $img->save(public_path($directory . $name_gen));
        return $name_gen;
    }

    public function deleteOne($directory, $filename)
    {
        $filePath = public_path($directory . DIRECTORY_SEPARATOR . $filename);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    }




}
