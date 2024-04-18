<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Facture;
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
         try{

             return response()->json([
               'status_code' =>200,
               'status_message' => 'la liste des fournisseurs a été recuperé',
               'data'=>Facture::all()
           ]);

         } catch(Exception $e){
            return response($e)->json($e);
      }
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateFactureRequest $request)
    {
      try {
          if (Auth::guard('user-api')->check()) {
              // $user = Auth::guard('user-api')->user();
  
              $facture = new Facture();
              $facture->date = $request->date;
              $facture->montant = $request->montant;
              $facture->client_id = $request->client_id;

              
              $facture->save();
              return response()->json([
                  'status_code' => 200,
                  'status_message' => 'La facture a été ajouté avec succès',
                  'data' => $facture
              ]);
          } else {
              return response()->json([
                  'status_code' => 401,
                  'status_message' => 'Vous devez être authentifié pour créer une facture'
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
    public function delete(Facture $facture)
    { 
        try {
            if (Auth::guard('user-api')->check()) {
        
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
}
