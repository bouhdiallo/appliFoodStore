<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\FactureProduit;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFactureRequest;
use App\Http\Requests\UpdateFactureRequest;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
public function creating()
{
    $produits = Produit::all();
    return new JsonResponse(['produits' => $produits]);
}

public function storing(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'montant' => 'required|numeric',
        'client_id' => 'required|exists:clients,id',
        'produits' => 'required|array',
        'produits.*' => 'exists:produits,id',
    ]);

    $facture = new Facture();
    $facture->date = $request->date;
    $facture->montant = $request->montant;
    $facture->client_id = $request->client_id;
    $facture->save();

    $facture->produits()->attach($request->produits);

    return response()->json(['message' => 'Facture ajoutée avec succès!', 'facture' => $facture], 201);
}


       //fonction pour afficher la vue de la caissiere
     public function caissiereAccueil()
     {
       return view ('layout.acceuilCaisse');
    }


    public function index()
    {

        $produit = Produit::get();
        $client = Client::all();
       return view('Factures.ajoutFacture', ['clients'=> $client, 'produits'=> $produit]);
    } 

     //metode pour recuperer la facture d'un client
    public function listFacture($id)
    {
        
        $factures = FactureProduit::get($id);
        // dd($factures);

        return view('Factures.listerFacture', ['factures'=>$factures]);
    }

    //metode pour recuperer tous les factures
    public function listAllFacture()
    {
        $factures = Facture::all();
        return view('Factures.listerFacture', ['factures'=>$factures]);
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'produits' => 'required|array',
            'produits.*' => 'exists:produits,id',
            'quantite' => 'required|array',
            'quantite.*' => 'numeric|min:1', // Validation sur les quantités
        ]);
    
        // Création de la nouvelle facture
        $facture = new Facture();
        $facture->date = $request->date;
        $facture->client_id = $request->client_id;
        $facture->save();
        // Calcul du montant total en fonction des produits sélectionnés et de leur quantité
        $montantTotal = 0;
        foreach ($request->produits as $index => $produitId) {
            if (isset($request->quantite[$produitId])) {
                $quantite = $request->quantite[$produitId];
                $produit = Produit::find($produitId);
                if ($produit) {
                    $sousTotal = $produit->prix * $quantite;
                    $montantTotal += $sousTotal;
                    // Attache le produit à la facture avec la quantité dans la table pivot
                    $facture->produits()->attach($produitId, ['quantite' => $quantite]);
                }
            }
        }
    
        $clients = Client::all();
        $produits = Produit::all();

        // Retourner la vue avec les données de la facture et le montant total
        return view('Factures.ajoutFacture', [
            'facture' => $facture,
            'montantTotal' => $montantTotal,
            'clients' => $clients,
            'produits' =>  $produits
        ]);
    }
    
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFactureRequest $request, $id)
    {
        try {           
            if (Auth::guard('user-api')->check()) {
                
                $facture =  Facture::findOrFail($id);
                
                    $facture->date = $request->date;
                    $facture->montant = $request->montant;
                    $facture->client_id = $request->client_id;
                    $facture->update();
                    return response()->json([
                        'status_code' => 200,
                        'status_message' => 'Le facture a été modifié',
                        'data' => $facture
                    ]);
                } else {
                    return response()->json([
                        'status_code' => 403,
                        'status_message' => 'Vous n\'êtes pas autorisé à effectuer une modification sur ce facture'
                    ]);
                }
           
        } catch (Exception $e) {
            return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Facture $facture, $id)
    { 
        try {
            if (Auth::guard('user-api')->check()) {
                $facture = Facture::findOrFail($id);

                    $facture->delete();
    
                    return response()->json([
                        'status_code' => 200,
                        'status_message' => 'Le facture a été supprimé avec succes',
                        'data' => $facture
                    ]);
                // } else {
                //     return response()->json([
                //         'status_code' => 403,
                //         'status_message' => 'Vous n\'êtes pas autorisé à effectuer la suppression de ce facture'
                //     ]);
                // }
            } else {
                return response()->json([
                    'status_code' => 422,
                    'status_message' => 'Vous n\'êtes pas autorisé à effectuer la suppression, veuillez vous connecter'
                ]);
            }
        } catch (Exception $e) {
            return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
        }
    }
                   /**
     * Imprime la facture au format PDF.
     */

     public function printInvoice($clientId, $productId)
{
    // Récupérer les données du client et du produit depuis la base de données
    $client = Client::find($clientId);
    $product = Produit::find($productId);

    // Générer le contenu HTML de la facture
    $html = view('invoice', compact('client', 'product'))->render();

    // Instancier Dompdf
    $dompdf = new Dompdf();

    // Charger le contenu HTML dans Dompdf
    $dompdf->loadHtml($html);

    // Définir la taille du papier et l'orientation
    $dompdf->setPaper('A4', 'portrait');

    // Rendre le PDF
    $dompdf->render();

    // Générer un nom de fichier unique pour la facture
    $filename = 'invoice_' . $client->name . '_' . date('YmdHis') . '.pdf';

    // Enregistrer le PDF sur le serveur
    $output = $dompdf->output();
    file_put_contents(public_path('invoices/' . $filename), $output);

    // Envoyer le PDF au client (par exemple, comme téléchargement)
    return response()->download(public_path('invoices/' . $filename), $filename);
}
}
