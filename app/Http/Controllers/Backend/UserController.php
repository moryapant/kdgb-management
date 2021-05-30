<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Rules\Password;
//use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
   public function UserView() {

    //dd("hello");

    $data['allData'] = User::all();

    return view('backend.user.view_user', $data);
    
   }

   public function UserAdd() {

    //dd("hello");

    //$data['allData'] = User::all();

    return view('backend.user.add_user');
    
   }

   public function UserStore(Request $request) {

    $validateData = $request->validate([
        'name' => 'required|min:6|max:30',
        'email' => 'required|unique:users',
        'password' => 'required|confirmed|min:6',
        'role' => 'required',
    ]);

    $data = new User();

    $data->name = $request->name;
    $data->email = $request->email;
    $data->password = bcrypt($request->password);
    $data->role = $request->role;
    
    $data->save();

    $notification = array (
        'message' => 'User Added Successfully',
        'alert-type'=> 'success'
    );

    return  redirect()->route('users.view')->with($notification);

    //$data['allData'] = User::all();

  
    
   }

   public function UserUpdate(Request $request,$id) {

    $data = User::find($id);

    return view('backend.user.edit_user',compact('data'));

    //$data['allData'] = User::all();

  
   }

   public function UserChange(Request $request,$id) {

    $validateData = $request->validate([
        'name' => 'required|min:6|max:30',
        'email' => 'required',
        // 'password' => 'required|confirmed|min:6',
       
    ]);
    $data = User::find($id);
    $data->name = $request->name;
    $data->email = $request->email;
    //$data->password = bcrypt($request->password);
    $data->role = $request->role;
    
    $data->save();

    $notification = array (
        'message' => 'User Updated Successfully',
        'alert-type'=> 'success'
    );

    return  redirect()->route('users.view')->with($notification);

   }

   public function UserDelete($id) {

    //dd("hello");

    //$data['allData'] = User::all();
    $data = User::find($id);
    $data->delete();

    $notification = array (
        'message' => 'User Deleted Successfully',
        'alert-type'=> 'error'
    );

    return  redirect()->route('users.view')->with($notification);
    
   }


}
