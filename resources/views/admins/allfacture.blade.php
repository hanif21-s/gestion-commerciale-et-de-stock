@extends("admins.app")
@section("content")
    <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">DUPLICATAS</h3>
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
      <table id="example2" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">Num interne</th>
      <th scope="col">Date</th>
      <th scope="col">Client</th>
      <th scope="col">Prix TVA</th>
      <th scope="col">Prix Remise</th>
      <th scope="col">Total TTC</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($commandes as $commande)
    <tr>
      <td>{{$commande->num_interne}}</td>
      <td>{{$commande->date}}</td>
      <td>{{$commande->Client['nom']}} {{$commande->Client['prenoms']}}</td>
      <td>{{$commande->tva}}</td>
      <td>{{$commande->prix_remise}}</td>
      <td>{{$commande->total_TTC}}</td>
      <td>
        <a href="{{route('sale', ['commande'=>$commande->id])}}" class="btn btn-success" title="voir"><i class="nav-icon fas fa-eye"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th scope="col">Num interne</th>
      <th scope="col">Date</th>
      <th scope="col">Client</th>
      <th scope="col">Prix TVA</th>
      <th scope="col">Prix Remise</th>
      <th scope="col">Total TTC</th>
      <th scope="col">Action</th>
    </tr>
</tfoot>
</table>
    </div>

  </div>
@endsection
