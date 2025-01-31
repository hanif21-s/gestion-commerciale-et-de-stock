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
    <input type="tetx" class="form-control" required name="produits_id" value="{{$lignecommande->produits_id}}" readonly="">
  </div>
  <div class="mb-3">
    <label class="form-label">Quantité</label>
    <input type="number" class="form-control" required name="quantite" value="{{$lignecommande->quantite}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">N° de commande</label>
    <input type="number" class="form-control" required name="commandes_id" value="{{$lignecommande->commandes_id}}" readonly="">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.lignecommandes')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection