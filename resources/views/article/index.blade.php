<x-layout>
    <div class="container">
        <div class="row">
            @foreach($articles as $article)
            <div class="col-12 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h4 class="card-title">{{$article->title}}</h4>
                      <h3 class="card-title">{{$article->subtitle}}</h3>
                      <p class="card-text"><strong>{{$article->category->name}}</strong></p>
                      <p class="card-text">Pubblicato il {{$article->created_at->format('d/m/y')}} da {{$article->user->name}}</p>
                      <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Leggi qui</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>