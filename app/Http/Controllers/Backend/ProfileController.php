<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function ProfileView () {

        $yourid = Auth::user()->id;
        $user = User::find($yourid);
        

        return view('backend.user.profile.view', compact('user'));

    }

    public function ProfileEdit () {


        $yourid = Auth::user()->id;
        $user = User::find($yourid);
        //return view('backend.user.profile.edit');
        return view('backend.user.profile.edit', compact('user'));
    }

    public function ProfileUpdate (Request $request) {

        $data = User::find(Auth::user()->id);

             $validateData = $request->validate([
            'name' => 'required|min:6|max:30',
            'email' => 'required',
            'address' => 'min:5|max:50',
            'mobile' => 'required|digits:10',
            'dob' => 'required',
            'gender' => 'required'
        
           
        ]);

             
    
    $data->name = $request->name;
    $data->email = $request->email;
    //$data->password = bcrypt($request->password);
    $data->mobile = $request->mobile;
    $data->address = $request->address;
    $data->dob = $request->dob;
    $data->gender = $request->gender;

    if($request->file('image')) {

     $file = $request->file('image');
        @unlink(public_path('upload/user_image/' .$data->image));
        $filename = date('ymdhi').$file->getClientOriginalName();
        $file->move(public_path('upload/user_image'), $filename);
        $data['image'] = $filename;
    }

    $data->save();

    $notification = array (
        'message' => 'profile Updated Successfully',
        'alert-type'=> 'success'
    );

    return  redirect()->route('profile.view')->with($notification);

        
    }


    public function PasswordView () {
        $yourid = Auth::user()->id;
        $user = User::find($yourid);
        return view('backend.user.edit_password', compact('user'));
    }

    public function passwordChange (Request $request) {
       
        $data = User::find(Auth::user()->id);

        $validateData = $request->validate([
        'password' => 'required|confirmed|min:6',
      
   ]);
       
    
    
        $data = User::find($data->id);
        $data->password = bcrypt($request->password);
        $data->save();
       // Auth::logout();
       
    $notification = array (
        'message' => 'Password Updated Successfully',
        'alert-type'=> 'success'
    );

    return  redirect()->route('profile.view')->with($notification);
    }
}
