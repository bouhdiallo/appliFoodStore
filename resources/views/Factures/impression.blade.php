@extends('layout.navAccount')
@section('facture')

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
</head>
<body>
    <h1>Facture</h1>
    <p>Client : {{ $client->nom_client }}</p>
    <p>contact : {{ $client->contact }}</p>
    <p>Adresse : {{ $client->address }}</p>
    <hr>
    <h2>Détails du produit</h2>
    <p>Nom du produit : {{ $product->nom_produit }}</p>
    <p>Description : {{ $product->description }}</p>
    <p>Prix : {{ $product->prix }}</p>
    <p>Quantité : {{ $product->qte_en_stock }}</p>
    <hr>
    <p>Total : {{ $product->prix * $product->qte_en_stock }}</p>
</body>
</html>
@endsection()