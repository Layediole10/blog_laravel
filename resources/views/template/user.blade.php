<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Profil | @yield('profil')</title>
    
</head>
<body>
  {{-- <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @guest
          <li class="nav-item">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none mx-3">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>abdoulaye</strong>
            </a>
          </li>              
          @endguest

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>

          @auth

            <li class="nav-item">
                <a class="nav-link btn btn-danger" href="{{route('logout')}}">Logout</a>
            </li>
          @endauth
          
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
          @endguest

        </ul>
      </div>
    </div>
  </nav> --}}
  <x-navbar/>
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>