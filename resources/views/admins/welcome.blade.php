@extends("admins.app")
@section("content")
<style>
    h2 {
      padding: 16px;
      background-color: #ffd000;
    }
  </style>
  @if(session()->has("success"))
  <div class="alert alert-success">
    <h3>{{session()->get('success')}}</h3>
  </div>
  @endif
<h1>Bienvenue !  {{ Auth::user()->name }}</h1>
<div class="container-fluid">
    <div class="row">
        @role('admin|gerant')
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$value}} FCFA</h3>
                    <p>TOTAL EN CAISSE </p>
                </div>
                <div class="icon">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
            </div>
        </div>
        @endrole

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{\App\Models\Client::all()->count()}}</h3>
                    <p>Clients</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('admins.clients')}}" class="small-box-footer">Details <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\Models\Fournisseur::all()->count()}}</h3>
                    <p>Fournisseurs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('admins.fournisseurs')}}" class="small-box-footer">Details <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Graphe des commandes</h3>
                </div>
                <div class="card-body p-0" id="linechart_material" style="width: 800px; height: 500px;"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Graphe des ravitaillements</h3>
                </div>
                <div class="card-body p-0" id="curve_chart" style="width: 900px; height: 300px;"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Etat du nombre de produits par catégories</h3>
                </div>
                <div class="card-body p-0" id="piechart_3d" style="width: 900px; height: 500px;"></div>
            </div>
        </div>
    </div>

</div>

<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>


@endsection
