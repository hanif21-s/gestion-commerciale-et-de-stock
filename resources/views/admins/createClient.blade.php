@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Ajout d'un nouveau client</h3>
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
    <form style="width:65%;" method="post" action="{{route('clients.ajouter')}}">
      @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" required name="nom">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prenoms</label>
    <input type="text" class="form-control" required name="prenoms">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" required name="email">
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
    <input type="text" class="form-control" required name="sexe">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.clients')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection