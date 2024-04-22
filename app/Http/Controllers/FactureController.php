<?php

namespace App\Http\Controllers;

use Exception;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFactureRequest;
use App\Http\Requests\UpdateFactureRequest;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::all();
       return view('Factures.ajoutFacture', ['clients'=> $client]);
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateFactureRequest $request)
    {
        // try {
        //     if (Auth::guard('user-api')->check()) {
                $facture = new Facture();
                $facture->date = $request->date;
                $facture->montant = $request->montant;
                $facture->client_id = $request->client_id;
                
                $facture->save();
    
                // Associer les produits à la facture en utilisant la méthode sync
                $facture->produits()->sync($request->produits);

                return back();
                // dd($request->produits);
        //         return response()->json([
        //             'status_code' => 200,
        //             'status_message' => 'La facture a été ajoutée avec succès',
        //             'data' => $facture
        //         ]);
        //     } else {
        //         return response()->json([
        //             'status_code' => 401,
        //             'status_message' => 'Vous devez être authentifié pour créer une facture'
        //         ]);
        //     }
        // } catch (Exception $e) {
        //     return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
        // }
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

     // les factures
    public function show($client_id, $produit_id)
    {
      
            // Récupérer le client correspondant à l'ID    
            $client = Client::findOrFail($client_id);
        
            // Récupérer le produit correspondant à l'ID
            $produit= Produit::findOrFail($produit_id);
        
            // Récupérer les factures associées au client et au produit
            $facturesClient = $client->factures()->get();
            $facturesProduit = $produit->factures()->get();
        
            // Combiner les collections de factures
            $factures = $facturesClient->merge($facturesProduit);
        
            return view('Factures.listerFacture', ['factures' => $factures]);
        
        
    }


   
    
   


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
 
// public function printInvoice($id)
// {
//     try {
//         // Récupérer la facture avec les détails du client et les produits associés
//         $facture = Facture::with(['client', 'produits'])->findOrFail($id);
//         dd($facture);
//         // Créer le contenu HTML du PDF
//         $html = '<h1>Facture</h1>';
//         $html .= '<p>Nom du client: ' . $facture->client->nom_client . '</p>';
//         $html .= '<p>Contact du client: ' . $facture->client->contact . '</p>';
//         $html .= '<p>Adress du client: ' . $facture->client->adress . '</p>';
//         $html .= '<p>Date de la facture: ' . $facture->date . '</p>';
//         $html .= '<h2>Produits:</h2>';
//         $html .= '<ul>';
//         dd($facture->produits);
//         foreach ($facture->produits as $produit) {

//             $html .= '<li>' . $produit->nom_produit . ' - ' . $produit->prix . '</li>';
//         }
//         $html .= '</ul>';

//         // Instancier Dompdf
//         $dompdf = new Dompdf();

//         // Charger le contenu HTML dans Dompdf
//         $dompdf->loadHtml($html);

//         // Rendre le PDF
//         $dompdf->render();

//         // Récupérer le contenu du PDF
//         $pdfContent = $dompdf->output();

//         // Retourner le PDF en réponse
//         return response($pdfContent)
//             ->header('Content-Type', 'application/pdf')
//             ->header('Content-Disposition', 'inline; filename="facture_' . $id . '.pdf"');

//     } catch (Exception $e) {
//         // Gérer les erreurs, par exemple si la facture n'est pas trouvée
//         return response()->json(['status_code' => 404, 'error' => 'Facture non trouvée']);
//     }
// }
}
