@extends("admins.app")
@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Liste des Ravitaillements</h3>
    <div class="d-flex justify-content-end mb-2">
    <div><a href="{{route('ravitaillements.create')}}" class="btn btn-primary mb-3">Ajouter un nouveau ravitaillement</a></div>
      
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
      <th scope="col">Quantité</th>
      <th scope="col">Date</th>
      <th scope="col">Produit</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($ravitaillements as $ravitaillement)
    <tr>
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$ravitaillement->quantite}}</td>
      <td>{{$ravitaillement->date}}</td>
      <td>{{$ravitaillement->Produit['nom']}}</td>
      <td>
        <a href="{{route('ravitaillements.edit', ['ravitaillement'=>$ravitaillement->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>

        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer ce ravitaillement?')){document.getElementById('form-{{$ravitaillement->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$ravitaillement->id}}" action="{{route('ravitaillements.supprimer', ['ravitaillement'=>$ravitaillement->id])}}" method="post"> 
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