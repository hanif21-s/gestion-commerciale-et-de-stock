@extends("admins.app")
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Liste des Utilisateurs</h3>
    <div class="d-flex justify-content-end mb-2">
      <div><a href="{{route('utilisateurs.create')}}" class="btn btn-primary mb-3">Ajouter un nouvel utilisateur</a></div>
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
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Tel</th>
      <th scope="col">Adresse</th>
      <th scope="col">Sexe</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ($users as $user)
    <tr>
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->tel}}</td>
      <td>{{$user->adresse}}</td>
      <td>{{$user->sexe}}</td>
      <td>
        <a href="{{route('utilisateurs.edit', ['utilisateur'=>$user->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cet utilisateur?')){document.getElementById('form-{{$user->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$user->id}}" action="{{route('utilisateurs.supprimer', ['utilisateur'=>$user->id])}}" method="post"> 
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