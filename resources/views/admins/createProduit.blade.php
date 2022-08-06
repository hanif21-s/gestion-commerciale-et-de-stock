@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Ajout d'un nouveau produit</h3>
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
    <form style="width:65%;" method="post" action="{{route('produits.ajouter')}}">
      @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" required name="nom">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantité stock</label>
    <input type="number" class="form-control" required name="qtte_stock">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prix d'achat</label>
    <input type="number" class="form-control" required name="prix_achat">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prix HT</label>
    <input type="number" class="form-control" required name="prix_HT">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Stock minimum</label>
    <input type="number" class="form-control" required name="stock_minimum">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Date de péremption</label>
    <input type="date" class="form-control" required name="date_peremption" min="{{  now()->toDateString('Y-m-d') }}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Catégorie</label>
    <select class="form-control" required name="categories_id">
      <option value=""></option>
        @foreach($categories as $categorie)
          <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
        @endforeach
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.produits')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection