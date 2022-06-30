@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Edition d'un utilisateur</h3>
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
    <form style="width:65%;" method="post" action="{{route('utilisateurs.update',['utilisateur'=>$utilisateur->id])}}">
      @csrf

        <input type="hidden" name="_method" value="put">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" required name="name" value="{{$utilisateur->name}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" required name="email" value="{{$utilisateur->email}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Statut Admin</label>
    <select class="form-control" required name="is_admin">
      <option value=""></option>
      @if($utilisateur->is_admin == "1")
      <option value="1" selected>Est admin(e)</option>
      <option value="0">N'est pas admin(e)</option>
      @else
      <option value="1">Est admin(e)</option>
      <option value="0" selected>N'est pas admin(e)</option>
      @endif
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Statut Gerant</label>
    <select class="form-control" required name="is_gerant">
      <option value=""></option>
      @if($utilisateur->is_gerant == "1")
      <option value="1" selected>Est gerant(e)</option>
      <option value="0">N'est pas gerant(e)</option>
      @else
      <option value="1">Est gerant(e)</option>
      <option value="0" selected>N'est pas gerant(e)</option>
      @endif
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Statut Commercial</label>
    <select class="form-control" required name="is_commercial">
      <option value=""></option>
      @if($utilisateur->is_commercial == "1")
      <option value="1" selected>Est commercial(e)</option>
      <option value="0">N'est pas commercial(e)</option>
      @else
      <option value="1">Est commercial(e)</option>
      <option value="0" selected>N'est pas commercial(e)</option>
      @endif
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Statut Caissier</label>
    <select class="form-control" required name="is_caissier">
      <option value=""></option>
      @if($utilisateur->is_caissier == "1")
      <option value="1" selected>Est caissier(e)</option>
      <option value="0">N'est pas caissier(e)</option>
      @else
      <option value="1">Est caissier(e)</option>
      <option value="0" selected>N'est pas caissier(e)</option>
      @endif
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Mot de Passe</label>
    <input type="password" class="form-control" required name="password" value="{{$utilisateur->password}}">
  </div> 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tel</label>
    <input type="number" class="form-control" required name="tel" value="{{$utilisateur->tel}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse</label>
    <input type="text" class="form-control" required name="adresse" value="{{$utilisateur->adresse}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Sexe</label>
    <select class="form-control" required name="sexe">
      <option value=""></option>
      @if($utilisateur->sexe == "m")
      <option value="m" selected>m</option>
      <option value="f">f</option>
      @else
      <option value="m">m</option>
      <option value="f" selected>f</option>
      @endif
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.utilisateurs')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection