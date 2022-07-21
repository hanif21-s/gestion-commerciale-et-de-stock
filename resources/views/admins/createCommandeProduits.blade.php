@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
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
    <form style="width:65%;" method="post" action="{{route('lignecommandes.ajouter',$produits->id)}}">
      @csrf
  <div class="mb-3">
    <label class="form-label">Quantité</label>
    <input type="number" class="form-control" required name="quantite">
  </div>
  <div class="mb-3">
    <label class="form-label">Etat de la commande</label>
    <select class="form-control" required name="etat">
        <option value=""></option>
        <option value="1">Disponible</option>
        <option value="0">Non Disponible</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.lignecommandes')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>
@endsection