@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Enregistrer une nouvelle ligne de commande</h3>
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
    <form style="width:65%;" method="post" action="{{route('lignecommandes.ajouter')}}">
      @csrf
  <div class="mb-3">
    <label class="form-label">Produit</label>
    <select class="form-control" required name="produits_id">
      <option value=""></option>
        @foreach($produits as $produit)
          <option value="{{$produit->id}}">{{$produit->nom}}</option>
        @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Quantité</label>
    <input type="number" class="form-control" required name="quantite">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">N° de commande</label>
    <select class="form-control" required name="commandes_id">
      <option value=""></option>
        @foreach($commandes as $commande)
          <option value="{{$commande->id}}">{{$commande->id}}</option>
        @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Etat de la commande</label>
    <select class="form-control" required name="etat">
        <option value=""></option>
        <option value="1">Disponible</option>
        <option value="0">Non Disponible</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.lignecommandes')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection