<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

protected $fillable=['title','content','attatchment','created_by'];


public function createdBy(){
    return $this->belongsTo(user::class,'created_by');
}


public function comments(){

    return $this->hasMany(Comment::class);
}


}



