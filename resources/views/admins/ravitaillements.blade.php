@extends("admins.app")
@section("content")
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des ravitaillements</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('ravitaillements.create')}}" class="btn btn-primary mb-3">Nouveau ravitaillement</a></div>
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
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Fournisseur</th>
            <th scope="col">User</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($ravitaillements as $ravitaillement)
    <tr>
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$ravitaillement->date}}</td>
      <td>{{$ravitaillement->Fournisseur['societe']}}</td>
      <td>{{$ravitaillement->User['name']}}</td>
      <td>
        <a href="{{route('ravitaillements.see', ['ravitaillement'=>$ravitaillement->id])}}" class="btn btn-success" title="Voir les détails du ravitaillement"><i class="nav-icon fas fa-eye"></i></a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer ce ravitaillement?')){document.getElementById('form-{{$ravitaillement->id}}').submit()}" title="Supprimer le ravitaillement"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$ravitaillement->id}}" action="{{route('ravitaillements.supprimer', ['ravitaillement'=>$ravitaillement->id])}}" method="post">
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
            <th scope="col">Date</th>
            <th scope="col">Fournisseur</th>
            <th scope="col">User</th>
            <th scope="col">Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
