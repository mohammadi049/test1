<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $fillable =['code','name','filiere_id'];
    public function getFiliere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }
    
}
