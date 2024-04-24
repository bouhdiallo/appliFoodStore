@extends('layout.nav')
@section('content')



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

<form action="{{ route('updateCustomerProcess', ['id' => $client->id]) }}" method="POST">

{{-- <form action="{{route ('updateCustomerProcess')}}"  method="POST"> --}}
    @csrf
    <fieldset>
        <input type="text" name="id" class="form-control" style="display: none;" value=" {{$client->id}}" id="nom_client" aria-describedby="emailHelp" placeholder="Entrez le Nom">


      <legend><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Légende</font></font></legend>
    
        <label for="nom_client" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom</font></font></label>
        <input type="nom_client" name="nom_client" class="form-control" value=" {{$client->nom_client}}" id="nom_client" aria-describedby="emailHelp" placeholder="Entrez le Nom">
        {{-- <small id="emailHelp" class="form-text text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</font></font></small> --}}
      </div>
      <div>
        <label for="contact" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contact</font></font></label>
        <input type="contact" name="contact" class="form-control" value=" {{$client->contact}}" id="contact" placeholder="contact" autocomplete="off">
      </div>

      <div>
        <label for="adress" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adress</font></font></label>
        <input type="adress" name="adress" class="form-control" value=" {{$client->adress}}" id="adress" placeholder="adress" autocomplete="off">
      </div>

    </fieldset>
    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">soumettre</font></font></button>
  </fieldset>
      
      
      
      
  
      
      
      
  </form>
@endsection()