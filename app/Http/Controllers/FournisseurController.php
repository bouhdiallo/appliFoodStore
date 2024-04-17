<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateFournisseurRequest;
use App\Http\Requests\UpdateFournisseurRequest;

class FournisseurController extends Controller
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
               'data'=>Fournisseur::all()
           ]);

         } catch(Exception $e){
            return response($e)->json($e);
      }
    }   

    /**
     * Show the form for creating a new resource.
     */
    
    public function create(CreateFournisseurRequest $request)
  {
    try {
        if (Auth::guard('user-api')->check()) {
            // $user = Auth::guard('user-api')->user();

            $fournisseur = new Fournisseur();
            $fournisseur->nom = $request->nom;
            $fournisseur->contact = $request->contact;
            $fournisseur->adress = $request->adress;
            
            $fournisseur->save();
            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le fournisseur a été ajouté avec succès',
                'data' => $fournisseur
            ]);
        } else {
            return response()->json([
                'status_code' => 401,
                'status_message' => 'Vous devez être authentifié pour créer un fournisseur'
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFournisseurRequest $request, $id)
    {
        try {           
            if (Auth::guard('user-api')->check()) {
                // $user = Auth::guard('user-api')->user();
                // Vérifier si l'utilisateur est l'auteur du fournisseur
                $fournisseur = Fournisseur::findOrFail($id);
                // dd($fournisseur);
                // if ($fournisseur->user_id === $user->id)
                // if ($annuaire->admin_id === $user->id && $user->role === 'admin') 
                // {
                    $fournisseur->nom = $request->nom;
                    $fournisseur->contact = $request->contact;
                    $fournisseur->adress = $request->adress;
                    $fournisseur->update();
                    return response()->json([
                        'status_code' => 200,
                        'status_message' => 'Le fournisseur a été modifié',
                        'data' => $fournisseur
                    ]);
                } else {
                    return response()->json([
                        'status_code' => 403,
                        'status_message' => 'Vous n\'êtes pas autorisé à effectuer une modification sur ce fournisseur'
                    ]);
                }
            // } 
            // else {
            //     return response()->json([
            //         'status_code' => 422,
            //         'status_message' => 'Vous n\'êtes pas autorisé à effectuer une modification'
            //     ]);
            // }
        } catch (Exception $e) {
            return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function supprimerFournisseur(Fournisseur $fournisseur)
    { 
        try {
            if (Auth::guard('user-api')->check()) {
                // $user = Auth::guard('user-api')->user();
                //  dd($user);
                // Vérifier si l'utilisateur est l'auteur du bien et a le rôle 'user'
                // if ($bien->user_id === $user->id && $user->role === 'user') 
                // if ($fournisseur->user_id === $user->id) 
                // {
                    $fournisseur->delete();
    
                    return response()->json([
                        'status_code' => 200,
                        'status_message' => 'Le fournisseur a été supprimé avec succes',
                        'data' => $fournisseur
                    ]);
                // } else {
                //     return response()->json([
                //         'status_code' => 403,
                //         'status_message' => 'Vous n\'êtes pas autorisé à effectuer la suppression de ce fournisseur'
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
