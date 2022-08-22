@extends("admins.app")
@section('content')
<style>
    #number {
  width: 3em;
}
</style>
<div class="container-fluid">
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      </ul>
    </div>
    @endif
    <form action="{{route('admins.factures',['commande'=>$commande->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="put">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">COMMANDE N° <b>{{$commande->num_interne}}</b></h3>
                </div>
                <div class="card-body">
                    <h6>DATE : {{$date}}</h6></br>
                    <h6>CLIENT : {{$commande->Client['nom']}} {{$commande->Client['prenoms']}}</h6></br>
                    <h6>VENDEUR : {{$commande->User['name']}}</h6></br>
                    <h6>REMISE : {{$commande->Remise['libelle']}}</h6></br>
                    <h6>REGLEMENT : {{$commande->Reglement['libelle']}}</h6></br>
                    <h6>TOTAL_HT : <b>{{$value}} FCFA</b></h6></br>
                    <h6>TOTAL TVA : <b>{{$prix_taxe}} FCFA</b></h6></br>
                    <h6>TOTAL REMISE : <b>{{$prix_remise}} FCFA</b></h6></br>
                    <h6><u>Total TTC :</u> <b>{{$total_ttc}} FCFA</b></h6>
                    <div style="text-align:center">
                        <HR size=2 width="100%">
                        <label for="size"><h4>BILLETAGE MONNAIE</h4></label>
                        <HR size=2 width="100%">
                        <label for="size"><i class="nav-icon fas fa-money-bill"></i> 10 000</label>
                        <input type="number" required name="MB_10000" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                        <label for="size"><i class="nav-icon fas fa-money-bill"></i> 5000</label>
                        <input type="number" required name="MB_5000" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                        <label for="size"><i class="nav-icon fas fa-money-bill"></i> 2000</label>
                        <input type="number" required name="MB_2000" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                        <label for="size"><i class="nav-icon fas fa-money-bill"></i> 1000</label>
                        <input type="number" required name="MB_1000" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br>
                        <label for="size"><i class="nav-icon fas fa-money-bill"></i> 500</label>
                        <input type="number" required name="MB_500" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                        <label for="size"><i class="nav-icon fas fa-coins"></i> 500F:</label>
                        <input type="number" required name="MP_500" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                        <label for="size"><i class="nav-icon fas fa-coins"></i> 250F:</label>
                        <input type="number" required name="MP_250" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                        <label for="size"><i class="nav-icon fas fa-coins"></i> 200F</label>
                        <input type="number" required name="MP_200" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br>
                        <label for="size"><i class="nav-icon fas fa-coins"></i> 100F:</label>
                        <input type="number" required name="MP_100" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                        <label for="size"><i class="nav-icon fas fa-coins"></i> 50F</label>
                        <input type="number" required name="MP_50" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                        <label for="size"><i class="nav-icon fas fa-coins"></i> 25F</label>
                        <input type="number" required name="MP_25" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                        <label for="size"><i class="nav-icon fas fa-coins"></i> 10F</label>
                        <input type="number" required name="MP_10" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br>
                        <label for="size"><i class="nav-icon fas fa-coins"></i> 5F</label>
                        <input type="number" required name="MP_5" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br></br>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Produits commandés</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Description</th>
                                <th>Prix unitaire</th>
                                <th>Quantité</th>
                                <th>Prix Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lignecommandes as $lignecommande)
                                <tr>
                                    <th scope="row">{{$loop->index + 1}}</th>
                                    <td>{{$lignecommande->Produit['nom']}}</td>
                                    <td>{{$lignecommande->Produit['prix_HT']}}</td>
                                    <td>{{$lignecommande->quantite}}</td>
                                    <td>{{$lignecommande->prix_total}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table></br>
                    <tfoot>
                        <div style="text-align:center">
                            <label for="size">Reglement du client :</label>
                            <input type="number" required name="reglement_client" placeholder="Entrez le montant"  min="1">
                            <HR size=2 width="100%">
                            <label for="size"><h4>BILLETAGE REGLEMENT</h4></label>
                            <HR size=2 width="100%">
                            <label for="size"><i class="nav-icon fas fa-money-bill"></i> 10 000</label>
                            <input type="number" required name="B_10000" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-money-bill"></i> 5000</label>
                            <input type="number" required name="B_5000" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-money-bill"></i> 2000</label>
                            <input type="number" required name="B_2000" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-money-bill"></i> 1000</label>
                            <input type="number" required name="B_1000" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br>
                            <label for="size"><i class="nav-icon fas fa-money-bill"></i> 500</label>
                            <input type="number" required name="B_500" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 500F:</label>
                            <input type="number" required name="P_500" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 250F:</label>
                            <input type="number" required name="P_250" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 200F</label>
                            <input type="number" required name="P_200" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br>
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 100F:</label>
                            <input type="number" required name="P_100" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 50F</label>
                            <input type="number" required name="P_50" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 25F</label>
                            <input type="number" required name="P_25" placeholder="Entrez le nombre"  min="0" value="0" id="number">
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 10F</label>
                            <input type="number" required name="P_10" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br>
                            <label for="size"><i class="nav-icon fas fa-coins"></i> 5F</label>
                            <input type="number" required name="P_5" placeholder="Entrez le nombre"  min="0" value="0" id="number"></br></br>
                            <button type="submit" class="btn btn-success">Terminer</button>
                        </div>
                    </tfoot></br>
                </div>

            </div>
        </div>
    </div>
    </form>
</div>
@endsection
