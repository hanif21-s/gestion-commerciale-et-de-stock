<style>
    .marq {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>
<div class="content-wrapper">

    <?php
                $produits = \App\Models\Produit::all();
                $date_alerte  = \Carbon\Carbon::now()->addDays(5)->format('Y-m-d');
                foreach ($produits as $produit) {
                    if($produit->qtte_stock <= $produit->stock_minimum){
                        ?>
                                    <marquee class="marq" bgcolor="red" behavior="" direction="">Le produit {{$produit->nom}} est en rupture de stock!</marquee>
                        <?php
                    }
                    if($date_alerte >= $produit->date_peremption){
                        ?>
                                    <marquee class="marq" bgcolor="red" behavior="" direction="">La date de peremption du produit {{$produit->nom}} est très proche!</marquee>
                        <?php
                    }
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
