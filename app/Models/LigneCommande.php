<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;

    protected $fillable = ["produits_id","quantite","prix_total","commandes_id"];

    public function Produit(){
        return $this->belongsTo(Produit::class, 'produits_id');
    }

     public function Commande(){
        return $this->belongsTo(Commande::class, 'commandes_id');
    }
}
