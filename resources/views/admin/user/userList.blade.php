@extends('template.admin')
@section('content')
    @foreach ($users as $user)

        <h3>{{$user->name}}</h3>
        <img src="{{$user->photo}}" alt="image">
        
    @endforeach
@endsection