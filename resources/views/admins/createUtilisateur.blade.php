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
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" required name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" required name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Statut Admin</label>
    <select class="form-control" required name="is_admin">
      <option value=""></option>
      <option value="1">Est admin(e)</option>
      <option value="0">N'est pas admin(e)</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Statut Gerant</label>
    <select class="form-control" required name="is_gerant">
      <option value=""></option>
      <option value="1">Est gerant(e)</option>
      <option value="0">N'est pas gerant(e)</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Statut Commercial</label>
    <select class="form-control" required name="is_commercial">
      <option value=""></option>
      <option value="1">Est commercial(e)</option>
      <option value="0">N'est pas commercial(e)</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Statut Caissier</label>
    <select class="form-control" required name="is_caissier">
      <option value=""></option>
      <option value="1">Est caissier(e)</option>
      <option value="0">N'est pas caissier(e)</option>
    </select>
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
    <label for="exampleInputEmail1" class="form-label">Sexe</label>
    <select class="form-control" required name="sexe">
      <option value=""></option>
      <option value="m">m</option>
      <option value="f">f</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.utilisateurs')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection