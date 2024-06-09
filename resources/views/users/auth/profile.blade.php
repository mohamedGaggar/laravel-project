@extends('app_layout')



@section('title')
<title>profile</title>
@endsection



@section('content')

<section class="container">

<h1>account</h1>
<fieldset>
<div>
    <p>profile photo:</p>

    @if ($user->image)
    <img src="{{asset($user->image)}}" alt="user profile" style="width:100px">

    @else
    <img src="{{asset('storage/images/profleImage.png')}}" alt="default profile" style="width:100px">
    @endif



    <p>profile name:</p> {{$user->name}}

    <p>profile email:</p> {{$user->email}}


</div>

<a class="link link-primary" href="/profile/edit">EDIT Profile</a>
</fieldset>
</section>


@endsection
