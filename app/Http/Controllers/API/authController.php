<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class authController extends Controller
{
    function register(Request $request){

$validData=$request->validate(['name'=>'required|string',
'email'=>'required|email',
'password'=>'required|string',
    ]);



$validData['password']= Hash::make($validData['password']);

$data=user::create($validData);




return response()->json(['data'=>$data,'message'=>'user is registered successfully']);


}


    function login(request $request){

$data=$request->validate(['email'=>'required|email',

'password'=>'required|string',

    ]);



 if (auth::attempt($data)){

$token= $request->user()->createToken('api-token')->plainTextToken;


return response()->json(['success'=>true,'message'=>'login succcessfully','token'=>$token]);

 }else {
    return response()->json(['success'=>'failed','error'=>'invalid email and password']);
 }






    }


}
