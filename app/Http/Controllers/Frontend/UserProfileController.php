<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\updateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{
    public function index(){
        return view('frontend.dashboard.profile');
    }

    public function update(updateProfileRequest $request){
        $user = Auth::user();

        if ($request->hasFile('image')){
            if (File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/user/profile'),$imageName);
            $path = '/uploads/user/profile/'.$imageName;
            $user->image = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        toastr()->success('Profile updated successfully');
//        toast('Profile updated successfully','success');
        return redirect(route('user.profile'));    }
}
