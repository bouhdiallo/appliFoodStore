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
        <a href="" class="btn btn-secondary">Imprimer</a>
@endforeach
        
<ul>
    @foreach($factures->produits as $produit)
        <li>{{ $produit->nom_produit }} - {{ $produit->prix }}</li>
    @endforeach
</ul> 
        
    
    
    </body>
</html>
@endsection()