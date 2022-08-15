<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'libelle',
        'montant',
        'users_id',
    ];

    public function User(){
        return $this->belongsTo(User::class, 'users_id');
    }
}
