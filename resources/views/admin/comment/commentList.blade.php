@extends('template.admin')
@section('title', "comments")

@section("content")
<main class="col-md-9 m-auto col-lg-10 w-100">
    <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Comments</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <a href="#" class="btn btn-sm btn-outline-secondary">
          <i class="bi bi-plus-circle"></i>
            New comment
        </a>
      </div>
    </div>

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

    @if (session('state'))
      <div class="alert alert-success">
          <h4>{{session('state')}}</h4>
      </div>
    @endif

    <div class="card ">
        
      <div class="card-header">
         <h2>List of comments</h2>
        </div>
      <div class="card-body">
        
       
        <div class="table-responsive table-bordered">
          <table class="table  table-sm">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Message</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">email</th>
                <th scope="col">Article ID</th>
                {{-- <th scope="col">Likes</th>
                <th scope="col">Dislikes</th> --}}
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->message}}</td>
                        <td>{{$comment->first_name}}</td>
                        <td>{{$comment->last_name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->article_id}}</td>

                        {{-- <td>
                            <a href="{{route('comments.edit', ['comment'=>$comment->id])}}" class="btn btn-success btn-sm" title="Edit"> <i class="bi bi-pencil"></i></a>               

                            <a href="#" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure you want to delete this comment?')){document.getElementById('form-{{$comment->id}}').submit()}"> <i class="bi bi-trash"></i></a>

                            <form id="form-{{$comment->id}}" action="{{route('comments.destroy', ['comment'=>$comment->id])}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
             
            </tbody>
          </table>
        </div>
        {{$comments->links()}}
      </div>
    </div>
</main>
@endsection