<x-layout>
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <h1 class="text-center">{{$category->name}}</h1>
        </div>
        @forelse($articles as $article)
        <div class="col-12 col-md-4 mt-3">
            <div class="card" style="width: 18rem;">
                <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title">{{$article->title}}</h4>
                  <h3 class="card-title">{{$article->subtitle}}</h3>
                  <p class="card-text">Pubblicato il {{$article->created_at->format('d/m/y')}} da <a href="{{route('article.byUser', ['user' => $article->user->id])}}">{{$article->user->name}}</a></p>
                  <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Leggi qui</a>
                </div>
              </div>
            </div>
        @empty
            <div class="col-12 text-center mt-5">
                <h1>NON CI SONO ANNUNCI DA VISUALIZZARE</h1>
            </div>
         @endforelse

    </div>
</div>
</x-layout>