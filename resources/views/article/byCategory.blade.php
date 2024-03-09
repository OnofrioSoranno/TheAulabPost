<x-layout2>
    <div class="container mt-5 pt-5">
        <div class="row rowIndex justify-content-center">
            <h1 class="titleCategory text-center">{{$category->name}}</h1>
            @forelse($articles as $article)
            <div class="col-12 col-md-6 col-lg-5 col-xl-3 mt-3">
                <div class="card cardCustom m-3" >
                    {{-- <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="{{$article->title}}"> --}}
                    <img src="https://picsum.photos/20{{$article->id}}" class="card-img-top" alt="{{$article->title}}">
                    <div class="card-body">
                      <h3 class="card-title">{{$article->title}}</h3>
                      <h4 class="card-title">{{$article->subtitle}}</h4>
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
            @empty
                <div class="col-12 noArticle text-center">
                    <h2>NON CI SONO ANNUNCI DA VISUALIZZARE</h2>
                </div>
             @endforelse       
        </div>
    </div>
</x-layout2>