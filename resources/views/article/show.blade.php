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
            </div>
   </div>
</x-layout>