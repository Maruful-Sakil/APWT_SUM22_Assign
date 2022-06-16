@extends('layouts.main')
@section('content')
        <h1>Dashboard</h1>
        <h2>Welcome Mr/Ms {{$user->name}}</h2>
        <a href="{{route('logout')}}">Logout</a>
@endsection