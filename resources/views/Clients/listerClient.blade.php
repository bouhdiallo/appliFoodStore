@extends('layout.nav')
@section('content')








<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">#</font></font></th>
        <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom</font></font></th>
        <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contact</font></font></th>
        <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Adress</font></font></th>
        <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ACtions</font></font></th>
      </tr>
    </thead>
    <tbody>
      @php 
      $ide = 1;
      @endphp
      
        @foreach ($clients as $client)
            
      <tr class="table-warning">
        <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$ide}}</font></font></th>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->nom_client}}</font></font></td>
       
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->contact}}</font></font></td>
     
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->adress}}</font></font></td>
        <td>
            <a href="/deleteCustomer/{{$client->id}}" class="btn btn-danger">SUPPRIMER</a>
            <a href="/updateCustomer/{{$client->id}}" class="btn btn-info">MODIFIER</a>
        </td>
      </tr>
      @php 
      $ide += 1;
      @endphp
      @endforeach

      
     
    </tbody>
  </table>

  {{ $clients->links() }}
  



  @endsection()