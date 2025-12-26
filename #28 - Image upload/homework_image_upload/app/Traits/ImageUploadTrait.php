<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

trait ImageUploadTrait{
    public function uploadImage($file,$dest){
        $name = uniqid().".webp";
        $gd = new Driver();
        $manager = new ImageManager($gd);
        $image = $manager->read($file)->toWebp(90);
        if(Auth::user()->avatar !== null)
            Storage::disk('public')->delete("$dest".Auth::user()->avatar);
        Storage::disk('public')->put("$dest".$name,(string) $image);

        return $name;
    }
}