@extends("admins.app")
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des clients</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('clients.create')}}" class="btn btn-primary mb-3">Ajouter un nouveau client</a></div>
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
            <th scope="col">Nom</th>
            <th scope="col">Prenoms</th>
            <th scope="col">Email</th>
            <th scope="col">Tel</th>
            <th scope="col">Adresse</th>
            <th scope="col">Sexe</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clients as $client)
    <tr>
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$client->nom}}</td>
      <td>{{$client->prenoms}}</td>
      <td>{{$client->email}}</td>
      <td>{{$client->tel}}</td>
      <td>{{$client->adresse}}</td>
      <td>{{$client->sexe}}</td>
      <td>
        <a href="{{route('commandes.create', $client->id)}}" class="btn btn-secondary">Effectuer une commande</a>
        <a href="{{route('clients.edit', ['client'=>$client->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer ce client?')){document.getElementById('form-{{$client->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$client->id}}" action="{{route('clients.supprimer', ['client'=>$client->id])}}" method="post"> 
          @csrf
          <input type="hidden" name="_method" value="delete">
        </form>
      </td>
    </tr>
    @endforeach
        </tbody>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenoms</th>
          <th scope="col">Email</th>
          <th scope="col">Tel</th>
          <th scope="col">Adresse</th>
          <th scope="col">Sexe</th>
          <th scope="col">Actions</th>
        </tr>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection