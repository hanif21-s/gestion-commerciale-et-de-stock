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
        <h2 class="card-title"><b>Page d'enregistrement de ravitaillement</b></h2>
    </div></br>
    <form>
    <div class="col-sm-4">
        <div class="form-group">
            <span style="white-space: nowrap">
                <label for="size">Date du ravitaillement : <input type="date" name="date" required id="date" max="{{now()->toDateString('Y-m-d')}}"> </label>
            </span>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <span style="white-space: nowrap">
                <label for="size">Fournisseur :</label>
                    <select class="form-control" required name="fournisseurs_id" id="fournisseur">
                        <option value="">Choisissez un fournisseur</option>
                        @foreach($fournisseurs as $fournisseur)
                        <option value="{{$fournisseur->id}}">{{$fournisseur->societe}}</option>
                        @endforeach
                    </select>
            </span>

        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <span style="white-space: nowrap">
                <label for="size">Decharge : <input type="file" name="decharge" id="decharge" required> </label>
            </span>
        </div>
    </div>

    <div id="alert_place"></div>
    <div class="col-sm-4">
        <div class="form-group">
            <span style="white-space: nowrap">
                <form action="">
                <label for="size">Produit :</label>
                    <select class="form-control" required name="produits_id" id="produit">
                        <option value="">Choisissez un produit</option>
                        @foreach($produits as $produit)
                        <option value="{{$produit->id}}">{{$produit->nom}}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" required name="prix" placeholder="Entrez le prix"  min="1" id="prix">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" required name="quantite" placeholder="Entrez la quantité"  min="1" id="qty">&nbsp;&nbsp;&nbsp;&nbsp;
                    <textarea name="all_detail_added" id="all_detail_added" cols="30" rows="10" style="display: none;"></textarea>
                        <button type="button" class="btn badge-danger" onclick="add_detail_demande()"><i class="fas fa-plus"></i> Ajouter</button>
                </form>
            </span>

        </div>
    </div>
            <div class="card-body">
                <div id="invoice">
                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <main>
                                <table id="tab_temp_preview">
                                    <thead>
                                        <tr>
                                            <th scope="col">PRODUIT</th>
                                            <th scope="col">PRIX</th>
                                            <th scope="col">QUANTITE</th>
                                            <th scope="col">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rows">

                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">TOTAL HT =</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">TOTAL TAXE =</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">TOTAL TTC =</td>
                                            <td></td>
                                        </tr>
                                    </tfoot> --}}
                                </table>
<div style="text-align:center">
    <button type="button" class="btn btn-primary" onclick="save_demande()" >Valider</button>
</div>
                            </main>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
        </form>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function add_detail_demande(){
        var produit = $('#produit').val();
        var produit_text = $("#produit option:selected").text();
        var prix = $('#prix').val();
        var quantite = $('#qty').val();

        if (produit != '' && quantite != '' && prix != '') {
            var old_detail_added = $("#all_detail_added").val();
            var search_position = old_detail_added.search('###' + produit);
            if (search_position >= 0) {
                msg = '<div class="alert alert-danger alert-dismissible show fade" style="margin-bottom: 30px">' + ' <div class="alert-body">' +
                    ' Ce produit est déjà ajouté à la liste' + '</div>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' + '</div>';
                $('#alert_place').show();
                $('#alert_place').html(msg);
            }else if(quantite<1){
                msg = '<div class="alert alert-danger alert-dismissible show fade" style="margin-bottom: 30px">' + ' <div class="alert-body">' +
                    ' Quantité saisie incorrecte' + '</div>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' + '</div>';
                $('#alert_place').show();
                $('#alert_place').html(msg);
            }else if(prix<1){
                msg = '<div class="alert alert-danger alert-dismissible show fade" style="margin-bottom: 30px">' + ' <div class="alert-body">' +
                    ' Prix saisie incorrecte' + '</div>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' + '</div>';
                $('#alert_place').show();
                $('#alert_place').html(msg);
            }
            else{
                var new_data = produit + ';;;' + prix + ';;;' + quantite;
                $("#all_detail_added").val(old_detail_added + '###' + new_data + '*');

                var newCell = document.createElement("td");
                var newCell1 = document.createElement("td");
                var newCell2 = document.createElement("td");
                var newCell3 = document.createElement("td");

                newCell.innerHTML = produit_text;
                newCell1.innerHTML = prix;
                newCell2.innerHTML = quantite;
                newCell3.innerHTML = '<i class="fa fa-trash" style="color:red" onclick="delete_detail(\'' + new_data + '\', this)"></i>';

                var newRow = document.createElement("tr");

                newRow.append(newCell);
                newRow.append(newCell1);
                newRow.append(newCell2);
                newRow.append(newCell3);

                document.getElementById("rows").appendChild(newRow);

                document.getElementById('produit').value = '';
                document.getElementById('prix').value = '';
                document.getElementById('qty').value = '';

                msg = '<div class="alert alert-success alert-dismissible show fade" style="margin-bottom: 30px">' +
                    '<div class="alert-body">' +
                    'Produit ajouté avec succès' +
                    '</div>' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>';




                $('#alert_place').show();
                $('#alert_place').html(msg);
            }

        }
        else{
            msg = '<div class="alert alert-danger alert-dismissible show fade" style="margin-bottom: 30px">' +
                '<div class="alert-body">' +
                'Veuillez renseigner les champs' +
                '</div>' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>';

            $('#alert_place').show();
            $('#alert_place').html(msg);
        }
    }

    function delete_detail(data, element) {
        var correct_data = '###' + data + '*';
        var row_index = element.closest('tr').rowIndex;

        var all_detail_added = $("#all_detail_added").val();
        var res = all_detail_added.replace(correct_data, ""); // SUPPRESSION DE L'ELEMENT DANS LE CHAMP CACHE
        $("#all_detail_added").val(res);
        document.getElementById("tab_temp_preview").deleteRow(row_index); // SUPPRESSION DE L'ELEMENT DANS LE TABLEAU
    }

    function save_demande(){
        let url = "{{ route('ravitaillements.ajouter') }}";
        let date = $('#date').val();
        let fournisseur = $('#fournisseur').val();
        let decharge = $('#decharge').val();
        let all_detail_added = $('#all_detail_added').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        if (date != "", fournisseur != "", decharge != "", all_detail_added != ""){
            $.ajax({
                url: url,
                method: "post",
                data: {
                    date: date,
                    fournisseur: fournisseur,
                    decharge: decharge,
                    all_detail_added: all_detail_added,
                    _token: _token
                },
                success: function(result) {
                    console.log(result);
                        if (result == "ok") {
                            window.location.href = "{{url('/admins/ravitaillements')}}";
                        }
                },error: function (request, status, error) {
                    alert(request.responseText);
                    }
            });
        } else {
            var err = '<div class="alert alert-warning alert-dismissible fade show" role="alert">' +
                'Veuillez renseigner tous les champs obligatoire' + '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + '<span aria-hidden="true">&times;</span>' + '</button>' + '</div>';
            $('#alert_place_g').html(err);
        }
    }
</script>

