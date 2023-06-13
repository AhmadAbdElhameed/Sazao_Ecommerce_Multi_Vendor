<?php

namespace App\Http\Traits;
use App\Http\Requests\Admin\Slider\StoreSliderRequest;
use App\Http\Requests\Admin\Slider\UpdateSliderRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

trait ImageUploadTrait
{
    public function uploadImage(Request $request , $inputName , $path){
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
//            $imageName = rand() . '_' . $image->getClientOriginalName();
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid() .'.'. $ext;
            $image->move(public_path($path),$imageName);

            return $path . '/' . $imageName;
        }
    }

    public function updateImage(UpdateSliderRequest $request , $inputName , $path , $oldPath = null){
        if ($request->hasFile($oldPath)) {
            $image = $request->{$oldPath};
//            $imageName = rand() . '_' . $image->getClientOriginalName();
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid() .'.'. $ext;
            $image->move(public_path($path),$imageName);

            return $path . '/' . $imageName;
        }
    }
}
