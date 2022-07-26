@extends("admins.app")
@section("content")
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Liste des produits commandés</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Produit</th>
              <th scope="col">Quantité</th>
              <th scope="col">Prix unitaire</th>
              <th scope="col">Prix total</th>
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
            <tfoot>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Produit</th>
              <th scope="col">Quantité</th>
              <th scope="col">Prix unitaire</th>
              <th scope="col">Prix total</th>
              <th scope="col">Etat</th>
              <th scope="col">Actions</th>
            </tr>
            </tfoot>
          </table>
          <div style="text-align:center"><a href="{{route('admins.commandes')}}" class="btn btn-success">Terminer la commande</a></div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des produits disponibles</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Prix HT</th>
          <th scope="col">Peremption</th>
          <th scope="col">Catégorie</th>
          <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($produits as $produit)
          <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td>{{$produit->nom}}</td>
            <td>{{$produit->prix_HT}}</td>
            <td>{{$produit->date_peremption}}</td>
            <td>{{$produit->Categorie['libelle']}}</td>
            <td>
              <a href="{{route('produits.createCommandeProduits', $produit->id)}}" class="btn btn-success">Vendre</a>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Prix HT</th>
          <th scope="col">Peremption</th>
          <th scope="col">Catégorie</th>
          <th scope="col">Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection
