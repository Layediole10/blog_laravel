@extends('template.user')
@section('title', "Login")
@section('content')
    <div class="container m-5">
        <div class="card mx-auto shadow" style="width: 25rem;">
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                      <h4>{{session('error')}}</h4> 
                    </div>
                @endif
                @if(session()->has('alertSuccess'))
                <div class="alert alert-success">
                    <h4>{{session()->get('alertSuccess')}}</h4>
                </div>
                @endif

                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection

