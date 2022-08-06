<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ravitaillement extends Model
{
    use HasFactory;

    protected $fillable = ["quantite","date","decharge" , "produits_id", "fournisseurs_id" ];

     public function Produit(){
        return $this->belongsTo(Produit::class, 'produits_id');
    }

    public function Fournisseur(){
        return $this->belongsTo(Fournisseur::class, 'fournisseurs_id');
    }
}
