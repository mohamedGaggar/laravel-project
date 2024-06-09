@extends('app_layout')

<!-- TITLE -->
@section('title')
<title>create post</title>

@endsection



<!-- CONTENT FOR CREATE------------------ -->
@section('content')

<h1 style="margin-left: 30px;margin-top:30px"> {{!empty($post)?'update' : 'create new'}} post</h1>
@if(Session::has('success'))
<p class="alert alert-success">{{Session::get('success')}}</p>
@endif

@if(Session::has('error'))

<p class="alert alert-danger">{{Session::get('error')}}</p>

@endif

<!----------------- create form --------------->

@php

$action=!empty($post) ? '/posts/'.$post->id.'/update' : '/posts';
@endphp





<form action="{{$action}}" method="post" enctype="multipart/form-data">
    @csrf

@if ($post)
@method('put')

@endif


  <div class="mb-3" style="width:500px;margin-left:50px">
    <label for="exampleInputEmail1" class="form-label">title</label>
    <input type="title" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp" value="{{old('title',!empty($post)?$post->title:'')}}" name="title">


@error('title')
<p class="alert alert-danger">{{$message}}</p>
@enderror

</div>
  <div class="mb-3" style="width: 700px;margin-left: 50px;">
    <label for="exampleInputPassword1" class="form-label">content</label>
    <textarea class="form-control @error('content') is-invaid @enderror" id="content" name="content" rows="10" value="">
    {{old('content',!empty($post)? $post->content:'')}}

</textarea>


@error('content')
<p class="alert alert-danger">{{$message}}</p>

@enderror










</div>


 <!-- attatchment -->

<div class="mb-3" style="width: 700px;margin-left: 50px;">
    <label for="exampleInputPassword1" class="form-label">attatchment</label>
  <input type="file" name="attatchment" class="form-control @error('attatchment') is-invaid @enderror">

@error('attatchment')
<p class="alert alert-danger">{{$message}}</p>

@enderror










</div>












  <button type="submit" class="btn btn-primary" style="margin-left: 100px;">{{!empty($post)?'update' : 'publish'}}</button>
</form>













@endsection
