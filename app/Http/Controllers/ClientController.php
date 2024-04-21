<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function navigation(){
        return view('layout.nav');
    }


    public function index()
    {


        return view('Clients.ajoutClient');
    //      try{

    //          return response()->json([
    //            'status_code' =>200,
    //            'status_message' => 'la liste des fournisseurs a été recuperé',
    //            'data'=>Client::all()
    //        ]);

    //      } catch(Exception $e){
    //         return response($e)->json($e);
    //   }
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateClientRequest $request)
    {
      try {
          if (Auth::guard('user-api')->check()) {
              // $user = Auth::guard('user-api')->user();
  
              $client = new Client();
              $client->nom_client = $request->nom_client;
              $client->contact = $request->contact;
              $client->adress = $request->adress;
              
              $client->save();
              return response()->json([
                  'status_code' => 200,
                  'status_message' => 'Le client a été ajouté avec succès',
                  'data' => $client
              ]);
          } else {
              return response()->json([
                  'status_code' => 401,
                  'status_message' => 'Vous devez être authentifié pour créer un client'
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
    public function update(UpdateClientRequest $request, $id)
    {
        try {           
            if (Auth::guard('user-api')->check()) {
                // $user = Auth::guard('user-api')->user();
                // Vérifier si l'utilisateur est l'auteur du client
                $client =  Client::findOrFail($id);
                // dd($client);
                // if ($client->user_id === $user->id)
                // if ($annuaire->admin_id === $user->id && $user->role === 'admin') 
                // {
                    $client->nom_client = $request->nom_client;
                    $client->contact = $request->contact;
                    $client->adress = $request->adress;
                    $client->update();
                    return response()->json([
                        'status_code' => 200,
                        'status_message' => 'Le client a été modifié',
                        'data' => $client
                    ]);
                } else {
                    return response()->json([
                        'status_code' => 403,
                        'status_message' => 'Vous n\'êtes pas autorisé à effectuer une modification sur ce client'
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
    public function delete(Client $client, $id)
    { 
        try {
            if (Auth::guard('user-api')->check()) {
                $client = Client::findOrFail($id);

                    $client->delete();
    
                    return response()->json([
                        'status_code' => 200,
                        'status_message' => 'Le client a été supprimé avec succes',
                        'data' => $client
                    ]);
                // } else {
                //     return response()->json([
                //         'status_code' => 403,
                //         'status_message' => 'Vous n\'êtes pas autorisé à effectuer la suppression de ce client'
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
