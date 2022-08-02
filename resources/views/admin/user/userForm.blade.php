@extends('template.admin')
@section('title', "user form")
@section('content')
    <div class="container w-25">



        @if(session()->has('errorRegister'))
            <div class="alert alert-success">
                <h4>{{session()->get('errorRegister')}}</h4>
            </div>
        @endif




        <form action="{{route('users.store')}}"  method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label @error('first_name') is-invalid @enderror">First name</label>
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label @error('last_name') is-invalid @enderror">Last name</label>
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                <input type="password" class="form-control" name="password">

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
                <input type="date" class="form-control" name="dateOfBirth" value="{{ old('dateOfBirth') }}">
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