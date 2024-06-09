<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {




        try {
            $user=user::get();

    return response(['userName'=>$user,'successs'=>' user data shared successfully']);

} catch (\Exception $e) {
    return response(['success'=>'false','error'=>'server error'],500);
}

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //


        try {
    $singleUser=user::find($id);


return response(['user'=>$singleUser,'success'=>'true']);

} catch (\Exception $e) {
    return response(['error'=>'server faild'],500);
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
