<x-layout>
<div class="container">
    <div class="row">
        <div class="col-12 justify-content-center">
            <h1>Bentornato, Amministratore</h1>
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
            <h2>Richieste per ruolo amministratore:</h2>
            <x-requests-table :roleRequests="$adminRequests" role="Amministratore"></x-requests-table>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Richiesta per ruolo revisore:</h2>
            <x-requests-table :roleRequests="$revisorRequests" role="Revisore"></x-requests-table>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Richiesta per ruolo redattore:</h2>
            <x-requests-table :roleRequests="$writerRequests" role="Redattore"></x-requests-table>
        </div>
    </div>
</div>
</x-layout>