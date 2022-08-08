@extends("admins.app")
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des factures</b></h3>
    </div>
    @if(session()->has("successDelete"))
      <div class="alert alert-success">
        <h3>{{session()->get('successDelete')}}</h3>
      </div>
      @endif
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Num interne</th>
                <th scope="col">Date</th>
                <th scope="col">Total HT</th>
                <th scope="col">Prix TVA</th>
                <th scope="col">Prix Remise</th>
                <th scope="col">Total TTC</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factures as $facture)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
              <td>{{$facture->num_interne}}</td>
              <td>{{$facture->date}}</td>
              <td>{{$facture->total_HT}}</td>
              <td>{{$facture->tva}}</td>
              <td>{{$facture->prix_remise}}</td>
              <td>{{$facture->total_TTC}}</td>
              <td>
                <a href="{{route('generate', ['facture'=>$facture->id])}}" class="btn btn-success">Imprimer</a>
              </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Num interne</th>
                <th scope="col">Date</th>
                <th scope="col">Total HT</th>
                <th scope="col">Prix TVA</th>
                <th scope="col">Prix Remise</th>
                <th scope="col">Total TTC</th>
                <th scope="col">Action</th>
            </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection