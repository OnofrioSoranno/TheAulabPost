<x-layout>
    {{-- MESSAGGIO --}}
            @if (session('message'))
            <div class="alert alert-success mt-5">
                {{ session('message') }}
            </div>
            @endif

            {{-- INIZIO HEADER  --}}
            <header class="container-fluid headerCustom">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-12 d-flex h-100 justify-content-center align-items-center flex-column">
                        <h1>THE AULAB POST</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, eum?</p>
                    </div>
                </div>
            </header>
            {{-- FINE HEADER  --}}

            {{-- CARD ARTICOLI --}}
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-5">
                        <h3 class="text-center">ULTIMI ARTICOLI</h3>
                    </div>
                    @foreach ($articles as $article)
                    <div class="col-12 col-md-4 mt-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h4 class="card-title">{{$article->title}}</h4>
                              <h3 class="card-title">{{$article->subtitle}}</h3>
                              <a href="{{route('article.byCategory', ['category' => $article->category->id])}}"><p class="card-text">{{$article->category->name}}</p></a>
                              <p class="card-text">Pubblicato il {{$article->created_at->format('d/m/y')}} da <a href="{{route('article.byUser', ['user' => $article->user->id])}}">{{$article->user->name}}</a></p>
                              <p class="small fst-italic text-capitalize">
                                @foreach ($article->tags as $tag)
                                    #{{$tag->name}}
                                @endforeach
                            </p>  
                              <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Leggi qui</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- FINE CARD ARTICOLO --}}

            <a href="{{route('careers')}}">lavora con noi</a>
            <div class="container vh-100">prova</div>

</x-layout>