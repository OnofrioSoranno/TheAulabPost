<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="text-center">{{$user->name}}</h1>
                <h2 class="text-center mt-4">ARTICOLI PUBBLICATI:</h2>
            </div>
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 mt-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h4 class="card-title">{{$article->title}}</h4>
                          <h3 class="card-title">{{$article->subtitle}}</h3>
                          <a href="{{route('article.byCategory', ['category' => $article->category->id])}}"><p class="card-text">{{$article->category->name}}</p></a>
                          <p class="card-text">Pubblicato il {{$article->created_at->format('d/m/y')}}</p>
                          <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Leggi qui</a>
                        </div>
                      </div>
                    </div>
             @endforeach
        </div>
    </div>
</x-layout>