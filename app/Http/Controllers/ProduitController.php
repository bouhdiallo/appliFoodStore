<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateProduitRequest;
use App\Http\Requests\UpdateProduitRequest;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         try{

             return response()->json([
               'status_code' =>200,
               'status_message' => 'la liste des produits a été recuperé',
               'data'=>Produit::all()
           ]);

         } catch(Exception $e){
            return response($e)->json($e);
      }
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateProduitRequest $request)
    {
      try {
          if (Auth::guard('user-api')->check()) {
              // $user = Auth::guard('user-api')->user();
  
              $produit = new Produit();
              $produit->nom_produit = $request->nom_produit;
              $produit->prix = $request->prix;
              $produit->description = $request->description;
              $produit->qte_en_stock = $request->qte_en_stock;

              $produit->save();
              return response()->json([
                  'status_code' => 200,
                  'status_message' => 'La produit a été ajouté avec succès',
                  'data' => $produit
              ]);
          } else {
              return response()->json([
                  'status_code' => 401,
                  'status_message' => 'Vous devez être authentifié pour créer une produit'
              ]);
          }
      } catch (Exception $e) {
          return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
      }
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
    public function show(string $id)
    {
        //
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
    public function update(UpdateProduitRequest $request, $id)
    {
        try {           
            if (Auth::guard('user-api')->check()) {
                
                $produit =  Produit::findOrFail($id);
                
                $produit->nom_produit = $request->nom_produit;
                $produit->prix = $request->prix;
                $produit->description = $request->description;
                $produit->qte_en_stock = $request->qte_en_stock;
  
                    $produit->update();
                    return response()->json([
                        'status_code' => 200,
                        'status_message' => 'Le produit a été modifié',
                        'data' => $produit
                    ]);
                } else {
                    return response()->json([
                        'status_code' => 403,
                        'status_message' => 'Vous n\'êtes pas autorisé à effectuer une modification sur ce produit'
                    ]);
                }
           
        } catch (Exception $e) {
            return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Produit $produit, $id)
    { 
        try {
            if (Auth::guard('user-api')->check()) {
                $produit = Produit::findOrFail($id);

                $produit->delete();
        
                return response()->json([
                    'status_code' => 200,
                    'status_message' => 'Le produit a été supprimé avec succès',
                    'data' => $produit

                ]);
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
    


    
}
