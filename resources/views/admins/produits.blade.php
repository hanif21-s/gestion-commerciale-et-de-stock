@extends("admins.app")
@section("content")
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Liste des produits</b></h3>
      <div class="d-flex justify-content-end">
        <div><a href="{{route('produits.create')}}" class="btn btn-primary mb-3">Ajouter un nouveau produit</a></div>
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
            <th scope="col">Nom</th>
            <th scope="col">Qtte stock</th>
            <th scope="col">Prix HT</th>
            <th scope="col">Stock minimum</th>
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
            <td>{{$produit->qtte_stock}}</td>
            <td>{{$produit->prix_HT}}</td>
            <td>{{$produit->stock_minimum}}</td>
            <td>{{$produit->date_peremption}}</td>
            <td>{{$produit->Categorie['libelle']}}</td>
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
        <tfoot>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Qtte stock</th>
            <th scope="col">Prix HT</th>
            <th scope="col">Stock minimum</th>
            <th scope="col">Peremption</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
