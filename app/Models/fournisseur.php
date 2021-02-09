<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;
    protected $fillable = ['referenceFournisseur','nom','telephone','email','adresse'];

    public function getRouteKeyName()
    {

        return 'referenceFournisseur';
    }

    public function materiels(){

<<<<<<< HEAD
        return $this->belongsToMany('App\Models\materiel','fournis','idFournisseur','idMateriel')
=======
        return $this->belongsToMany('App\Models\materiel','fournis',' idFournisseur','idMateriel')
>>>>>>> 9e36fe4bfbb7bf486d3f44b2ac8b9288159eb90d
                                    ->withPivot('quantite','date')
                                    ->withTimestamps();
    }
    protected $primaryKey ='idFournisseur';
}
