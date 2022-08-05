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
    <form class="d-flex mb-3 w-50" role="search" action="{{route('articles.search')}}" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q" value="{{request()->q ?? ''}}">
        <button class="btn btn-outline-success" type="submit" >Search</button>
    </form>

    @if (session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif

    @if (session('successDelete'))
        <div class="alert alert-success">
            <h4>{{session('successDelete')}}</h4>
        </div>
    @endif

    <div class="card ">
        
      <div class="card-header">
         <h2>List of Articles</h2>
        </div>
      <div class="card-body">
        {{$result->links()}}
       
        <div class="table-responsive table-bordered">
          <table class="table  table-sm">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Id_author</th>
                <th scope="col">Publish Date</th>
                <th scope="col">Published</th>
                <th scope="col">Photo</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($result as $article)
            <tr>
              <td>{{$article->id}}</td>
              <td>{{$article->title}}</td>
              <td>{{ Str::limit($article->description,'30') }}</td>
              <td>{{$article->id_author}}</td>
              <td>{{$article->publish_date}}</td>
              <td>{{$article->publish}}</td>
              <td>
                @if ($article->photo)
                    @if (Str::contains($article->photo, 'https://'))
                        <img src="{{$article->photo}}" alt="{{$article->title}}" width="50px">
                        @else
                            <img src="{{asset('storage/'.$article->photo)}}" alt="{{$article->title}}" width="50px">
                    @endif
                    @else
                        <img src="{{asset('storage/img/default-image.png')}}" alt="{{$article->title}}" width="50px">
                    
                @endif
                
              </td>
              <td>
                <a href="{{route('articles.edit', ['article'=>$article->id])}}" class="btn btn-success btn-sm" title="Edit"> <i class="bi bi-pencil"></i></a>               

                <a href="#" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure you want to delete this article?')){document.getElementById('form-{{$article->id}}').submit()}"> <i class="bi bi-trash"></i></a>

                <form id="form-{{$article->id}}" action="{{route('articles.destroy', ['article'=>$article->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                </form>
              </td>
            </tr>
            @endforeach
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
</main>
@endsection