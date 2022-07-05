@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Enregistrer une nouvelle commande</h3>
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
    <form style="width:65%;" method="post" action="{{route('commandes.ajouter')}}">
      @csrf
  <div class="mb-3">
    <label class="form-label">Date</label>
    <input type="date" class="form-control" required name="date" value="{{  now()->toDateString('Y-m-d') }}" readonly="">
  </div>
  <div class="mb-3">
    <label class="form-label">Vendeur</label>
    <input type="text" class="form-control" required name="users_id" readonly="" value="{{ Auth::user()->id }}">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.commandes')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection