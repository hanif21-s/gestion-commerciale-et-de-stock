@extends("admins.app")
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Liste des Fournisseurs</h3>
    <div class="d-flex justify-content-end mb-2">
      <div><a href="{{route('fournisseurs.create')}}" class="btn btn-primary mb-3">Ajouter un nouveau fournisseur</a></div>
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
      <th scope="col">Société</th>
      <th scope="col">Adresse</th>
      <th scope="col">Code Postal</th>
      <th scope="col">Ville</th>
      <th scope="col">Pays</th>
      <th scope="col">Tel</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($fournisseurs as $fournisseur)
    <tr>
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$fournisseur->societe}}</td>
      <td>{{$fournisseur->adresse}}</td>
      <td>{{$fournisseur->code_postal}}</td>
      <td>{{$fournisseur->ville}}</td>
      <td>{{$fournisseur->pays}}</td>
      <td>{{$fournisseur->tel}}</td>
      <td>{{$fournisseur->email}}</td>
      <td>
        <a href="{{route('fournisseurs.edit', ['fournisseur'=>$fournisseur->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer ce fournisseur?')){document.getElementById('form-{{$fournisseur->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$fournisseur->id}}" action="{{route('fournisseurs.supprimer', ['fournisseur'=>$fournisseur->id])}}" method="post"> 
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