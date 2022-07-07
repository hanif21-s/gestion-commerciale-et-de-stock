@extends("admins.app")
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Liste des lignes de commande</h3>
    <div class="d-flex justify-content-end mb-2">
      <div><a href="{{route('lignecommandes.create')}}" class="btn btn-primary mb-3">Enregistrer une nouvelle ligne commande</a></div>
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
      <th scope="col">Produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix unitaire</th>
      <th scope="col">Prix total</th>
      <th scope="col">N° de commande</th>
      <th scope="col">Etat</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($lignecommandes as $lignecommande)
    <tr>
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$lignecommande->Produit['nom']}}</td>
      <td>{{$lignecommande->quantite}}</td>
      <td>{{$lignecommande->Produit['prix_HT']}}</td>
      <td>{{$lignecommande->Produit['prix_HT'] * $lignecommande->quantite}}</td>
      <td>{{$lignecommande->commandes_id}}</td>
      <td>{{$lignecommande->etat}}</td>
      <td>
        <a href="{{route('lignecommandes.edit', ['lignecommande'=>$lignecommande->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette ligne de commande?')){document.getElementById('form-{{$lignecommande->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$lignecommande->id}}" action="{{route('lignecommandes.supprimer', ['lignecommande'=>$lignecommande->id])}}" method="post"> 
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