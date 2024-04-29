@extends('layout.navAccount')
@section('facture')
    <h1>Liste des Factures</h1>
    @foreach($factures as $facture)
        <p>Numéro de facture : {{ $facture->id }}</p> 
        <p>Date : {{ $facture->date }}</p>
    
        <h2>Client</h2>
        <p>Nom : {{ $facture->client->nom_client }}</p>
        <p>Contact : {{ $facture->client->contact }}</p>
        <p>Adresse : {{ $facture->client->adress }}</p>
    
        <h2>Produits</h2>
        <ul>
            <?php $montantTotal = 0; ?>
            @foreach($facture->produits as $produit)
                <li>{{ $produit->nom_produit }} - {{ $produit->prix }}</li>
                <?php $montantTotal += $produit->prix; ?>
            @endforeach
        </ul>
        <p>Montant Total : {{ $montantTotal }}</p>
        <a href="" class="btn btn-secondary">Imprimer</a>
        <hr> <!-- Ajoute une ligne de séparation entre chaque facture -->
    @endforeach
    </body>
</html>
@endsection()
