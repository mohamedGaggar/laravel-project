@extends('app_layout')



@section('content')

<section class="container">
    <h1>register</h1>

@if(Session::has('success'))
    <p class="alert alert-success">
{{Session::get('success')}}

    </p>
    @endif






    @if(Session::has('error'))
    <p class="alert alert-danger">
{{Session::get('error')}}

    </p>
    @endif



    <form action="/profile/update" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
    <div class="mb-3">
    <label for="name" class="form-label">name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="" aria-describedby="emailHelp" name="name" value="{{old('name',$user->name)}}">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

@error('name')
<p class="invalid-feedback">{{$message}}</p>
@enderror


  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email',$user->email)}}">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

@error('email')
<p>{{$message}}</p>
@enderror


  </div>

<div class="mb-3">
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
@error('image')
<p>{{$message}}</p>
@enderror
</div>

  <button type="submit" class="btn btn-primary">update</button>
</form>
</section>






@endsection
