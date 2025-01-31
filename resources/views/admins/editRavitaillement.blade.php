@extends("admins.app")
@section("content")

<div class="my-3 p-6 bg-body rounded shadow-sm">

  <h3 class="border-bottom pb-2 mb-3">Edition d'un ravitaillement</h3>
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
    <form style="width:65%;" method="post" action="{{route('ravitaillements.update',['ravitaillement'=>$ravitaillement->id])}}">
      @csrf

        <input type="hidden" name="_method" value="put">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Date</label>
    <input type="date" class="form-control" required name="date" value="{{$ravitaillement->date}}" readonly="">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fournisseur</label>
    <select class="form-control" required name="fournisseurs_id">
      <option value=""></option>
        @foreach($fournisseurs as $fournisseur)
        @if($fournisseur->id == $ravitaillement->fournisseurs_id)
          <option value="{{$fournisseur->id}}" selected>{{$fournisseur->nom}}</option>
          @else
          <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
        @endif
        @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.ravitaillements')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection