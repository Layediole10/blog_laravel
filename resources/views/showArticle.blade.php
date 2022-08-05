
@extends('template.home')

@section("home-content")
<main class="col-md-9 m-auto col-lg-10 w-100">
  

{{-- <div class="container mx-5"> --}}
    <div align="center" class="text-left w-50 m-5 shadow d-inline-flex">
        <div>
            @if ($showArticle->photo)
                @if (Str::contains($showArticle->photo, 'https://'))
                <a href="{{route('show', ['id'=>$showArticle->id])}}">
                    <img src="{{$showArticle->photo}}" alt="{{$showArticle->title}}" width="100%">
                </a>    
                    @else
                    <a href="{{route('show', ['id'=>$showArticle->id])}}">
                        <img src="{{asset('storage/'.$showArticle->photo)}}" alt="{{$showArticle->title}}" width="100%">
                    </a>
                @endif
                @else
                <a href="{{route('show', ['id'=>$showArticle->id])}}">
                    <img src="{{asset('storage/img/default-image.png')}}" alt="{{$showArticle->title}}" width="100%">
                </a>
            @endif
        </div>
        <div class="card-body p-2">
            <div>
                <h3 class="card-title ">{{$showArticle->title}}</h3>
                <p class="card-text">{{$showArticle->description}}</p>
                <p><em>Published : {{$showArticle->publish_date}}</em></p>
            </div>
              
              {{-- <p><em>{{$showArticle->author->first_name.' '.$showArticle->author->last_name}}</em></p> --}}
           
        </div>

    </div>
{{-- </div> --}}

<div align="center">
    <a href="{{route('home')}}" style="font-weight: bolder"><i class="fa fa-arrow-left" aria-hidden="true"></i>HOME</a>
</div>  
</main>

@endsection