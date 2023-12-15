
    <table class="table border table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Titolo</th>
                <th>Sottotitolo</th>
                <th>Redattore</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <th scope="row">{{$article->id}}</th>
                    <td>{{$article->title}}</td>
                    <td>{{$article->subtitle}}</td>
                    <td>{{$article->user->name}}</td>
                    <td>
                        @if (is_null($article->is_accepted))
                            <a class="btn btn-info text-white" href="{{route('article.show', compact('article'))}}">Leggi l'articolo</a>
                        @else
                            <a class="btn btn-info text-white" href="{{route('revisor.undo', compact('article'))}}">Riporta in revisione</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

