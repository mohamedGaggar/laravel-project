<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adminLogin(request $request)
    {
        //
       $validateData= $request->validate(['email'=>'required|email|exists:admins,email',
        'password'=>'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/|min:4']);

$remember=$request['remember'] ? true : false;

if (auth::attempt($validateData,$remember)) {

session()->regenerate();

return redirect('/admin');


}

else{
    return back()->withErrors(['password'=>'password is invalid']);
}



    }








    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
      $data= post::all();
      return view('admin.admin_profile',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function deletePost($id)
    {
        $post=post::findOrFail($id);

        if (!$post) {
            return back()->with(['error'=>'post not found']);
        }

        $post->delete();


        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
