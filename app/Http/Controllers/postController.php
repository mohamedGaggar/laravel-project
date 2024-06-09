<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=post::get();

return view('posts.index',['posts'=>$posts]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create',['post'=>null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

     $user=auth()->user();

     $data=   $request->validate(['title'=>'required|string',
        'content'=>'required|string',
        'attatchment'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

if ($request->file('attatchment')) {

    $attatch=$request->file('attatchment');
    $path=$attatch->move('attatchment',time().".".$attatch->extension());

$data['attatchment']=$path;

}




$data['created_by']=$user->id;
   post::create($data);


   return back()->with('success','post created successfully');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post=post::find($id);
        return view('posts.create',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user=auth()->user();

        $data=   $request->validate(['title'=>'required|string',
           'content'=>'required|string',
           'attatchment'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
       ]);

   if ($request->file('attatchment')) {

       $attatch=$request->file('attatchment');
       $path=$attatch->storeAs('attatchment',time().".".$attatch->extension());

   $data['attatchment']=$path;

   }




   $data['created_by']=$user->id;
      post::find($id)->update($data);


      return back()->with('success','post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */


     public function destroy(Request $request, $id)
     {
         // Find the post
         $post = Post::findOrFail($id);

         // Delete the post
         $post->delete();

         // Redirect back or to any other route after deletion
         return back();
     }





}
