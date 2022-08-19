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
    <label for="password_confirmation" class="form-label">Confirmer mot de passe</label>
    <input type="password" id="motdepasse" class="form-control" name="password_confirmation" required autocomplete="new-password" >
</div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Telephone</label>
    <input type="number" id="phone" class="form-control" required name="tel" min="0">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse</label>
    <input type="text" class="form-control" required name="adresse">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Roles</label>
    <select class="form-control" required name="role_id">
        <option value=""></option>
      @foreach($roles as $role)
      <option value="{{$role->id}}">{{$role->name}}</option>

      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Sexe : </label></br>
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
