<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billetage extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'B_10000',
        'B_5000',
        'B_2000',
        'B_1000',
        'B_500',
        'P_500',
        'P_250',
        'P_200',
        'P_100',
        'P_50',
        'P_25',
        'P_10',
        'P_5',
        'total',
        'commandes_id',
        'depenses_id',
    ];

    public function Commande(){
        return $this->belongsTo(Commande::class, 'commandes_id');
    }
    public function Depense(){
        return $this->belongsTo(Commande::class, 'depenses_id');
    }
}
