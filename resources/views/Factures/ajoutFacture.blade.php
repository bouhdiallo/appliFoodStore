@extends('layout.navAccount')
@section('facture')

<form action="{{ route('addAccount') }}" method="POST">
    @csrf
    <fieldset>
        <legend>Légende</legend>

        <div>
            <label for="date">Date:</label>
            <input type="date" name="date" class="form-control" id="date" placeholder="Date" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="client_id">Client:</label>
            <select class="form-select" name="client_id" id="client_id">
                @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nom_client }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="produits">Produits:</label><br>
            @foreach($produits as $produit)
            <div>
                <input type="checkbox" id="produit{{ $produit->id }}" name="produits[]" value="{{ $produit->id }}">
                <label for="produit{{ $produit->id }}">{{ $produit->nom_produit }}</label><br>
                <!-- Ajouter un champ de quantité pour chaque produit -->
                <label for="quantite{{ $produit->id }}">Quantité:</label>
                <input type="number" name="quantite[{{ $produit->id }}]" id="quantite{{ $produit->id }}" value="1">
                <!-- Afficher le prix du produit -->
                <label for="prix{{ $produit->id }}">Prix: {{ $produit->prix }}</label><br>
            </div>
            @endforeach
        </div>

    </fieldset>
    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>

@endsection()
