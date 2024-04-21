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
      
        @foreach ($clients as $client)
            
      <tr class="table-warning">
        <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->id}}</font></font></th>
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->nom_client}}</font></font></td>
       
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->contact}}</font></font></td>
     
        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$client->adress}}</font></font></td>
        <td>
            <a href="" class="btn btn-danger">SUPPRIMER</a>
            <a href="" class="btn btn-info">MODIFIER</a>
        </td>
      </tr>
      
      @endforeach

      
     
    </tbody>
  </table>

  @endsection()