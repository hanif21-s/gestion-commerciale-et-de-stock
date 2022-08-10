@extends("admins.app")

@section("content")
<h1>Bienvenue ! Vous êtes connectés en tant que {{ Auth::user()->name }}</h1>
<div class="col-lg-6">
    <div class="card">
    <div class="card-header border-0">
    <div class="d-flex justify-content-between">
    <h3 class="card-title">Sales</h3>
    <a href="javascript:void(0);">View Report</a>
    </div>
    </div>
    <div class="card-body">
    <div class="d-flex">
    <p class="d-flex flex-column">
    <span class="text-bold text-lg">$18,230.00</span>
    <span>Sales Over Time</span>
    </p>
    <p class="ml-auto d-flex flex-column text-right">
    <span class="text-success">
    <i class="fas fa-arrow-up"></i> 33.1%
    </span>
    <span class="text-muted">Since last month</span>
    </p>
    </div>

    <div class="position-relative mb-4">
    <canvas id="sales-chart" height="200"></canvas>
    </div>
    <div class="d-flex flex-row justify-content-end">
    <span class="mr-2">
    <i class="fas fa-square text-primary"></i> This year
    </span>
    <span>
    <i class="fas fa-square text-gray"></i> Last year
    </span>
    </div>
    </div>
    </div>
@endsection
<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
