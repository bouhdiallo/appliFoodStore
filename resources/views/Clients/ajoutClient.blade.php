@extends('layout.nav')
@section('content')




<form action="{{route ('addCustommer')}}"  method="POST">
    @csrf
    <fieldset>
      <legend><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Légende</font></font></legend>
      {{-- <div class="row"> --}}
        {{-- <label for="staticEmail" class="col-sm-2 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">E-mail</font></font></label> --}}
        {{-- <div class="col-sm-10">
          <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com">
        </div> --}}
      {{-- </div> --}}
      <div>
        <label for="nom_client" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom</font></font></label>
        <input type="nom_client" name="nom_client" class="form-control" id="nom_client" aria-describedby="emailHelp" placeholder="Entrez le Nom">
        {{-- <small id="emailHelp" class="form-text text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</font></font></small> --}}
      </div>
      <div>
        <label for="contact" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contact</font></font></label>
        <input type="contact" name="contact" class="form-control" id="contact" placeholder="contact" autocomplete="off">
      </div>

      <div>
        <label for="adress" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adress</font></font></label>
        <input type="adress" name="adress" class="form-control" id="adress" placeholder="adress" autocomplete="off">
      </div>

    </fieldset>
    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Soumettre</font></font></button>
  </fieldset>
      
      
      
      
  
      
      
      
  </form>
@endsection()