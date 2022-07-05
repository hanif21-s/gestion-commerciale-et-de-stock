<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ravitaillement extends Model
{
    use HasFactory;

    protected $fillable = ["quantite","date", "produits_id",];

     public function Produit(){
        return $this->belongsTo(produit::class, 'produits_id');
    }
}
