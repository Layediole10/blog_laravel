@extends('template.admin')
@section('title', "user form")
@section('content')
    <div class="container w-25">



        @if(session()->has('alaertUpdate'))
            <div class="alert alert-success">
                <h4>{{session()->get('alaertUpdate')}}</h4>
            </div>
        @endif




        <form action="{{route('users.update',['user'=>$userEdit->id])}}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="first_name" class="form-label @error('first_name') is-invalid @enderror">First name</label>
                <input type="text" class="form-control" name="first_name" value="{{$userEdit->first_name}}">

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label @error('last_name') is-invalid @enderror">Last name</label>
                <input type="text" class="form-control" name="last_name" value="{{$userEdit->last_name}}">

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                <input type="email" class="form-control" name="email" value="{{$userEdit->email}}">

                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                <input type="password" class="form-control" name="password" value="{{$userEdit->password}}">

                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label @error('password_confirmation') is-invalid @enderror">Password confirmation</label>
                <input type="password" class="form-control" name="password_confirmation">

                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dateOfBirth" class="form-label @error('dateOfBirth') is-invalid @enderror">Date of birth</label>
                <input type="date" class="form-control" name="dateOfBirth" value="{{$userEdit->date_of_birth}}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">photo</label>
                <input type="file" class="form-control" name="photo">
            </div>                         
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="submit">register</button>
            </div>
        </form>
    </div>
    
@endsection