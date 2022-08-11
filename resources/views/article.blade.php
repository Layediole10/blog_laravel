@extends('template.user')
@section('content')
<h1 align="center">nos articles</h1>

    <div class="d-flex align-content-stretch flex-wrap">
        @foreach ($articleList as $article)
            @if ($article->publish === 1)
                <div class="m-3">                
                    <div class="card" style="width: 18rem;">
                        <a href="{{route('show',['id'=>$article->id])}}">
                            <img src="{{$article->photo}}" class="card-img-top" alt="{{$article->title}}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{Str::limit($article->description, '30')}}</p>
                        </div>

                        <div>
                            
                            <form action="{{route('articles.like')}}" id="form-js" class="d-inline-flex mx-2">
                            
                                <div id="count-js">{{$article->likes->count()}}</div>
                                <input type="hidden" name="article-id" value="{{$article->id}}" id="article-id-js">
                                <button type="submit" style="border-style: none">                            
                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                        
                    </div>                
                </div>
                
            @endif
        @endforeach
    </div>
        
@endsection