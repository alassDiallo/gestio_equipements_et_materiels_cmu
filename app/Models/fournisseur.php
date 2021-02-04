<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;
    protected $fillable = ['referenceFournisseur','nom','prenom','telephone','email','adresse'];

    public function getRouteKeyName()
    {
        
        return 'referenceFournisseur';
    }

    public function materiels(){

        return $this->belongsToMany('App\Models\materiel','fournis')
                                    ->withPivot('quantite','date')
                                    ->withTimestamps();
    }
}
