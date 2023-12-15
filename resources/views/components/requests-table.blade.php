<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequests as $user)
        <tr>
            <td scope="row">{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @switch($role)
                    @case('Amministratore')
                        <a href="{{route('admin.setAdmin', compact('user'))}}">Attiva {{$role}}</a>
                        @break
                    @case('Revisore')
                        <a href="{{route('admin.setRevisor', compact('user'))}}">Attiva {{$role}}</a>
                        @break
                    @case('Redattore')
                    <a href="{{route('admin.setWriter', compact('user'))}}">Attiva {{$role}}</a>        
                    @break
                @endswitch
            </td>
        </tr>
        @endforeach
    </tbody>
</table>    