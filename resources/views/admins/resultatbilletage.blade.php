@extends("admins.app")
@section('content')
<style>
    h2 {
      padding: 16px;
      background-color: #00ff22;
    }
  </style>
<div class="my-3 p-6 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-3">Resultat du Billetage de la Journée</h3>
        <div style="text-align:center"><h2>Billetage correct!</h2></div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th scope="col"><i class="nav-icon fas fa-money-bill"></i> 10 000</th>
                  <th scope="col"><i class="nav-icon fas fa-money-bill"></i> 5000</th>
                  <th scope="col"><i class="nav-icon fas fa-money-bill"></i> 2000</th>
                  <th scope="col"><i class="nav-icon fas fa-money-bill"></i> 1000</th>
                  <th scope="col"><i class="nav-icon fas fa-money-bill"></i> 500</th>
                  <th scope="col"><i class="nav-icon fas fa-coins"></i> 500</th>
                  <th scope="col"><i class="nav-icon fas fa-coins"></i> 250</th>
                  <th scope="col"><i class="nav-icon fas fa-coins"></i> 200</th>
                  <th scope="col"><i class="nav-icon fas fa-coins"></i> 100</th>
                  <th scope="col"><i class="nav-icon fas fa-coins"></i> 50</th>
                  <th scope="col"><i class="nav-icon fas fa-coins"></i> 25</th>
                  <th scope="col"><i class="nav-icon fas fa-coins"></i> 10</th>
                  <th scope="col"><i class="nav-icon fas fa-coins"></i> 5</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$blt_10000}}</td>
                  <td>{{$blt_5000}}</td>
                  <td>{{$blt_2000}}</td>
                  <td>{{$blt_1000}}</td>
                  <td>{{$blt_500}}</td>
                  <td>{{$pie_500}}</td>
                  <td>{{$pie_250}}</td>
                  <td>{{$pie_200}}</td>
                  <td>{{$pie_100}}</td>
                  <td>{{$pie_50}}</td>
                  <td>{{$pie_25}}</td>
                  <td>{{$pie_10}}</td>
                  <td>{{$pie_5}}</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                    <th scope="col"><i class="nav-icon fas fa-money-bill"></i> 10 000</th>
                    <th scope="col"><i class="nav-icon fas fa-money-bill"></i> 5000</th>
                    <th scope="col"><i class="nav-icon fas fa-money-bill"></i> 2000</th>
                    <th scope="col"><i class="nav-icon fas fa-money-bill"></i> 1000</th>
                    <th scope="col"><i class="nav-icon fas fa-money-bill"></i> 500</th>
                    <th scope="col"><i class="nav-icon fas fa-coins"></i> 500</th>
                    <th scope="col"><i class="nav-icon fas fa-coins"></i> 250</th>
                    <th scope="col"><i class="nav-icon fas fa-coins"></i> 200</th>
                    <th scope="col"><i class="nav-icon fas fa-coins"></i> 100</th>
                    <th scope="col"><i class="nav-icon fas fa-coins"></i> 50</th>
                    <th scope="col"><i class="nav-icon fas fa-coins"></i> 25</th>
                    <th scope="col"><i class="nav-icon fas fa-coins"></i> 10</th>
                    <th scope="col"><i class="nav-icon fas fa-coins"></i> 5</th>
                </tr>
              </tfoot>
            </table>
          </div>
        <div style="text-align:center">
            <a href="{{route('admins.welcome')}}" class="btn btn-danger">Retour</a><br><br>
        </div>
</div>
@endsection
