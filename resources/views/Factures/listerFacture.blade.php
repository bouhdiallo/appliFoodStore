@extends('layout.nav')
@section('content')

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        /* Style CSS pour la facture */
        /* Définissez ici vos styles de mise en forme */
    </style> --}}
    <h1>Liste des Factures</h1>

    @foreach($factures as $facture)
        <p>Numéro de facture : {{ $facture->id }}</p> 
        <p>Date : {{ $facture->date }}</p>
        <p>Montant : {{ $facture->montant }}</p>
    
        <h2>Client</h2>
        <p>Nom : {{ $facture->client->nom_client }}</p>
        <p>Contact : {{ $facture->client->contact }}</p>
        <p>Adresse : {{ $facture->client->adress }}</p>
    
        <h2>Produits</h2>
        <ul>
            @foreach($facture->produits as $produit)
                <li>{{ $produit->nom_produit }} - {{ $produit->prix }}</li>
            @endforeach
        </ul>
        <li class="fa fa-download"></li>
        <a href="" class="btn btn-secondary">Imprimer</a>

        <hr> <!-- Ajoute une ligne de séparation entre chaque facture -->
    @endforeach
    






{{-- 
    <body>
        <h1>Facture</h1>
        @foreach($factures as $facture)
        <p>Numéro de facture : {{ $facture->id }}</p> 
        <p>Date : {{ $facture->date }}</p>
        <p>Montant : {{ $facture->montant }}</p>

        <h2>Client</h2>
        <p>Nom : {{ $facture->client->nom_client }}</p>
        <p>Contact : {{ $facture->client->contact }}</p>
        <p>Adresse : {{ $facture->client->adress }}</p>
    
        <h2>Détails de la facture</h2>

          
    
        {{-- <p>Total : {{ $factures->total }}</p> --}}
    
    
    </body>
</html>
@endsection()