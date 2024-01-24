<x-layout>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-12">
               <h1 class="text-center">Bentornato Redattore</h1> 
            </div>
        </div>
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="row my-5 justify-content-center">
            <div class="col-12">
                <h2>Articoli in fase di revisione</h2>
                <x-writer-articles-table :articles="$unrevisionedArticles"></x-writer-articles-table>
            </div>
        </div>
        <div class="row my-5 justify-content-center">
            <div class="col-12">
                <h2>Articoli in fase di revisione</h2>
                <x-writer-articles-table :articles="$acceptedArticles"></x-writer-articles-table>
            </div>
        </div>
        <div class="row my-5 justify-content-center">
            <div class="col-12">
                <h2>Articoli in fase di revisione</h2>
                <x-writer-articles-table :articles="$rejectedArticles"></x-writer-articles-table>
            </div>
        </div>
    </div>
</x-layout>