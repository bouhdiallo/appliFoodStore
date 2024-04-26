@extends('layout.nav')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    Liste des produits
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($produits as $produit)
    <div class="col-md-3 mb-5">
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
                <a href="deleteProduct/{{ $produit->id }}" class="btn btn-danger">Supprimer</a>
                <a href="updateProduct/{{ $produit->id }}" class="btn btn-info">MODIFIER</a>

            </div>
        </div>
    </div>
    @endforeach
                    </div>
                    {{ $produits->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection





{{-- <div class="row">
    @foreach($produits as $produit)
    <div class="col-md-2 mb-2">
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
                <a href="deleteProduct/{{ $produit->id }}" class="btn btn-danger">Supprimer</a>
                <a href="updateProduct/{{ $produit->id }}" class="btn btn-info">MODIFIER</a>

            </div>
        </div>
    </div>
    @endforeach

</div>
{{$produits->links()}}


@endsection --}}
