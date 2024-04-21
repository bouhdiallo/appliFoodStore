@extends('layout.nav')
@section('content')




<form action="{{route ('addSupplier')}}"  method="POST">
    @csrf
    <fieldset>
      <legend><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Légende</font></font></legend>
     
      <div>
        <label for="nom_client" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom Produit</font></font></label>
        <input type="nom_produit" name="nom_produit" class="form-control" id="nom_produit" aria-describedby="emailHelp" placeholder="Entrez le Nom du produit">
        {{-- <small id="emailHelp" class="form-text text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</font></font></small> --}}
      </div>
      <div>
        <label for="contact" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Prix</font></font></label>
        <input type="prix" name="prix" class="form-control" id="prix" placeholder="prix" autocomplete="off">
      </div>

      <div>
        <label for="contact" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Images</font></font></label>
        <input type="files" name="nom_produit" class="form-control" id="nom_produit" placeholder="images" autocomplete="off">
      </div>

      <div>
        <label for="adress" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Description</font></font></label>
        <input type="text" name="description" class="form-control" id="decsription" placeholder="description" autocomplete="off">
      </div>

      <div>
        <label for="adress" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quantité en Stock</font></font></label>
        <input type="number" name="qte_en_stock" class="form-control" id="adress" placeholder="quantite" autocomplete="off">
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