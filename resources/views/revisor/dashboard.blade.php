<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Bentornato Revisore</h1>
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
               <h2>Articoli da revisionare:</h2>
               <x-articles-table :articles="$unrevisionedArticles"></x-articles-table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Articoli pubblicati:</h2>
                <x-articles-table :articles="$acceptedArticles"></x-articles-table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Articoli rifiutati:</h2>
                <x-articles-table :articles="$rejectedArticles"></x-articles-table>
            </div>
        </div>
    </div>
</x-layout>