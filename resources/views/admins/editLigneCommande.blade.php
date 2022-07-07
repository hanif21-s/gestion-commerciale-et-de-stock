@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Edition d'une ligne de commande</h3>
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
    <form style="width:65%;" method="post" action="{{route('lignecommandes.update',['lignecommande'=>$lignecommande->id])}}">
      @csrf
        <input type="hidden" name="_method" value="put">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Produit</label>
    <select class="form-control" required name="produits_id">
      <option value=""></option>
        @foreach($produits as $produit)
        @if($produit->id == $lignecommande->produits_id)
          <option value="{{$produit->id}}" selected>{{$produit->nom}}</option>
          @else
          <option value="{{$produit->id}}">{{$produit->nom}}</option>
        @endif
        @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Quantité</label>
    <input type="number" class="form-control" required name="quantite" value="{{$lignecommande->quantite}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">N° de commande</label>
    <select class="form-control" required name="commandes_id">
      <option value=""></option>
        @foreach($commandes as $commande)
        @if($commande->id == $lignecommande->commandes_id)
          <option value="{{$commande->id}}" selected>{{$commande->id}}</option>
          @else
          <option value="{{$commande->id}}">{{$commande->id}}</option>
        @endif
        @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Etat</label>
    <select class="form-control" required name="etat">
        <option value=""></option>
        @if($lignecommande->etat == "1")
        <option value="1" selected>Disponible</option>
        <option value="0">Non Disponible</option>
        @else
        <option value="1">Disponible</option>
        <option value="0" selected>Non Disponible</option>
        @endif
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.lignecommandes')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection