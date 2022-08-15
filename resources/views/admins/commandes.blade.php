@extends("admins.app")
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des commandes</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('commandes.create')}}" class="btn btn-primary mb-3">Nouvelle commande</a></div>
      </div>
    </div>
    @if(session()->has("success"))
      <div class="alert alert-success">
        <h3>{{session()->get('success')}}</h3>
      </div>
      @endif
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
            <th scope="col">N° de commande</th>
            <th scope="col">Date</th>
            <th scope="col">User</th>
            <th scope="col">Client</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($commandes as $commande)
    <tr>
      <th scope="row">{{$commande->num_interne}}</th>
      <td>{{$commande->date}}</td>
      <td>{{$commande->User['name']}}</td>
      <td>{{$commande->Client['nom']}} {{$commande->Client['prenoms']}}</td>
      <td>
        <a href="{{route('commandes.see', ['commande'=>$commande->id])}}" class="btn btn-success" title="Voir"><i class="nav-icon fas fa-eye"></i></a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette commande?')){document.getElementById('form-{{$commande->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$commande->id}}" action="{{route('commandes.supprimer', ['commande'=>$commande->id])}}" method="post">
          @csrf
          <input type="hidden" name="_method" value="delete">
        </form>
      </td>
    </tr>
    @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th scope="col">N° de commande</th>
            <th scope="col">Date</th>
            <th scope="col">User</th>
            <th scope="col">Client</th>
            <th scope="col">Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
