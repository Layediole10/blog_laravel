
  <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @auth
          <li class="nav-item">
              @if (Auth::user()->photo)
                @if (Str::contains(Auth::user()->photo, 'https://'))
                  <a href="#" class="nav-link active">
                      <img src="{{Auth::user()->photo}}" alt="" width="32" height="32" class="rounded-circle me-2">
                      <strong>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</strong>
                  </a>    
                    @else
                      <a href="#" class="nav-link active">
                        <img src="{{asset('storage/'.Auth::user()->photo)}}" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</strong>
                      </a>
                @endif
                @else
                  <a href="#" class="nav-link active">
                    <img src="{{asset('storage/img/default-image.png')}}" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</strong>
                  </a>
              @endif
          </li>
          @endauth
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>

          @auth

            <li class="nav-item">
              <a class="nav-link" href="/admin/articles">Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/">Dashbord</a>
            </li>  
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
  </nav>