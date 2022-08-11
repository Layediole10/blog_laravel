
@extends('template.user')

@section("content")
<main class="container col-md-9 mx-auto col-lg-10 w-100">
  

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
                <div class="text-end">
                    <p><small><em>Published : {{$showArticle->publish_date}}</em></small></p>
                    <p><small><em>Author : {{$showArticle->author->first_name.' '.$showArticle->author->last_name}}</em></small></p>
                </div>
                
                    <div class="text-start">
                            
                        <form action="{{route('articles.like')}}" id="form-js" class="d-inline-flex mx-2">
                        
                            <div id="count-js">{{$showArticle->likes->count()}}</div>
                            <input type="hidden" name="article-id" value="{{$showArticle->id}}" id="article-id-js">
                            <button type="submit" style="border-style: none">                            
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                
            </div>
              
              {{-- <p><em>{{$showArticle->author->first_name.' '.$showArticle->author->last_name}}</em></p> --}}
           
        </div>

    </div>

    <div class="container text-left w-50 m-2">
        <h6>Commentaires</h6>
    
        <form action="{{route('comments.store',['id'=>$showArticle->id])}}" method="post">
            @csrf
            <div class="row my-2 p-2">
                <div class="col">
                    <div class="form-group pb-1">
                        <input type="text" class="form-control" name="first_name" placeholder="first name">
                    </div>
                    <div class="form-group pb-1">
                        <input type="text" class="form-control" name="last_name" placeholder="last name">
                    </div>
                    <div class="form-group pb-1">
                        <input type="email" class="form-control" name="email" placeholder="email">
                    </div>
                </div>
            </div>
    
            <div class="row my-2">
                <div class="form-floating">
                    <textarea class="form-control" name="message" placeholder="Leave a comment here"></textarea>                            
                </div>
                <div class="form-group pb-1">
                    <input type="hidden" class="form-control" name="article_id" placeholder="last name" value={{$showArticle->id}}>
                </div>
            </div>
    
            <button class="btn btn-md btn-primary"> <i class="bi bi-plus-circle"></i> Save</button>
        </form>

        <div class="container mt-3 ">
            @foreach ($comments as $comment)
                <div class="mb-5 bg-white p-3 rounded-sm text-left w-75 shadow">
                    <div class="flex">
                        {{-- Avatar --}}
                        <div class="mr-3 flex flex-col justify-center">
                            <div class="d-inline-flex">
                                <?php
                                    $parts    = explode(' ', $comment->first_name.' '.$comment->last_name );
                                    $initials = strtoupper($parts[0][0] . $parts[count($parts) - 1][0]);
                                    // print_r($parts);
                                ?>

                                <span class="badge rounded-pill text-bg-secondary p-2">{{ $initials }}</span>
                                <h6 class="mx-2">{{ $comment->first_name.' '.$comment->last_name }}</h6>
                            </div>
                        </div>
                        {{-- Avatar --}}

                        <div class="flex flex-col justify-center">
                            
                            <small class="text-gray-600"><em>{{ $comment->created_at}}</em></small>
                        </div>
                    </div>

                    <div class="mt-2">
                        <p>{{ $comment->message }}</p>
                    </div> 

                </div>    
                    
            @endforeach
        </div>
        
    </div>
{{-- </div> --}}

<div align="center">
    <a href="{{route('home')}}" style="font-weight: bolder"><i class="fa fa-arrow-left" aria-hidden="true"></i>HOME</a>
</div>  
</main>

@endsection