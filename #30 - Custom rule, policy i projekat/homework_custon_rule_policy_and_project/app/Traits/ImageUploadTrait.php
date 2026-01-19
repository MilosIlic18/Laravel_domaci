<?php

namespace App\Traits;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

trait ImageUploadTrait{
    public function uploadImage($file,$dest){
        $name = uniqid().".webp";
        $gd = new Driver();
        $manager = new ImageManager($gd);
        $image = $manager->read($file)->toWebp(90);
        Storage::disk('public')->put("$dest/".$name,(string) $image);

        return $name;
    }
}