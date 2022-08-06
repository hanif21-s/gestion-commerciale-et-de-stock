@extends("admins.app")
@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Facture courant</h3>
    <div class="d-flex justify-content-end mb-2">
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
      <th scope="col">Num interne</th>
      <th scope="col">Date</th>
      <th scope="col">Total HT</th>
      <th scope="col">Prix TVA</th>
      <th scope="col">Prix Remise</th>
      <th scope="col">Total TTC</th>
      <th scope="col">Commmande</th>
      <th scope="col">Reglement</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($factures as $facture)
    <tr>
      <td>{{$facture->num_interne}}</td>
      <td>{{$facture->date}}</td>
      <td>{{$facture->total_HT}}</td>
      <td>{{$facture->tva}}</td>
      <td>{{$facture->prix_remise}}</td>
      <td>{{$facture->total_TTC}}</td>
      <td>{{$facture->commandes_id}}</td>
      <td>{{$facture->reglements_id}}</td>
      <td>
        <a href="{{route('generate', ['facture'=>$facture->id])}}" class="btn btn-success">Imprimer</a>
      </td>
    </tr>
    @endforeach
  
  </tbody>
</table>
    </div>
    
  </div>
@endsection