<x-layoutAuth>
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-5">ACCEDI</h1> 
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-12 rowAuth col-md-4 mt-5">
                 @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="containerButton">
                        <button type="submit" class="btn btn-primary">ACCEDI</button>     
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layoutAuth>