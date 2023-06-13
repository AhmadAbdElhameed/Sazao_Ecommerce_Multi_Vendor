<?php

namespace App\Http\Traits;
use App\Http\Requests\Admin\Slider\StoreSliderRequest;
use Illuminate\Support\Facades\File;
trait ImageUploadTrait
{
    public function uploadImage(StoreSliderRequest $request , $inputName , $path){
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
//            $imageName = rand() . '_' . $image->getClientOriginalName();
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid() .'.'. $ext;
            $image->move(public_path($path),$imageName);

            return $path . '/' . $imageName;
        }
    }
}
