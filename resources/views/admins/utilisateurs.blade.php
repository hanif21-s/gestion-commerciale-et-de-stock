@extends("admins.app")
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des utilisateurs</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('utilisateurs.create')}}" class="btn btn-primary mb-3">Ajouter un nouvel utilisateur</a></div>
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
            <th scope="col">Name</th>
            <th scope="col">Role</th>
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
      <td>
        @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $val)
                <label class="badge badge-dark">{{ $val }}</label>
            @endforeach
        @endif
    </td>
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
        <tfoot>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Tel</th>
            <th scope="col">Adresse</th>
            <th scope="col">Sexe</th>
            <th scope="col">Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
