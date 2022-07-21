@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Ajout d'un nouvel utilisateur</h3>
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
    <form style="width:65%;" method="post" action="{{route('utilisateurs.ajouter')}}">
      @csrf
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" required name="name">
  </div>
  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" required name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" required name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Telephone</label>
    <input type="number" class="form-control" required name="tel">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse</label>
    <input type="text" class="form-control" required name="adresse">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Statut : </label></br>
    <div class="form-check form-check-inline">
    <input class="form-check-input" name="is_admin" type="radio" value="1" id="is_admin">
    <h4 class="form-check-label" for="is_author">Admin</h4>&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="form-check-input" name="is_gerant" type="radio" value="1" id="is_gerant">
    <h4 class="form-check-label" for="is_author">Gerant</h4>&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="form-check-input" name="is_commercial" type="radio" value="1" id="is_commercial">
    <h4 class="form-check-label" for="is_author">Commercial</h4>&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="form-check-input" name="is_caissier" type="radio" value="1" id="is_caissier">
    <h4 class="form-check-label" for="is_author">Caissier</h4>
    </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Sexe : </label></br>
    <div class="form-check form-check-inline">
    <input class="form-check-input" name="sexe" type="radio" value="m">
    <h4 class="form-check-label">Masculin</h4>&nbsp;&nbsp;&nbsp;&nbsp;
    <input class="form-check-input" name="sexe" type="radio" value="f">
    <h4 class="form-check-label">Feminin</h4>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.utilisateurs')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection