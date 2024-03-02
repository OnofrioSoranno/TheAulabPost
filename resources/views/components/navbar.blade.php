{{-- <nav class="navbar navbar-expand-lg navbar-light fixed-top color-p">
    <a class="navbar-brand me-auto" href="{{route('home')}}">The Aulab Post</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('create')}}">Crea un articolo</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('article.index')}}">Tutti gli articoli</a>
        </li>
        <li class="nav-item active">
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorie
            </button>
            <ul class="dropdown-menu">
              @foreach ($categories as $category)
                  <li><p><a class="btn btn-outline-white" href="{{route('article.byCategory', compact('category'))}}">{{$category->name}}</a></p></li>
              @endforeach
            </ul>
          </div>
        </li>
        @guest
        <li class="nav-item active">
            <a class="nav-link" href="{{route('register')}}">Registrati</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('login')}}">Accedi</a>
        </li>
        @endguest
        @auth
        <li class="nav-item active">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ciao {{Auth::user()->name}}
                </button>
                <ul class="dropdown-menu">
                  <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <li><button>Logout</button></p></li>
                  </form>
                  @if(Auth::user()->is_admin)
                    <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard admin</a></li>
                  @elseif(Auth::user()->is_revisor)
                    <li><a class="dropdown-item" href="{{route('revisor.dashboard')}}">Dashboard revisore</a></li>
                  @elseif(Auth::user()->is_writer)
                  <li><a class="dropdown-item" href="{{route('writer.dashboard')}}">Dashboard Writer</a></li>
                  @endif
                </ul>
            </div>
        </li>
        @endauth
      </ul>
      <ul class="navbar-nav">
        <li  >
          <form class="form-inline d-flex" method="GET" action="{{route('article.search')}}">
            <input class="form-control ne-2" type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
            <button class="btn" type="submit">Search</button>
          </form>
          
        </li>
      </ul>


    </div>
    </div>  
</nav> --}}



<nav id="navBar" class="navbar navbar-expand-lg navbar-dark transition fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">AulabPost</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link linkNav active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active linkNav" href="{{route('article.index')}}">Tutti gli articoli</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active linkNav dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
          </a>
          <ul class="dropdown-menu dropDown">
            @foreach ($categories as $category)
            <li><a class="dropdown-item linkNav text-capitalize " href="{{route('article.byCategory', compact('category'))}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </li>
        @guest
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill buttonNavBar"></i>
          </a>
          <ul class="dropdown-menu dropDown">
                <li><a class="btn linkNav" href="{{route('register')}}">Registrati</a></li>
                <li><a href="{{route('login')}}" class="btn linkNav">Accedi</a></li>
              </ul>
            </li>
            @endguest
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link linkNav active dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ciao {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu dropDown">
            <li class="py-1">
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="p-0 btn linkNav">Logout</button>
              </form>
            </li>
            <li class="py-1">
              @if (Auth::user() && Auth::user()->is_revisor)
                  <a class="linkNav btn p-0" href="{{route('revisor.dashboard')}}">Dashboard Revisore</a>
              @endif
            </li>
            <li>
              @if (Auth::user() && Auth::user()->is_admin)
                  <a href="{{route('admin.dashboard')}}" class="btn linkNav p-0">Dashboard Admin</a>
              @endif
            </li>
            @if (Auth::user() && Auth::user()->is_writer)
            <li class="py-1">
              <a class="linkNav btn p-0" href="{{route('writer.dashboard')}}">Dashboard Scrittore</a>
            </li>
            <li class="py-1">
              <a class="linkNav btn p-0" href="{{route('create')}}">Crea articolo</a>
            </li>
            @endif
          </ul>
        </li>
        @endauth
      </ul>
      <form class="form-inline d-flex searchBar" method="GET" action="{{route('article.search')}}">
        <input class="ne-2" type="search" name="query">
        <button class="btn" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
</nav>