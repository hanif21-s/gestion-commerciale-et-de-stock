@extends("admins.app")
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title"><b>Bilan de la journée du {{$date_du_jour}}</b></h2>
    </div></br>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>#</th>
                <th scope="col">COMMANDE</th>
                <th scope="col">CLIENT</th>
                <th scope="col">VENDEUR</th>
                <th scope="col">TOTAL TTC</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($commandes as $commande)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$commande->num_interne}}</td>
                    <td>{{$commande->Client['nom']}} {{$commande->Client['prenoms']}}</td>
                    <td>{{$commande->User['name']}}</td>
                    <td>{{$commande->total_TTC}}</td>
                </tr>
            @endforeach
        </tbody>
          <tfoot>
            <tr>
                <th></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">TOTAL = {{$total_journalier}} FCFA</th>
            </tr>
          </tfoot>
        </table>
    </div>
        <div style="text-align:center">
            <a href="{{ route('admins.bilan')}}" class="btn btn-danger">Quitter</a>
        </div></br>
</div>
@endsection
