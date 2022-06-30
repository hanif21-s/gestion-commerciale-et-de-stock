@extends("admins.app")
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Liste des Taxes</h3>
    <div class="d-flex justify-content-end mb-2">
      <div><a href="{{route('taxes.create')}}" class="btn btn-primary mb-3">Ajouter une nouvelle taxe</a></div>
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
      <th scope="col">Libellé</th>
      <th scope="col">Taux (%)</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($taxes as $taxe)
    <tr>
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$taxe->libelle}}</td>
      <td>{{$taxe->taux}}</td>
      <td>
        <a href="{{route('taxes.edit', ['taxe'=>$taxe->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette taxe?')){document.getElementById('form-{{$taxe->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$taxe->id}}" action="{{route('taxes.supprimer', ['taxe'=>$taxe->id])}}" method="post"> 
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