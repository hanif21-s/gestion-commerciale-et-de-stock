<style type="text/css">
    body{margin-top:20px;
background-color: #f7f7ff;
}
#invoice {
    padding: 0px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
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
<div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a>
    												{{$logo}}
												</a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
									GERME-TECH
									</a>
                                    </h2>
                                    <div>Lomé-Agoè</div>
                                    <div>(228) 9759-0675</div>
                                    <div>contact@germetech.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light"><h2>Facture du client: <b>{{$client->nom}} {{$client->prenoms}}</b></h2></div>
                                    <div class="address">Adresse: {{$client->adresse}}</div>
                                    <div class="email"><a>Email: {{$client->email}}</a>
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">FACTURE NUMERO: {{$facture->num_interne}}</h1>
                                    <div class="date">Date de la facture: {{$facture->date}}</div>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th class="text-left">DESCRIPTION</th>
                                        <th class="text-right">PRIX UNITAIRE</th>
                                        <th class="text-right">QUANTITE</th>
                                        <th class="text-right">PRIX TOTAL</th>
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
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TOTAL HT</td>
                                        <td>{{$facture->total_HT}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TOTAL TAXE</td>
                                        <td>{{$facture->tva}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TOTAL REMISE</td>
                                        <td>{{$facture->prix_remise}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TOTAL TTC</td>
                                        <td>{{$facture->total_TTC}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="thanks">Merci à vous!</div>
                            <div class="notices">
                                <div>SIGNATURE DU VENDEUR:</div>
                                <div class="notice"></div>
                            </div>
                        </main>
                        <footer>Copyright © 2022 #HanifZer</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>