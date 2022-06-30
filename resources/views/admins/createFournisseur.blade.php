@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Ajout d'un nouveau fournisseur</h3>
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
    <form style="width:65%;" method="post" action="{{route('fournisseurs.ajouter')}}">
      @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Société</label>
    <input type="text" class="form-control" required name="societe">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse</label>
    <input type="text" class="form-control" required name="adresse">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Code Postal</label>
    <input type="number" class="form-control" required name="code_postal">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ville</label>
    <input type="text" class="form-control" required name="ville">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Pays</label>
    <input type="text" class="form-control" required name="pays">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Telephone</label>
    <input type="number" class="form-control" required name="tel">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" required name="email">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.fournisseurs')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection