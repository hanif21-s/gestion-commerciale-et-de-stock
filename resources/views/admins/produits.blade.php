@extends("admins.app")
@section("content")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-3">Liste des Produits</h3>
    <div class="d-flex justify-content-end mb-2">
        <div><a href="{{route('produits.create')}}" class="btn btn-primary mb-3">Ajouter un nouveau produit</a></div>
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
      
      <th scope="col">Nom</th>
      <th scope="col">Qtte stock</th>
      <th scope="col">Prix d'achat</th>
      <th scope="col">Prix HT</th>
      <th scope="col">Stock minimum</th>
      <th scope="col">Peremption</th>
      <th scope="col">Benefice</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Taxe</th>
      <th scope="col">Remise</th>
      <th scope="col">Fournisseur</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
     @foreach($produits as $produit)
    <tr>
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$produit->nom}}</td>
      <td>{{$produit->qtte_stock}}</td>
      <td>{{$produit->prix_achat}}</td>
      <td>{{$produit->prix_HT}}</td>
      <td>{{$produit->stock_minimum}}</td>
      <td>{{$produit->date_peremption}}</td>
      <td>{{$produit->benefice}}</td>
      <td>{{$produit->Categorie['libelle']}}</td>
      <td>{{$produit->Taxe['libelle']}}</td>
      <td>{{$produit->Remise['libelle']}}</td>
      <td>{{$produit->Fournisseur['societe']}}</td>
      <td>
        <a href="{{route('produits.edit', ['produit'=>$produit->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>

        <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer ce produit?')){document.getElementById('form-{{$produit->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
        <form id="form-{{$produit->id}}" action="{{route('produits.supprimer', ['produit'=>$produit->id])}}" method="post"> 
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