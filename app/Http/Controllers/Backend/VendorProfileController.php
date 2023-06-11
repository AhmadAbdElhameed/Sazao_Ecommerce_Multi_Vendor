<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\Profile\UpdatePasswordRequest;
use App\Http\Requests\Vendor\Profile\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VendorProfileController extends Controller
{
    public function index(){
        return view('vendor.dashboard.profile');
    }

    public function update(updateProfileRequest $request){
        $user = Auth::user();

        if ($request->hasFile('image')){
            if (File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/vendor/profile'),$imageName);
            $path = '/uploads/vendor/profile/'.$imageName;
            $user->image = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        toastr()->success('Vendor Profile Updated Successfully');
//        toast('Profile updated successfully','success');
        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordRequest $request){

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Vendor Password has been updated successfully!');
        return redirect()->back();
    }
}
