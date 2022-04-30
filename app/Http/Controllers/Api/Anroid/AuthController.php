<?php

namespace App\Http\Controllers\Api\Anroid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class AuthController extends Controller
{

    public function login(Request $request){
        $validator = validator()->make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>true,'message' => 'the email or password is wrong.'], 400);
        }
        $credentials=$request->only('email','password');
        Arr::add($credentials,'block',0);
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error'=>true,'message' => 'the email or password is wrong.'], 400);
        }
        return $this->createNewToken($token);
    }

    public function createAccount(Request $request){

        $validator = validator()->make($request->all(),[
            'email' => 'required|string|email|unique:users',
            'name'=> 'required|string|max:25',
            'password'=>'required|string|min:8',
        ]);
        if($validator->fails()){
            return response()->json(['message' => $validator->errors()->first() ],400);
        }
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->role_id=2;
        $user->save();
        $credentials=$request->only('email','password');
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['message' => 'the email or password is wrong.'], 400);
        }
        return $this->createNewToken($token);
    }

    protected function createNewToken($token){

        return response()->json([
            'error'=>false,
            'access_token' => $token,
            'user' => auth('api')->user()
        ],200);
    }


    public function logout(){
        auth('api')->logout();
        return response()->json('good luck',200);
    }


}
