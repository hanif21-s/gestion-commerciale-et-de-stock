<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneRavitaillement extends Model
{
    use HasFactory;

    protected $fillable = ["produits_id","quantite","prix_total","ravitaillements_id","prix"];

    public function Produit(){
        return $this->belongsTo(Produit::class, 'produits_id');
    }

     public function Ravitaillement(){
        return $this->belongsTo(Commande::class, 'ravitaillements_id');
    }
}
