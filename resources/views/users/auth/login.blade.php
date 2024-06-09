@extends('app_layout')
@section('title')
<title>user login</title>
@endsection

@section('content')

<h1>login</h1>
@if(Session::has('success'))
<p class="alert alert-success">{{Session::get('success')}}</p>
@endif

@if(Session::has('error'))

<p class="alert alert-danger">{{Session::get('error')}}</p>

@endif

<form action="/login" method="post">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}" name="email">


@error('email')
<p class="alert alert-danger">{{$message}}</p>
@enderror

</div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control @error('password') is-invaid @enderror" id="exampleInputPassword1" value="{{old('password')}}" name="password">

@error('password')
<p class="alert alert-danger">{{$message}}</p>

@enderror





<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
    <label class="form-check-label" for="exampleCheck1">remember</label>
  </div>






</div>

  <button type="submit" class="btn btn-primary">login</button>
</form>




@endsection
