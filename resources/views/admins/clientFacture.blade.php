@extends("admins.app")
@section("content")
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des clients</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">Email</th>
          <th scope="col">Tel</th>
          <th scope="col">Adresse</th>
          <th scope="col">Mode de paiement</th>
          <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($clients as $client)
          <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td>{{$client->nom}}</td>
            <td>{{$client->prenoms}}</td>
            <td>{{$client->email}}</td>
            <td>{{$client->tel}}</td>
            <td>{{$client->adresse}}</td>
            <td>
            <select class="form-control" required name="reglements_id">
                <option value=""></option>
                @foreach($reglements as $reglement)
                    <option value="{{$reglement->id}}">{{$reglement->libelle}}</option>
                @endforeach
              </select>
            </td>
            <td>
            <form action="{{route('factures.create', ['client'=>$client->id,'last_id_commandes'=>$last_id_commandes,'reglement'=>$reglement->id])}}" method="post">
                @csrf
              <button class="btn btn-success">Payer</button>
            </form>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Email</th>
            <th scope="col">Tel</th>
            <th scope="col">Adresse</th>
            <th scope="col">Mode de paiement</th>
            <th scope="col">Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection
