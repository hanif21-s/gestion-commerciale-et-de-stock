<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = ["num_interne","date", "total_HT", "tva", "prix_remise", "total_TTC", "commandes_id", "remises_id", "reglements_id"];

    public function Client(){
        return $this->belongsTo(Client::class, 'clients_id');
    }

     public function Reglement(){
        return $this->belongsTo(Reglement::class, 'reglements_id');
    }

     public function Commande(){
        return $this->belongsTo(Commande::class, 'commandes_id');
    }
    public function Produit(){
        return $this->belongsTo(Produit::class, 'produits_id');
    }
    
}
