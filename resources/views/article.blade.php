@extends('template.home')
@section('home-content')
<h1 align="center">nos articles</h1>
    @foreach ($articleList as $article)
        @if ($article->publish === 1)
            <div class="d-inline-flex m-3">                
                <div class="card shadow" style="width: 18rem;">
                    <a href="{{route('show',['id'=>$article->id])}}">
                        <img src="{{$article->photo}}" class="card-img-top" alt="{{$article->title}}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{Str::limit($article->description, '30')}}</p>
                    </div>
                </div>                
            </div>
        @endif
    @endforeach    
@endsection