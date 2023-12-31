<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand me-auto" href="{{route('home')}}">The Aulab Post</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
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
                  @endif
                </ul>
            </div>
        </li>
        @endauth
      </ul>

          <form class="form-inline" method="GET" action="{{route('article.search')}}">
            <input class="form-control ne-2" type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
            <button class="btn btn-outline-info" type="submit">Search</button>
          </form>

    </div>
</nav>