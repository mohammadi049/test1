<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','cin','adresse','ville','gsm','cin_image','releve_image','bac_image','groupe_id'];
    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
}
