<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ["libelle","parent_id","description"];

    public function children() {
        return $this->hasMany(Categorie::class, 'parent_id');
    }
}
