@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Edition d'un client</h3>
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
    <form style="width:65%;" method="post" action="{{route('clients.update',['client'=>$client->id])}}">
      @csrf

        <input type="hidden" name="_method" value="put">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" required name="nom" value="{{$client->nom}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prenoms</label>
    <input type="text" class="form-control" required name="prenoms" value="{{$client->prenoms}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" required name="email" value="{{$client->email}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tel</label>
    <input type="number" class="form-control" required name="tel" value="{{$client->tel}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse</label>
    <input type="text" class="form-control" required name="adresse" value="{{$client->adresse}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Sexe</label>
    <input type="text" class="form-control" required name="sexe" value="{{$client->sexe}}">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.clients')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection