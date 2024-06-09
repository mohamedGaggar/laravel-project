<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Resources\orderResource;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//     public function index()
//     {

//         // $post1=Post::with()->get();
//         try{
//          $posts=Post::with('createdBy','comments.user')->get();
//          $data=[];

//          foreach($posts as $post){
//             $newPost=[];

//             $newPost['title']=$post['tilte'];
//             $newPost['content']=$post['content'];
//             $newPost['attatchment']=$post['attatchment'];


//             array_push($data,$newPost);
//          }
//         //  return response($posts);
// return response()->json(['data'=>$data]);
//      }catch(\Exception $e){
// return response(['error'=>'server error, update the page'],500);
//      }

//     // return response()->json(['posts'=>$posts]);







//     }






public function index()
{



     $posts=Post::with('createdBy','comments.user')->get();






// return response()->json(['posts'=>$posts]);

return orderResource::collection($posts);



}















    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $post=post::find($id);



        try {
    if($post){

        return response(['singlePost'=>$post,'success'=>'data shared successfully']);
    } else{


        throw new \Exception('post not to be found');
    }
    //code...
} catch (\Throwable $error) {
    //throw $th;
    return response()->json(['error'=> $error->getMessage()],404);
}
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
