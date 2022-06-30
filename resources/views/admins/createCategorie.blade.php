@extends("admins.app")
@section("content")
<style type="text/css">
  .p-6{
    padding: 6rem!important;
  }
</style>
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Ajout d'une nouvelle catégorie</h3>
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
    <form style="width:65%;" method="post" action="{{route('categories.ajouter')}}">
      @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Libelle</label>
    <input type="text" class="form-control" required name="libelle">
  </div>
    <label for="exampleInputEmail1" class="form-label">Catégorie Parent</label>
    <select class="form-control" name="parent_id">
      <option value=""></option>
        @foreach($categories as $categorie)
          <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
        @endforeach
    </select>
</br>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <input type="text" class="form-control" required name="description">
  </div>
  </div>
</br>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.categories')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection