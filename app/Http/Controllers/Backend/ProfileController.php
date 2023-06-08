<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\UpdatePasswordRequest;
use App\Http\Requests\Admin\Profile\UpdateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function update(UpdateProfile $request){

        $user = Auth::user();


        if ($request->hasFile('image')){
            if (File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'),$imageName);
            $path = '/uploads/'.$imageName;
            $user->image = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        toastr()->success('Oops! Something went wrong!');
//        toast('Profile updated successfully','success');
        return redirect(route('admin.profile'));
    }

    public function updatePassword(UpdatePasswordRequest $request){
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toast('Password updated successfully','success');
        return redirect(route('admin.profile'));
    }
}
