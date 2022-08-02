@extends('template.admin')
@section('title', "Articles")

@section("content")
<main class="col-md-9 m-auto col-lg-10 w-100">
    <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Articles</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <a href="{{route("articles.create")}}" class="btn btn-sm btn-outline-secondary">
          <i class="bi bi-plus-circle"></i>
            New Article
        </a>
      </div>
    </div>

          <div class="card text-left w-50 mx-auto shadow">
            @if ($showArticle->photo)
                @if (Str::contains($showArticle->photo, 'https://'))
                <a href="{{route('articles.show', ['article'=>$showArticle->id])}}">
                    <img src="{{$showArticle->photo}}" alt="{{$showArticle->title}}" width="100%">
                </a>    
                    @else
                    <a href="{{route('articles.show', ['article'=>$showArticle->id])}}">
                        <img src="{{asset('storage/'.$showArticle->photo)}}" alt="{{$showArticle->title}}" width="100%">
                    </a>
                @endif
                @else
                <a href="{{route('articles.show', ['article'=>$showArticle->id])}}">
                    <img src="{{asset('storage/img/default-image.png')}}" alt="{{$showArticle->title}}" width="100%">
                </a>
            @endif
            <div class="card-body p-2">
              <h3 class="card-title ">{{$showArticle->title}}</h3>
              <p class="card-text">
                {{$showArticle->description}}
              </p>
              {{-- <p>
                  <strong>Published</strong> <input type="checkbox" @if ($article->published)
                      checked
                  @endif>
              </p> --}}
            </div>
          </div>
 
</main>
@endsection