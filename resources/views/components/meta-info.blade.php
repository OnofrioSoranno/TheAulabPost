<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nuovo tag</th>
            <th scope="col">Q.ta</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{$metaInfo->id}}</th>
                <td>{{$metaInfo->name}}</td>
                <td>{{count($metaInfo->articles)}}</td>
                @if($metaInfo == "tags")
                <td>
                    <form action="{{route('admin.editTag', ['tag' => $metaInfo])}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="text" name="name" placeholder="Nuovo nome" class="form-control w-50 d-inline">
                        <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('admin.deleteTag', ['tag' => $metaInfo])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submut" class="btn btn-danger text-white">ELIMINA</button>
                    </form>
                </td>
                @endif  
            </tr>
        @endforeach
    </tbody>
</table>