@extends('app_layout')

<!-- TITLE -->
@section('title')
<title>home</title>

@endsection



<!-- CONTENT -->

@section('content')

<section class="container">
    <h1> posts</h1>


<a class="" href="/posts/create"><i class="fa-solid fa-plus"></i></a>

@foreach ($posts as $post)

<div class="card" style="width: 18rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h1>{{$post->createdBy->name}}</h1>
    <h5 class="card-title m-auto my-5" style="width:500px;">{{$post->title}}</h5>
    <p class="card-text">{{$post->content}}</p>



@if ($post->attatchment)
<img src="{{asset($post->attatchment)}}" alt="attatchment image" style="width:150px">


@endif







</div>

@if ($post->created_by == auth()->user()->id)

<div>

<a href="/posts/{{$post->id}}/edit" class="btn btn-info">edit</a>
<a href="/posts/{{$post->id}}/delete" class="btn btn-danger">Delete</a>
</div>

@endif



@endforeach







</section>
@endsection
