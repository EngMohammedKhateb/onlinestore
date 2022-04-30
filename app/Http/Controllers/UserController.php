<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showUsers(){
        return view('admin.users.index');
    }

    public function profile(){
        return view('admin.users.profile');
    }

    public function changeTheme($theme){

        $user=auth()->user();
        $user->theme=$theme.'.css';
        $user->save();
        return redirect()->back();
    }

    public function updateProfile(Request $request){
        $user=auth()->user();



        $request->validate(['name'=>'required|string|max:255']);

        if($request->has('password') && !empty($request->password)){
            $request->validate([ 'password'=>'required|string|min:8']);
            $user->password=Hash::make($request->password);
        }

        if($request->hasFile('image')) {
            $request->validate(['image' => 'required|image|mimes:png,jpg,jpeg']);
            $image = $request->image;
            $image_name = time() . $image->getClientOriginalName();
            $image->move('profiles/', $image_name);
            $image = 'profiles/' . $image_name;
            $user->image = $image;
        }

        $user->name=$request->name;
        $user->save();

        toastr()->success('Your profile Updated Successfully');
        return view('admin.users.profile');
    }

    public function createUsers(){
        $roles=Role::all();
        return view('admin.users.create')->with('roles',$roles);
    }

    public function store(Request $request){


        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|string|min:8',
            'role_id'=>'required',
        ]);

        $user =new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->role_id=$request->role_id;
        $user->type=$request->type;
        $user->save();
        toastr()->success('new user created successfully');

        return redirect()->route('admin.users.index');
    }





}
