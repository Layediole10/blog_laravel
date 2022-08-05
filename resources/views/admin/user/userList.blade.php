@extends('template.admin')
@section('title', "User")

@section("content")
<main class="col-md-9 m-auto col-lg-10 w-100">
    <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Users</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <a href="{{route("users.create")}}" class="btn btn-sm btn-outline-secondary">
          <i class="bi bi-plus-circle"></i>
            New User
        </a>
      </div>
    </div>
    <form class="d-flex mb-3 w-50" role="search" action="{{route('users.search')}}" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q" value="{{request()->q ?? ''}}">
        <button class="btn btn-outline-success" type="submit" >Search</button>
    </form>

    @if (session('alertUpdate'))
      <div class="alert alert-success">
        {{session('alertUpdate')}}
      </div>
    @endif

    @if (session('alertDelete'))
        <div class="alert alert-success">
            <h4>{{session('alertDelete')}}</h4>
        </div>
    @endif

    @if (session('state'))
      <div class="alert alert-success">
          <h4>{{session('state')}}</h4>
      </div>
    @endif

    <div class="card ">
        
      <div class="card-header">
         <h2>List of Users</h2>
        </div>
      <div class="card-body">
        {{$users->links()}}
       
        <div class="table-responsive table-bordered">
          <table class="table  table-sm">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">Date of birth</th>
                <th scope="col">Role</th>
                <th scope="col">Activate</th>
                <th scope="col">Photo</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{Str::ucfirst($user->first_name)}}</td>
              <td>{{Str::upper($user->last_name)}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->date_of_birth}}</td>
              <td>{{$user->role}}</td>
              <td>
                <div class="form-check form-switch">
                  <input class="form-check-input" onchange="if(confirm('Are you sure to change the state of this user?')){
                    document.getElementById('activate-{{$user->id}}').submit();
                    }" type="checkbox" @if ($user->activate)
                      checked
                    @endif name="activate"  role="switch" id="activate">
                </div>
                <form id="activate-{{$user->id}}" action="{{route('users.activate',['id'=>$user->id])}}" method="post">
                  @csrf
                  @method('put')
                </form> 
              </td>
              <td>
                @if ($user->photo)
                    @if (Str::contains($user->photo, 'https://'))
                    <a href="{{route('users.show', ['user'=>$user->id])}}">
                        <img src="{{$user->photo}}" alt="{{$user->first_name.' '.$user->last_name}}" width="50px">
                    </a>    
                        @else
                          <a href="{{route('users.show', ['user'=>$user->id])}}">
                            <img src="{{asset('storage/'.$user->photo)}}" alt="{{$user->first_name.' '.$user->last_name}}" width="50px">
                          </a>
                      @endif
                    @else
                      <a href="{{route('users.show', ['user'=>$user->id])}}">
                        <img src="{{asset('storage/imgUser/avatar.png')}}" alt="{{$user->first_name.' '.$user->last_name}}" width="50px">
                      </a>
                @endif
                
              </td>
              <td>
                <a href="{{route('users.edit', ['user'=>$user->id])}}" class="btn btn-success btn-sm" title="Edit"> <i class="bi bi-pencil"></i></a>               

                <a href="#" class="btn btn-danger btn-sm" title="Delete" onclick="if(confirm('Are you sure you want to delete this user?')){document.getElementById('form-{{$user->id}}').submit()}"> <i class="bi bi-trash"></i></a>

                <form id="form-{{$user->id}}" action="{{route('users.destroy', ['user'=>$user->id])}}" method="post">
                    @csrf
                    @method('delete')
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