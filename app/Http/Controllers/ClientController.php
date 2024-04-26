<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Client;
use App\Models\Produit;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function dashboard($id)
     {
        
        $produits= Produit::paginate(5);
        $fournisseur = Fournisseur::find($id);
return view ('layout.acceuilUsers', ['produits' => $produits, 'fournisseurs' => $fournisseur]);
 }
     
 
     
   

    public function superAdminAccueil()
    {
        $produits= Produit::all();
    return view ('layout.accueilSuperAdmin', ['produits'=> $produits]);
   }



    public function userAccueil()
   {
    $nombreClients = Client::count();
    $nombreFournisseurs = Fournisseur::count();
    $nombreProduits = Produit::count();

    $produits = Produit::all();
    return view ('layout.acceuilUsers', [
    'produits'=>$produits, 
    'nombreProduits' => $nombreProduits, 
    'nombreFournisseurs' => $nombreFournisseurs,
    'nombreClients' => $nombreClients
     ]);
   }






     public function index()
     {
        
        return view('Clients.ajoutClient');
    }


     public function navigation(){
        return view('layout.nav');
    }


    // public function index()
    // {


    //     return view('Clients.ajoutClient');
    //      try{

    //          return response()->json([
    //            'status_code' =>200,
    //            'status_message' => 'la liste des fournisseurs a été recuperé',
    //            'data'=>Client::all()
    //        ]);

    //      } catch(Exception $e){
    //         return response($e)->json($e);
    //   }
    // } 

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateClientRequest $request)
    {
    //   try {
    //       if (Auth::guard('user-api')->check()) {
              // $user = Auth::guard('user-api')->user();
  
              $client = new Client();
              $client->nom_client = $request->nom_client;
              $client->contact = $request->contact;
              $client->adress = $request->adress;
              
              $client->save();
                return back()->with('status', 'le client est ajouté avec success');
    //           return response()->json([
    //               'status_code' => 200,
    //               'status_message' => 'Le client a été ajouté avec succès',
    //               'data' => $client
    //           ]);
    //       } else {
    //           return response()->json([
    //               'status_code' => 401,
    //               'status_message' => 'Vous devez être authentifié pour créer un client'
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
    // public function show(string $id)
    // {
    //     //
    // }

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
        $client =  Client::findOrFail($id);
        return view('Clients.modifClient', ['client'=>$client]);
     }

    public function updateProcess(UpdateClientRequest $request, $id)
    {
        // try {           
            // if (Auth::guard('user-api')->check()) {
                // $user = Auth::guard('user-api')->user();
                // Vérifier si l'utilisateur est l'auteur du client
                $client =  Client::findOrFail($request->id);
                // dd($client);
                // if ($client->user_id === $user->id)
                // if ($annuaire->admin_id === $user->id && $user->role === 'admin') 
                // {
                    $client->nom_client = $request->nom_client;
                    $client->contact = $request->contact;
                    $client->adress = $request->adress;
                    // dd($client);
                    $client->update();
                    return back()->with('status', 'les donnéees du client ont été modifier avec success');

                //     return response()->json([
                //         'status_code' => 200,
                //         'status_message' => 'Le client a été modifié',
                //         'data' => $client
                //     ]);
                // } else {
                //     return response()->json([
                //         'status_code' => 403,
                //         'status_message' => 'Vous n\'êtes pas autorisé à effectuer une modification sur ce client'
                //     ]);
                // }
            // } 
            // else {
            //     return response()->json([
            //         'status_code' => 422,
            //         'status_message' => 'Vous n\'êtes pas autorisé à effectuer une modification'
            //     ]);
            // }
        // } catch (Exception $e) {
        //     return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function delete(Client $client, $id)
    public function delete($id)

    { 
        // try {
        //     if (Auth::guard('user-api')->check()) {
                $client = Client::findOrFail($id);

                    $client->delete();
                    // return redirect('/')->with('status', 'le client est supprimé avec succes');
                    return back()->with('status', 'le client est supprimé avec success');
                    // return response()->json([
                    //     'status_code' => 200,
                    //     'status_message' => 'Le client a été supprimé avec succes',
                    //     'data' => $client
                    // ]);
                // } else {
                //     return response()->json([
                //         'status_code' => 403,
                //         'status_message' => 'Vous n\'êtes pas autorisé à effectuer la suppression de ce client'
                //     ]);
                // }
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

    public function show()
    {
       
            $client = Client::paginate(5);
            return view ('Clients.listerClient',['clients' => $client]);
        
    }
}
