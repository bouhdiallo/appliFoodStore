<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Models\Fournisseur;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */

 //affiche le nombre de produit
//  public function NbreProduit()
//  {
//      $nombreProduits = Produit::count();
     
//      // Passer la variable à la vue
//      return view('votre_vue', ['nombreProduits' => $nombreProduits]);
//  }



    public function index()
    {
        $fournisseur= Fournisseur::all();
         return view('Produits.ajoutProduit', ['fournisseurs' => $fournisseur]); 

     
    } 

    /**
     * Show the form for creating a new resource.
     */

    public function create(CreateProduitRequest $request)
    {
    //   try {
        //   if (Auth::guard('user-api')->check()) {
              // $user = Auth::guard('user-api')->user();
              $produit = new Produit();
              $produit->nom_produit = $request->nom_produit;
              $produit->prix = $request->prix;

              if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('/images'), $filename);
                $produit->image = $filename;  
            }
              $produit->description = $request->description;
              $produit->qte_en_stock = $request->qte_en_stock;
              $produit->fournisseur_id = $request->fournisseur_id;


              $produit->save();
              return back()->with('status', 'le produit est ajouter avec success');
    //           return response()->json([
    //               'status_code' => 200,
    //               'status_message' => 'La produit a été ajouté avec succès',
    //               'data' => $produit
    //           ]);
    //       } else {
    //           return response()->json([
    //               'status_code' => 401,
    //               'status_message' => 'Vous devez être authentifié pour créer une produit'
    //           ]);
    //       }
    //   } catch (Exception $e) {
    //       return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
    //   }
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
    public function show()
    {
             //attribuer le fournisseur correspondant
            // $fournisseurs = Fournisseur::find($id);

             $produits = Produit::paginate(5);

            return view ('Produits.listerProduit',['produits' => $produits]);
        
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

    public function update($id) 
     {
        $produit =  Produit::findOrFail($id);
        $fournisseurs = Fournisseur::all(); // Assurez-vous d'obtenir les fournisseurs ici
        return view('Produits.modifProduit', ['produit'=>$produit, 'fournisseurs' =>$fournisseurs]);
     }

   

    public function updateProcess(UpdateProduitRequest $request, $id)
    {
        // try {           
        //     if (Auth::guard('user-api')->check()) {
                
                $produit =  Produit::findOrFail($id);
                
                $produit->nom_produit = $request->nom_produit;
                $produit->prix = $request->prix;
                $produit->description = $request->description;
                $produit->qte_en_stock = $request->qte_en_stock;
  
                    $produit->update();
                    return back()->with('status', 'le produit a été modifié avec success');
                    // return response()->json([
        //                 'status_code' => 200,
        //                 'status_message' => 'Le produit a été modifié',
        //                 'data' => $produit
        //             ]);
        //         } else {
        //             return response()->json([
        //                 'status_code' => 403,
        //                 'status_message' => 'Vous n\'êtes pas autorisé à effectuer une modification sur ce produit'
        //             ]);
        //         }
           
        // } catch (Exception $e) {
        //     return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Produit $produit, $id)
    { 
        // try {
        //     if (Auth::guard('user-api')->check()) {
                $produit = Produit::findOrFail($id);

                $produit->delete();
                return back();
        
        //         return response()->json([
        //             'status_code' => 200,
        //             'status_message' => 'Le produit a été supprimé avec succès',
        //             'data' => $produit

        //         ]);
        //     } else {
        //         return response()->json([
        //             'status_code' => 422,
        //             'status_message' => 'Vous n\'êtes pas autorisé à effectuer la suppression, veuillez vous connecter'
        //         ]);
        //     }
        // } catch (Exception $e) {
        //     return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
        // }
    }
    


    
}
