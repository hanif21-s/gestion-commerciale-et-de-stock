@extends("admins.app")
@section('content')
<style>
    select.form-control{display:inline-block}

    body{margin-top:20px;
background-color: #f7f7ff;
}
#invoice {
    padding: 0px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #0d6efd
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #0d6efd
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,
.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #0d6efd;
    font-size: 1.2em
}

.invoice table .qty,
.invoice table .total,
.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #0d6efd
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #0d6efd;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0, 0, 0, 0);
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}

.invoice table tfoot tr:last-child td {
    color: #0d6efd;
    font-size: 1.4em;
    border-top: 1px solid #0d6efd
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px !important;
        overflow: hidden !important
    }
    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }
    .invoice>div:last-child {
        page-break-before: always
    }
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}
</style>
<div class="card">
    <div class="card-header">
        <h2 class="card-title"><b>Page d'enregistrement des ravitaillements</b></h2>
    </div></br>

    <div class="col-sm-4">
        <div class="form-group">
            <span style="white-space: nowrap">
                <label for="size">Fournisseur :</label>
                    <select class="form-control" required name="fournisseurs_id">
                        <option value="">Choisissez un fournisseur</option>
                        @foreach($fournisseurs as $fournisseur)
                        <option value="{{$fournisseur->id}}">{{$fournisseur->nom}} {{$fournisseur->prenoms}}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter un nouveau fournisseur</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau fournisseur</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                        <form style="width:65%;" method="post" action="{{route('fournisseurs.ajouter')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Société</label>
                                        <input type="text" class="form-control" required name="societe">
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" required name="adresse">
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Code Postal</label>
                                        <input type="number" class="form-control" required name="code_postal">
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Ville</label>
                                        <input type="text" class="form-control" required name="ville">
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Pays</label>
                                        <input type="text" class="form-control" required name="pays">
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Telephone</label>
                                        <input type="number" class="form-control" required name="tel">
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" required name="email">
                                      </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
            </span>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <span style="white-space: nowrap">
                <label for="size">Produit :</label>
                    <select class="form-control" required name="produits_id">
                        <option value="">Choisissez un produit</option>
                        @foreach($produits as $produit)
                        <option value="{{$produit->id}}">{{$produit->nom}}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" required name="quantite" placeholder="Entrez la quantité">&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" class="btn btn-success mb-3">Valider</a>
            </span>
        </div>
    </div>
            <div class="card-body">
                <div id="invoice">
                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <main>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th class="text-left">PRODUIT</th>
                                            <th class="text-right">PRIX UNITAIRE</th>
                                            <th class="text-right">QUANTITE</th>
                                            <th class="text-right">PRIX TOTAL</th>
                                            <th scope="col">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ligneravitaillements as $ligneravitaillement)
                                            <tr>
                                                <th scope="row">{{$loop->index + 1}}</th>
                                                <td>{{$ligneravitaillement->Produit['nom']}}</td>
                                                <td>{{$ligneravitaillement->Produit['prix_HT']}}</td>
                                                <td>{{$ligneravitaillement->quantite}}</td>
                                                <td>{{$ligneravitaillement->prix_total}}</td>
                                                <td>
                                                    <a href="{{route('ligneravitaillements.edit', ['ligneravitaillement'=>$ligneravitaillement->id])}}" class="btn btn-info"><i class="nav-icon fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette ligne de ravitaillement?')){document.getElementById('form-{{$ligneravitaillement->id}}').submit()}"><i class="nav-icon fas fa-trash-alt"></i></a>
                                                    <form id="form-{{$ligneravitaillement->id}}" action="{{route('ligneravitaillements.supprimer', ['ligneravitaillement'=>$ligneravitaillement->id])}}" method="post"> 
                                                      @csrf
                                                      <input type="hidden" name="_method" value="delete">
                                                    </form>
                                                  </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">TOTAL TTC =</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div style="text-align:center">
                                    <a href="#" class="btn btn-success">Valider</a>
                                    <a href="#" class="btn btn-danger">Annuler</a>
                                </div>
                            </main>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
</div>
@endsection