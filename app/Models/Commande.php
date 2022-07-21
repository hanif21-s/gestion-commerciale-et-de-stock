<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ["date", "users_id",];

    public function User(){
        return $this->belongsTo(User::class, 'users_id');
    }
    
    public function LigneCommande(){
        return $this->belongsToMany(LigneCommande::class);
    }
}
