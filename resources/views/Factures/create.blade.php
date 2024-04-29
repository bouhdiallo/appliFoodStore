@extends('layout.navAccount')
@section('facture')

    <div class="container">
        <h1>Ajouter une facture</h1>
        <form action="{{ route('factures.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="number" step="0.01" class="form-control" id="montant" name="montant" required>
            </div>
            <div class="form-group">
                <label for="client_id">Client</label>
                <select class="form-control" id="client_id" name="client_id" required>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="produits">Produits</label>
                <select multiple class="form-control" id="produits" name="produits[]" required>
                    @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
