<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre titre</title>
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0; /* Couleur de fond de l'arrière-plan */
        }

        form {
            width: 50%; /* Largeur du formulaire */
            padding: 20px;
            background-color: blue; /* Fond bleu du formulaire */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre portée */
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: white;
            color: blue;
            cursor: pointer;
        }
    </style>
</head>
<body>

<form action="{{route ('connexion')}}" method="POST">
    @csrf
    <fieldset>
        <div>
            <label for="exampleInputEmail1" class="form-label mt-4">Adresse e-mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez l'e-mail">
            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</small>
        </div>
        <div>
            <label for="exampleInputPassword1" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </fieldset>
</form>

</body>
</html>
