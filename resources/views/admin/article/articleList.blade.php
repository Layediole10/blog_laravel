@extends('template.admin')
@section('content')
    @foreach ($posts as $post)

        <img src="{{$post->photo}}" alt="image">
        <h3>{{$post->title}}</h3>
        <p>{{$post->description}}</p>
        
    @endforeach
@endsection