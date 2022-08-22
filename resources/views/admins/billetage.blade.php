@extends("admins.app")
@section('content')
<style>
    #number {
  width: 3em;
}
</style>
<div class="my-3 p-6 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Entrez vos données recueillies</h3>
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      </ul>
    </div>
    @endif
      <form style="width:65%;" method="post" action="{{route('resultat.billetage')}}">
        @csrf
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
            <button type="submit" class="btn btn-primary">Verifier</button>
            <a href="{{route('admins.welcome')}}" class="btn btn-danger">Annuler</a></br></br>
        </div>
  </form>
    </div>
</div>
@endsection
