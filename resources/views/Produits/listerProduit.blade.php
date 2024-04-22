@extends('layout.nav')
@section('content')

<div class="row">
    @foreach($produits as $produit)
    <div class="col-md-4 mb-4">
        <div class="card">
           
                <h5 class="card-title">{{ $produit->nom_produit }}</h5>
                <!-- Prix du produit -->
                <p class="card-text">Prix: {{ $produit->prix }} €</p>
                 <!-- Image du produit -->
            <img src="{{ asset('images/' . $produit->image) }}" class="card-img-top" alt="{{ $produit->nom_produit }}">
            <div class="card-body">
                <!-- Titre du produit -->
                <!-- Description du produit -->
                <p class="card-text">{{ $produit->description }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <!-- Autres attributs du produit -->
                <li class="list-group-item">Quantité en stock: {{ $produit->qte_en_stock }}</li>
                <!-- Ajoutez d'autres attributs du produit ici si nécessaire -->
            </ul>
            <div class="card-body">
                <!-- Liens supplémentaires si nécessaire -->
                <a href="#" class="btn btn-danger">Supprimer</a>
                <a href="" class="btn btn-info">MODIFIER</a>

            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
