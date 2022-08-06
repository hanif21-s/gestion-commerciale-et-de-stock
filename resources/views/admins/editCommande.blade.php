@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Edition d'une commande</h3>
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
    <form style="width:65%;" method="post" action="{{route('commandes.update',['commande'=>$commande->id])}}">
      @csrf
        <input type="hidden" name="_method" value="put">
  <div class="mb-3">
    <label class="form-label">Date</label>
    <input type="date" class="form-control" required name="date" value="{{$commande->date}}" readonly="">
  </div>
  <div class="mb-3">
    <label class="form-label">Vendeur</label>
    <input type="text" class="form-control" required name="users_id" readonly="" value="{{ Auth::user()->id }}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Client</label>
    <select class="form-control" required name="clients_id">
      <option value=""></option>
        @foreach($clients as $client)
        @if($client->id == $commande->clients_id)
          <option value="{{$client->id}}" selected>{{$client->nom}} {{$client->prenoms}}</option>
          @else
          <option value="{{$client->id}}">{{$client->nom}} {{$client->prenoms}}</option>
        @endif
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.commandes')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection