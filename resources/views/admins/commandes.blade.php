@extends("admins.app")
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Liste des Commandes</h3>
    <div class="d-flex justify-content-end mb-2">
      <div><a href="{{route('commandes.create')}}" class="btn btn-primary mb-3">Enregistrer une nouvelle commande</a></div>
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
      <th scope="col">Date</th>
      <th scope="col">User</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($commandes as $commande)
    <tr>
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$commande->date}}</td>
      <td>{{$commande->User['name']}}</td>
      <td>
        <a href="{{route('commandes.edit', ['commande'=>$commande->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette commande?')){document.getElementById('form-{{$commande->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$commande->id}}" action="{{route('commandes.supprimer', ['commande'=>$commande->id])}}" method="post"> 
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