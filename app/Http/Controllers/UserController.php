<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function inscription(Request $request)
    {
       
try {
    $user = new User();
    
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    return response()->json([
      'status_code' => 200,
      'status_message' => 'Inscription reussi',
      'data' => $user
  ]);
}catch(\Exception $e){
return response()->json(['error' => $e->getMessage()]);
}

    }

    /**
     * Show the form for creating a new resource.
     */
    public function connexion(Request $request)
    {
         // credentiels contient les infos d'identification extraites de la requête 
    $credentials = request(['email', 'password']);

    // cas où l'authentification a échoué
    //attempt() est utilisée pour tenter d'authentifier un utilisateur
    if (! $token = auth()->guard('user-api')->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    // récupérer l'objet utilisateur
    $user = auth()->guard('user-api')->user();

    // retourner le token et l'objet utilisateur
    return response()->json(['token' => $token, 'user' => $user]);
    }


    public function me()
    {
        return response()->json(auth()->guard('user-api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deconnexion()
    {
        auth()->guard('user-api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
