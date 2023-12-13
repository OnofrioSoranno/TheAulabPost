<x-layout>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 text-center">
                <h1>CREA L'ARTICOLO</h1>
            </div>
            <div class="col-md-6 col-12 mt-3">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Titolo:</label>
                      <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                      </div>
                    <div class="mb-3">
                      <label for="subtitle" class="form-label">Sottotitolo:</label>
                      <input type="text" name="subtitle" class="form-control" id="subtitle">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagini</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria:</label>
                        <select name="category" id="category">
                            <option>---</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>    
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo:</label>
                        <textarea name="body" id="body" cols="70" rows="7"></textarea>
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-info text-white">Inserisci un articolo</button>
                        <a class="btn btn-info text-white" href="{{route('home')}}">Torna alla Home</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</x-layout>