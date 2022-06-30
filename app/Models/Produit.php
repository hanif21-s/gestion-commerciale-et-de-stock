<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ["nom","qtte_stock","prix_achat","prix_HT","stock_minimum","date_peremption","benefice", "categories_id","taxes_id","remises_id","fournisseurs_id"];

    public function Categorie(){
        return $this->belongsTo(Categorie::class, 'categories_id');
    }

    public function Taxe(){
        return $this->belongsTo(Taxe::class, 'taxes_id');
    }

    public function Remise(){
        return $this->belongsTo(Remise::class, 'remises_id');
    }

    public function Fournisseur(){
        return $this->belongsTo(Fournisseur::class, 'fournisseurs_id');
    }
}
