<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ["nom","qtte_stock","prix_HT","stock_minimum","date_peremption", "categories_id","taxes_id","remises_id","fournisseurs_id"];

    public function Categorie(){
        return $this->belongsTo(Categorie::class, 'categories_id');
    }
}
