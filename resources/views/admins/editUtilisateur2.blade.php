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
    <form style="width:65%;" method="post" action="{{route('utilisateurs.update2')}}">
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
    <label for="exampleInputEmail1" class="form-label">Tel</label>
    <input type="number" class="form-control" required name="tel" value="{{$utilisateur->tel}}" min="0">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse</label>
    <input type="text" class="form-control" required name="adresse" value="{{$utilisateur->adresse}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ancien Mot de passe</label>
    <input type="password" class="form-control" name="ancien_mdp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nouveau mot de passe</label>
    <input type="password" class="form-control" name="nvo_mdp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Confirmer nouveau mot de passe</label>
    <input type="password" class="form-control" name="conf_nvo_mdp">
  </div>
  <button type="submit" class="btn btn-primary">Mettre à jour son profile</button>
  <a href="{{route('admins.welcome')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection
