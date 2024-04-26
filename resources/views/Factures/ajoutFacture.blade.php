@extends('layout.navAccount')
@section('facture')


{{-- @if(auth('user-api')->check())
    <h1>{{ auth('user-api')->user()->name }}</h1>
@endif --}}


<form action="{{route ('addAccount')}}"  method="POST">

  
    @csrf
    <fieldset>
      <legend><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Légende</font></font></legend>
     
     
      <div>
        <label for="contact" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date</font></font></label>
        <input type="date" name="date" class="form-control" id="contact" placeholder="contact" autocomplete="off">
      </div>

      <div>
        <label for="adress" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Montant</font></font></label>
        <input type="montant" name="montant" class="form-control" id="adress" placeholder="adress" autocomplete="off">
      </div>



      <div class="form-group">
        <label for="exampleSelect1" class="form-label mt-4">Example select</label>
        <select class="form-select" name="client_id" id="exampleSelect1">
            @foreach($clients as $client)
    
          <option value="{{$client->id}}">{{$client->nom_client}}</option>
          @endforeach
         
        </select>
      </div>


    </fieldset>
    <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Soumettre</font></font></button>
  </fieldset>
  </form>
@endsection()