@extends("admins.app")
@section("content")
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des Règlements</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Montant</th>
          <th scope="col">Date</th>
          <th scope="col">Etat</th>
          <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($reglements as $reglement)
          <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td>{{$reglement->montant}}</td>
            <td>{{$reglement->date}}</td>
            <td>{{$reglement->etat}}</td>
            <td>
              <a href="{{route('factures.add',$client)}}" class="btn btn-success">Payer</a>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th scope="col">#</th>
          <th scope="col">Montant</th>
          <th scope="col">Date</th>
          <th scope="col">Etat</th>
          <th scope="col">Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection
