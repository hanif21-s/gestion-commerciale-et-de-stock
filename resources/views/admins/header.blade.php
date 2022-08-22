<style>
    .marq {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>
<div class="content-wrapper">

    <?php
                $produits = \App\Models\Produit::all();
                foreach ($produits as $produit) {
                    if($produit->qtte_stock <= $produit->stock_minimum){
                        ?>
                                    <marquee class="marq" bgcolor="red" behavior="" direction="">Le produit {{$produit->nom}} est en rupture de stock!</marquee>
                        <?php
                    }

                    /* $date = now()->toDateString('d-m-Y');
                    dd($date);

                    if($produit->qtte_stock <= $produit->stock_minimum){
                        ?>
                            <div Align="center">
                                <span class="right badge badge-danger">
                                    <h5>{{$produit->nom}} est en rupture de stock!</h5></br>
                                </span>
                            </div>
                        <?php
                    } */
                }
            ?>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li> --}}
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
