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
            <li class="py-1 px-2">
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="p-0 btn linkNav">Logout</button>
              </form>
            </li>
            <li class="py-1 px-2">
              @if (Auth::user() && Auth::user()->is_revisor)
                  <a class="linkNav btn p-0" href="{{route('revisor.dashboard')}}">Dashboard Revisore</a>
              @endif
            </li>
            <li class="px-2">
              @if (Auth::user() && Auth::user()->is_admin)
                  <a href="{{route('admin.dashboard')}}" class="btn linkNav p-0">Dashboard Admin</a>
              @endif
            </li>
            @if (Auth::user() && Auth::user()->is_writer)
            <li class="py-1 px-2">
              <a class="linkNav btn p-0" href="{{route('writer.dashboard')}}">Dashboard Scrittore</a>
            </li>
            <li class="px-2">
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