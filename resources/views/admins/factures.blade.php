@extends("admins.app")
@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Facture de la commande courante</h3>
    <div class="d-flex justify-content-end mb-2">
    </div>

    </br>
    @if(session()->has("successDelete"))
      <div class="alert alert-success">
        <h3>{{session()->get('successDelete')}}</h3>
      </div>
      @endif
      @if(session()->has("success"))
      <div class="alert alert-success">
        <h3>{{session()->get('success')}}</h3>
      </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      </ul>
    </div>
    @endif
    <div>
      <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">Num interne</th>
      <th scope="col">Date</th>
      <th scope="col">Client</th>
      <th scope="col">Total HT</th>
      <th scope="col">Prix TVA</th>
      <th scope="col">Prix Remise</th>
      <th scope="col">Total TTC</th>
      <th scope="col">Reglement</th>
      <th scope="col">Monnaie</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$commande->num_interne}}</td>
      <td>{{$commande->date}}</td>
      <td>{{$commande->Client['nom']}} {{$commande->Client['prenoms']}}</td>
      <td>{{$value}}</td>
      <td>{{$commande->tva}}</td>
      <td>{{$commande->prix_remise}}</td>
      <td>{{$commande->total_TTC}}</td>
      <td>{{$reglement_client}}</td>
      <td>{{$monnaie}}</td>
      <td>
        <a href="{{route('generate', ['commande'=>$commande->id])}}" class="btn btn-success" title="Imprimer"><i class="nav-icon fas fa-print"></i></a>
        <a href="/admins/commandes" class="btn btn-danger" title="Quitter"><i class="nav-icon fas fa-sign-out-alt"></i></a>
      </td>
    </tr>

  </tbody>
</table>
    </div>

  </div>
@endsection
