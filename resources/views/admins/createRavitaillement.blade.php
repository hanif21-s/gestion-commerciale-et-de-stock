@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">

  <h3 class="border-bottom pb-2 mb-3">Ajout d'un nouveau ravitaillement</h3>
  <div class="mt-4">
    @if(session()->has("success"))
      <div class="alert alert-success">
        <h3>{{session()->get('success')}}</h3>
      </div>
      @endif
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      </ul>
    </div>
    @endif
    <form style="width:65%;" method="post" action="{{route('ravitaillements.ajouter')}}">
      @csrf
  <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Quantité</label>
  <input type="number" class="form-control" required name="quantite">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Date</label>
    <input type="date" class="form-control" required name="date" value="{{  now()->toDateString('Y-m-d') }}" readonly="">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Produit</label>
    <select class="form-control" required name="produits_id">
      <option value=""></option>
        @foreach($produits as $produit)
          <option value="{{$produit->id}}">{{$produit->nom}}</option>
        @endforeach
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.ravitaillements')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection