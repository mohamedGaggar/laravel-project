<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class authController extends Controller
{
    function register(Request $request){



$request->validate(['name'=>'required|string',
'email'=>'required|email',
'password'=>'required| regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/|min:4',
'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'




    ]);

$data=$request->all();
if($request->file('image')){

    $image=$request->file('image');
    $path=$image->storeAs('public/images',time().".".$image->extension());
    $data['image']=$path;
}






    $data['password']=Hash::make($request['password']);
user::create($data);


return back()->with('success','account created successfully');
    }




function login(request $request){

   $validatedData= $request->validate(['email'=>'required|email|exists:users,email',
'password'=>'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/|min:4',]);

$remember=$request['remember'] ? true : false;


if(auth::attempt($validatedData,$remember)){
    session()->regenerate();

    return redirect('/home');
}
else {
    return back()->withInput($validatedData)->withErrors(['password'=>'invalid password']);
}
}


   public function logout(){

    auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');

   }


   public function profile(){
    $user=auth::user();
    return view('users.auth.profile',['user'=>$user]);
   }



   public function editProfile(){
 $user=auth::user();
    return view('users.auth.edit_profile',['user'=>$user]);
   }


   public function updateProfile(request $request){



    $request->validate(['name'=>'required|string',
    'email'=>'required|email',

    'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'




        ]);

    $data=$request->all();
    if($request->file('image')){

        $image=$request->file('image');
        $path=$image->move('images',time().".".$image->extension());
        $data['image']=$path;
    }







    $loginUser=auth()->user();
    $loginUser->update($data);


    return back()->with('success','account updated successfully');



   }

}
