<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ["date", "users_id", "clients_id", "etat", "num_interne","tva", "prix_remise", "total_TTC", "remises_id", "reglements_id", "reglement_client"];

    public function User(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function Client(){
        return $this->belongsTo(Client::class, 'clients_id');
    }

    public function LigneCommande(){
        return $this->belongsToMany(LigneCommande::class);
    }

    public function Reglement(){
        return $this->belongsTo(Reglement::class, 'reglements_id');
    }

     public function Remise(){
        return $this->belongsTo(Remise::class, 'remises_id');
    }
}
