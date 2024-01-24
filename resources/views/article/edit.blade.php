<x-layout>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center">Modifica un articolo</h1>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-6">
            <form action="{{route('article.update', compact('article'))}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="title" class="form-label">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}">
                </div>
                <div class="mb-3">
                  <label for="subtitle" class="form-label">Sottotitolo</label>
                  <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{$article->subtitle}}">
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">Immagine:</label>
                  <input type="file" name="image" class="form-control" id="image">
                </div>
                <div class="mb-3">
                  <label for="category" class="form-label">Categoria:</label>
                  <select name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if($article->category && $category->id && $article->category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="body" class="form-label">Corpo del testo:</label>
                  <textarea name="body" id="body" cols="50" rows="7">{{$article->body}}</textarea>
                </div>
                <div class="mb-3">
                  <label for="tags" class="form-label"></label>
                  <input type="tags" name="tags" class="form-control" id="tags" value="{{$article->tags->implode('name', ', ')}}">
                  <span class="fst-italic small">Dopo ogni tag inserire una virgola </span>
                </div>
                <hr>
                <div class="mt-3 justify-content-around d-flex">
                    <button type="submit" class="btn btn-primary">Inserisci un articolo</button>
                    <a href="{{route('home')}}" class="btn btn-outline-primary">Torna alla home</a>
                </div>
              </form>
        </div>
    </div>
</div>
</x-layout>