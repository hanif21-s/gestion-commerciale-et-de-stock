@extends("admins.app")
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Liste des clients</h3>
    <div class="d-flex justify-content-end mb-2">
      <div><a href="{{route('clients.create')}}" class="btn btn-primary mb-3">Ajouter un nouveau client</a></div>
    </div>
    </br>
    @if(session()->has("successDelete"))
      <div class="alert alert-success">
        <h3>{{session()->get('successDelete')}}</h3>
      </div>
    @endif
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
    <div>
      <table class="table table-bordered table-hover">
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
</table>
    </div>
  </div>
@endsection