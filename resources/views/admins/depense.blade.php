@extends("admins.app")
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des depenses</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('depenses.create')}}" class="btn btn-primary mb-3">Depenser</a></div>
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
            <th scope="col">Libellé</th>
            <th scope="col">Montant</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($depenses as $depense)
          <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td>{{$depense->date}}</td>
            <td>{{$depense->libelle}}</td>
            <td>{{$depense->montant}}</td>
            <td>{{$depense->User['name']}}</td>
            <td>
              <a href="{{route('depenses.edit', ['depense'=>$depense->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
              <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette depense?')){document.getElementById('form-{{$depense->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
              <form id="form-{{$depense->id}}" action="{{route('depenses.supprimer', ['depense'=>$depense->id])}}" method="post">
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
            <th scope="col">Libellé</th>
            <th scope="col">Montant</th>
            <th scope="col">Utilisateur</th>
            <th scope="col">Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
