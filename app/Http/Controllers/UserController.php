<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateConnexionRequest;

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
    $user->role = $request->role;
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
    public function abc()
    {
        return view('Admin.connexion');
    }

    public function connexion(CreateConnexionRequest $request)
    {
        // Créez une variable pour stocker les informations d'identification extraites de la requête 
        $credentials = request(['email', 'password']);
    
        // Tentez d'authentifier un utilisateur
        if (! $token = auth()->guard('user-api')->attempt($credentials)) {
            // return back()->with(['error' => 'Unauthorized'], 401);
            return back();
        }
    
        // Récupérez l'objet utilisateur
        $user = auth()->guard('user-api')->user();
    
        // Stockez le nom de l'utilisateur dans la session
         session(['user_name' => $user->name]);

        // Vérifiez le rôle de l'utilisateur et redirigez-le en conséquence
        $role = $user->role;
    
        // Déterminez la route de redirection en fonction du rôle de l'utilisateur
        switch ($role) {
            case 'caissiere':
                return redirect()->route('caissiere');
            case 'user':
                return redirect()->route('user');
            case 'superAdmin':
                return redirect()->route('superAdmin');
            default:
                // Redirection vers une page d'erreur si le rôle n'est pas reconnu
                return back()->withErrors(['email' => 'Les identifiants sont incorrects']);
        }
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

        return redirect('/connexion');
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
