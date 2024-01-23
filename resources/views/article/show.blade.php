<x-layout>
    <div class="container">
        <div class="row ">
            <div class="col-12 mt-4">
                <h1 class="text-center">{{$article->title}}</h1>
                <p class="text-center"><a href="">{{$article->category->name}}</a></p>
                <p>Creato da {{$article->user->name}} il {{$article->created_at->format('d/m/y')}}</p>
            </div> 
            <div class="col-12 mt-5 ">
                <img class="mx-auto d-flex" src="{{Storage::url($article->image)}}" height="300" alt="">
            </div>
        </div>
            <div class="row">
                <div class="col-12 mt-5">
                    <h2>{{$article->subtitle}}</h2>
                    <p class="text-break">{{$article->body}}</p>
                </div>
                @if(Auth::user() && Auth::user()->is_revisor && $article->is_accepted == NULL)
                <div class="col-12 mb-5 mt-5 justify-content-center">
                    <a href="{{route('revisor.acceptArticle', compact('article'))}}" class="btn btn-success text-white">Accetta articolo</a>
                    <a href="{{route('revisor.reject', compact('article'))}}" class="btn btn-danger text-white">Rifiuta articolo</a>
                </div>
                @endif  
            </div>
   </div>
</x-layout>