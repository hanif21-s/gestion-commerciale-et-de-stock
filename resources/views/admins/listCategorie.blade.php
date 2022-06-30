@extends("admins.app")
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Liste des Taxes</h3>
    <div class="d-flex justify-content-end mb-2">
      <div><a href="{{route('categories.create')}}" class="btn btn-primary mb-3">Ajouter une nouvelle catégorie</a></div>
    </div>
    </br>
    @if(session()->has("successDelete"))
      <div class="alert alert-success">
        <h3>{{session()->get('successDelete')}}</h3>
      </div>
      @endif
    <div>
      <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Libellé</th>
      <th scope="col">Cateégorie Parent</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $categorie)
    <tr>
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$categorie->libelle}}</td>
      <td>{{$categorie->parent_id}}</td>
      <td>{{$categorie->description}}</td>
      <td>
        <a href="{{route('categories.edit', ['categorie'=>$categorie->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette categorie?')){document.getElementById('form-{{$categorie->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$categorie->id}}" action="{{route('categories.supprimer', ['categorie'=>$categorie->id])}}" method="post"> 
          @csrf
          <input type="hidden" name="_method" value="delete">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
  </div>
@endsection