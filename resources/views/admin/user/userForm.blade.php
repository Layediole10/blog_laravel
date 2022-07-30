@extends('template.admin')
@section('title', "user form")
@section('content')
    <div class="container w-25">
        <form action="{{route('users.store')}}"  method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">role</label>
                <input type="text" class="form-control" name="role">
            </div>
            <div class="mb-3">
                <label for="dateOfBirth" class="form-label">Date of birth</label>
                <input type="date" class="form-control" name="dateOfBirth">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">photo</label>
                <input type="text" class="form-control" name="photo">
            </div>                         
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="submit">register</button>
            </div>
        </form>
    </div>
    
@endsection