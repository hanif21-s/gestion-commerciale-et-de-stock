<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ravitaillement extends Model
{
    use HasFactory;

    protected $fillable = ["date", "users_id", "fournisseurs_id", "decharge", "total_TTC" ];

    public function User(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function Fournisseur(){
        return $this->belongsTo(Fournisseur::class, 'fournisseurs_id');
    }
}
