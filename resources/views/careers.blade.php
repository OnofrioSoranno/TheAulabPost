<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Lavora con noi</h1>
            </div>
            <div class="col-12">
                <h2>Lavora come amministratore</h2>
                <p>Cosa farai: Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, ut.</p>
                <h2>Lavora come revisore</h2>
                <p>Cosa farai: Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis, ut.</p>
                <h2>Lavora come redattore</h2>
                <p>Cosa farai: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, dignissimos?</p>
            </div>
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('careersSubmit')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
                        <select name="role" id="role">
                            <option value="">Scegli qui</option>
                            <option value="admin">Amministratore</option>
                            <option value="revisor">Revisore</option>
                            <option value="writer">Redattore</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{old('email') ?? Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Parlaci di te:</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control">{{old('message')}}</textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-info text-white">Invia la candidatura</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>