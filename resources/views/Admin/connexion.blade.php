<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            border: 2px solid blue;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>


<body>
    <div class="container">
      @if (session('status'))
<div class="alert alert-success">

  {{session('status')}}
</div>
@endif

<ul>
 @foreach ($errors->all() as $error)
 <li class="alert alert-danger"> {{ $error }} </li>
 @endforeach
</ul>
        <div class="form-container">
            <form action="{{ route('connexion') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre mail">
                  {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Entrez votre password">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Se Connecter</button>
              </form>
        </div>
    </div>
</body>
</html>
