@extends("admins.app")
@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des remises</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('remises.create')}}" class="btn btn-primary mb-3">Ajouter une nouvelle remise</a></div>
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
            <th scope="col">Taux (%)</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($remises as $remise)
          <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td>{{$remise->libelle}}</td>
            <td>{{$remise->taux}}</td>
            <td>
              <a href="{{route('remises.edit', ['remise'=>$remise->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
              <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette remise?')){document.getElementById('form-{{$remise->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
              <form id="form-{{$remise->id}}" action="{{route('remises.supprimer', ['remise'=>$remise->id])}}" method="post"> 
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
            <th scope="col">Taux (%)</th>
            <th scope="col">Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection