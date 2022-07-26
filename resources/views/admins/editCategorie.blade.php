@extends("admins.app")
@section("content")

<div class="my-3 p-6 bg-body rounded shadow-sm">

  <h3 class="border-bottom pb-2 mb-3">Edition d'une catégorie</h3>
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
    <form style="width:65%;" method="post" action="{{route('categories.update',['categorie'=>$categorie->id])}}">
      @csrf

        <input type="hidden" name="_method" value="put">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Libelle</label>
    <input type="text" class="form-control" required name="libelle" value="{{$categorie->libelle}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Categorie Parent</label>
    <select class="form-control" name="parent_id">
         @foreach($parents as $parent)
         
          <option value="{{$categorie->parent_id}}" selected>{{$categorie->parent_id}}</option>
          
        @endforeach
         

    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <input type="text" class="form-control" required name="description" value="{{$categorie->description}}">
  </div>
  
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('admins.categories')}}" class="btn btn-danger">Annuler</a>
</form>
  </div>
</div>

@endsection