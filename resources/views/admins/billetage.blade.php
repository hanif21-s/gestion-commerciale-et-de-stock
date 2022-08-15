@extends("admins.app")
@section('content')
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
            <label for="size">Billet de 10 000 F:</label>
            <input type="number" required name="B_10000" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Billet de 5000 F:</label>
            <input type="number" required name="B_5000" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Billet de 2000F:</label>
            <input type="number" required name="B_2000" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Billet de 1000F:</label>
            <input type="number" required name="B_1000" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Billet de 500F:</label>
            <input type="number" required name="B_500" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Pièce de 500F:</label>
            <input type="number" required name="P_500" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Pièce de 250F:</label>
            <input type="number" required name="P_250" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Pièce de 200F</label>
            <input type="number" required name="P_200" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Pièce de 100F:</label>
            <input type="number" required name="P_100" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Pièce de 50F</label>
            <input type="number" required name="P_50" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Pièce de 25F</label>
            <input type="number" required name="P_25" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Pièce de 10F</label>
            <input type="number" required name="P_10" placeholder="Entrez le nombre"  min="0" value="0"></br>
            <label for="size">Pièce de 5F</label>
            <input type="number" required name="P_5" placeholder="Entrez le nombre"  min="0" value="0"></br></br>
            <button type="submit" class="btn btn-primary">Verifier</button>
            <a href="{{route('admins.welcome')}}" class="btn btn-danger">Annuler</a>
        </div>
  </form>
    </div>
</div>
@endsection
