@extends('template.admin')
@section('title', "Users")
@section('content')
    @foreach ($users as $user)

        <h3>{{$user->name}}</h3>
        <img src="{{$user->photo}}" alt="image">
        
    @endforeach
@endsection