@extends("admins.app")
@section("content")
<div class="my-3 p-6 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-3">Edition d'une remise</h3>
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
    <form style="width:65%;" method="post" action="{{route('remises.update',['remise'=>$remise->id])}}">
      @csrf
        <input type="hidden" name="_method" value="put">
  <div class="mb-3">
    <label class="form-label">Libellé</label>
    <input type="text" class="form-control" required name="libelle" value="{{$remise->libelle}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Taux (%)</label>
    <input type="number" class="form-control" required name="taux" value="{{$remise->taux}}" step="any" min="0">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.remises')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection
