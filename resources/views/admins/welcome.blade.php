@extends("admins.app")
@section("content")
<style>
    h2 {
      padding: 16px;
      background-color: #ffd000;
    }
  </style>
<h1>Bienvenue !  {{ Auth::user()->name }}</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            @role('admin|gerant')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ETAT DE LA CAISSE AU <b>{{$date}}</b></h3>
                </div>
                <div class="card-body">
                    <h2>TOTAL = {{$value}} FCFA</h2>
                </div>
            </div>
            @endrole

<div class="card">
<div class="card-header">
<h3 class="card-title">Condensed Full Width Table</h3>
</div>

<div class="card-body p-0">
<table class="table table-sm">
<thead>
<tr>
<th style="width: 10px">#</th>
<th>Task</th>
<th>Progress</th>
<th style="width: 40px">Label</th>
</tr>
</thead>
<tbody>
<tr>
<td>1.</td>
<td>Update software</td>
<td>
<div class="progress progress-xs">
<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
</div>
</td>
<td><span class="badge bg-danger">55%</span></td>
</tr>
<tr>
<td>2.</td>
<td>Clean database</td>
<td>
<div class="progress progress-xs">
<div class="progress-bar bg-warning" style="width: 70%"></div>
</div>
</td>
<td><span class="badge bg-warning">70%</span></td>
</tr>
<tr>
<td>3.</td>
<td>Cron job running</td>
<td>
<div class="progress progress-xs progress-striped active">
<div class="progress-bar bg-primary" style="width: 30%"></div>
</div>
</td>
<td><span class="badge bg-primary">30%</span></td>
</tr>
<tr>
<td>4.</td>
<td>Fix and squish bugs</td>
<td>
<div class="progress progress-xs progress-striped active">
<div class="progress-bar bg-success" style="width: 90%"></div>
</div>
</td>
<td><span class="badge bg-success">90%</span></td>
</tr>
</tbody>
</table>
</div>

</div>

</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h3 class="card-title">Simple Full Width Table</h3>

</div>

<div class="card-body p-0">
    <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
</div>
</div>

</div>

<div class="card">
<div class="card-header">
<h3 class="card-title">Striped Full Width Table</h3>
</div>

<div class="card-body p-0">
<table class="table table-striped">
<thead>
<tr>
<th style="width: 10px">#</th>
<th>Task</th>
<th>Progress</th>
<th style="width: 40px">Label</th>
</tr>
</thead>
<tbody>
<tr>
<td>1.</td>
<td>Update software</td>
<td>
<div class="progress progress-xs">
<div class="progress-bar progress-bar-danger" style="width: 55%"></div>
</div>
</td>
<td><span class="badge bg-danger">55%</span></td>
</tr>
<tr>
<td>2.</td>
<td>Clean database</td>
<td>
<div class="progress progress-xs">
<div class="progress-bar bg-warning" style="width: 70%"></div>
</div>
</td>
<td><span class="badge bg-warning">70%</span></td>
</tr>
<tr>
<td>3.</td>
<td>Cron job running</td>
<td>
<div class="progress progress-xs progress-striped active">
<div class="progress-bar bg-primary" style="width: 30%"></div>
</div>
</td>
<td><span class="badge bg-primary">30%</span></td>
</tr>
<tr>
<td>4.</td>
<td>Fix and squish bugs</td>
<td>
<div class="progress progress-xs progress-striped active">
<div class="progress-bar bg-success" style="width: 90%"></div>
</div>
</td>
<td><span class="badge bg-success">90%</span></td>
</tr>
</tbody>
</table>
</div>

</div>

</div>

</div>

</div>

<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>


@endsection
