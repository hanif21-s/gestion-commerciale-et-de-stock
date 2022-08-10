@extends("admins.app")
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des catégories</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('categories.create')}}" class="btn btn-primary mb-3">Ajouter une nouvelle catégorie</a></div>
      </div>
    </div>
    @if(session()->has("successDelete"))
      <div class="alert alert-success">
        <h3>{{session()->get('successDelete')}}</h3>
      </div>
      @endif
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          <tr> 
            <th scope="col">#</th>
            <th scope="col">Libellé</th>
            <th scope="col">Catégorie Parent</th>
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
        <tfoot>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Libellé</th>
            <th scope="col">Cateégorie Parent</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
