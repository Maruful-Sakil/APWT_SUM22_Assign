<h1>{{Session::get('msg')}}</h1>
@extends('layouts.main')
@section('content')
    <form method="post" action="">
        {{@csrf_field()}}
        Email: <input type="text" name="email" placeholder="Email"><br>
        @error('email')
            {{$message}} <br>
        @enderror
        Password: <input type="password" name="password" placeholder="password" ><br>
        @error('password')
            {{$message}}<br>
        @enderror
        <input type="submit" value="Login">
    </form>
@endsection