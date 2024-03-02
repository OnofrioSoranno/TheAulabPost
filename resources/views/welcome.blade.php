<x-layout>
    {{-- MESSAGGIO --}}
    
    {{-- INIZIO HEADER  --}}
    <header class="container-fluid headerCustom ">
        <div class="row h-100 justify-content-center align-items-center">
            @if (session('message'))
            <div class="alert alert-success mt-5">
                {{ session('message') }}
            </div>
            @endif
            <div class="col-12 d-flex h-100 justify-content-center align-items-center flex-column">
                        <h1 class="mt-5 pt-5">THE AULAB POST</h1>
                        <p class="color-s fs-3 playFair">"La notizia che conta, ora e sempre"</p>
                    </div>
                </div>
            </header>
            {{-- FINE HEADER  --}}

            {{-- CARD ARTICOLI --}}
            <div class="container cardContainer my-md-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 mt-5 ">
                        <h3 class="text-center playFair display-3 color-s">ULTIME NOTIZIE</h3>
                    </div>
                    @foreach ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-5 col-xl-3 mt-3">
                        <div class="card cardCustom m-3" >
                            {{-- <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="{{$article->title}}"> --}}
                            <img src="https://picsum.photos/20{{$article->id}}" class="card-img-top" alt="{{$article->title}}">
                            <div class="card-body">
                              <h3 class="card-title">{{$article->title}}</h3>
                              <h4 class="card-title">{{$article->subtitle}}</h4>
                              <div class="d-flex justify-content-center">
                                  <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="btn category linkCard">{{$article->category->name}}
                                    </a>

                              </div>
                                  <p class="tag">
                                    @foreach ($article->tags as $tag)
                                        #{{$tag->name}}
                                    @endforeach
                                </p>
                                    <p class="card-text dateCard">Pubblicato il {{$article->created_at->format('d/m/y')}} da <a class="userCard linkCard btn" href="{{route('article.byUser', ['user' => $article->user->id])}}">{{$article->user->name}}</a></p>
                                
                                    <div class="d-flex justify-content-center">
                                          <a  href="{{route('article.show', compact('article'))}}" class="btn buttonCard">Leggi qui
                                          </a>
                                </div>  
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- FINE CARD ARTICOLO --}}


            <a href="{{route('careers')}}">lavora con noi</a>

          
        
</x-layout>

