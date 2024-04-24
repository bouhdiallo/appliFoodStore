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

<form action="{{ route('updateProductProcess', ['id' => $produit->id]) }}"  method="POST" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <input type="text" name="id" class="form-control" style="display: none;" value=" {{$produit->id}}" id="nom_client" aria-describedby="emailHelp" placeholder="Entrez le Nom">


      <legend><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Légende</font></font></legend>
     
      <div>
        <label for="nom produit" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom Produit</font></font></label>
        <input type="nom_produit" name="nom_produit" class="form-control" value=" {{ $produit->nom_produit }}" id="nom_produit" aria-describedby="emailHelp" placeholder="Entrez le Nom du produit">
        {{-- <small id="emailHelp" class="form-text text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</font></font></small> --}}
      </div>
      <div>
        <label for="prix" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Prix</font></font></label>
        <input type="prix" name="prix" class="form-control" value=" {{ $produit->prix }}" id="prix" placeholder="prix" autocomplete="off">
      </div>

      <div>
        <label for="image" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Images</font></font></label>
        <input type="file" name="image" class="form-control" value=" {{ $produit->image }}" id="image" placeholder="images" autocomplete="off">
      </div>

      <div>
        <label for="description" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Description</font></font></label>
        <input type="text" name="description" class="form-control" value=" {{ $produit->description }}" id="decsription" placeholder="description" autocomplete="off">
      </div>

      <div>
        <label for="quantite" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quantité en Stock</font></font></label>
        <input type="number" name="qte_en_stock" class="form-control" value=" {{ $produit->number }}" id="adress" placeholder="quantite" autocomplete="off">
      </div>

      <div class="form-group">
        <label for="exampleSelect1" class="form-label mt-4">Example select</label>
        <select class="form-select" name="fournisseur_id" id="exampleSelect1">
            @foreach($fournisseurs as $fournisseur)
    
          <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
          @endforeach
         
        </select>
      </div>

    </fieldset>
    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Soumettre</font></font></button>
  </fieldset>
  </form>
@endsection()