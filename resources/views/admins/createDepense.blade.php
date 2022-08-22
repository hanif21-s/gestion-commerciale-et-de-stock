@extends("admins.app")
@section('content')
<style>
    #number {
  width: 3em;
}
</style>
<div class="container-fluid">
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      </ul>
    </div>
    @endif
    <form action="" method="post">
        @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Enregistrer la dépense <b></b></h3>
                </div>
                <div class="card-body">
                    <div style="text-align:center">
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" required name="date" max="{{now()->toDateString('Y-m-d')}}" value="{{  now()->toDateString('Y-m-d') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Libellé</label>
                            <input type="text" class="form-control" required name="libelle">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Montant</label>
                            <input type="number" class="form-control" required name="montant" min="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Billeter la depense</h3>
                </div></br>

                <div class="card-body p-0">
                        <div style="text-align:center">
                            <label for="size"><i class="nav-icon fas fa-money-bill"></i> 10 000</label>
                            <input type="number" required name="B_10000" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-money-bill"></i> 5000</label>
                            <input type="number" required name="B_5000" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-money-bill"></i> 2000</label>
                            <input type="number" required name="B_2000" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-money-bill"></i> 1000</label>
                            <input type="number" required name="B_1000" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br>
                            <label for="size"><i class="nav-icon fas fa-money-bill"></i> 500</label>
                            <input type="number" required name="B_500" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 500F:</label>
                            <input type="number" required name="P_500" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 250F:</label>
                            <input type="number" required name="P_250" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 200F</label>
                            <input type="number" required name="P_200" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br>
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 100F:</label>
                            <input type="number" required name="P_100" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 50F</label>
                            <input type="number" required name="P_50" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 25F</label>
                            <input type="number" required name="P_25" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 10F</label>
                            <input type="number" required name="P_10" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br>
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 5F</label>
                            <input type="number" required name="P_5" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br></br>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="{{route('admins.depenses')}}" class="btn btn-danger">Annuler</a></br></br></br>
                        </div>
                </div>

            </div>
        </div>
    </div>
    </form>
</div>
@endsection
