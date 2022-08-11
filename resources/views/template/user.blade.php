<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>@yield('home')</title>
</head>
<body>
  <x-navbar/>
  <header>
    <img src="{{asset('storage/imgUser/welcome1.jpg')}}" alt="welcome" width="100%">
    <hr>
  </header>

  
  <div class="container-fluid">
    <div class="row">
      {{-- <h1>Bienvenu!</h1> --}}
      <div class="col">
        @yield('content')
      </div>
      <hr>
      <footer>
        <p align="center">
            Blog made by FS-08
        </p>
    </footer>
    </div>
  </div>

      <!-- JavaScript Bundle with Popper -->
    <script src="{{asset('js/like.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/b03bd27677.js"></script>
</body>
</html>