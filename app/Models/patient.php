<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenom','adresse','telephone','dateDeNaissance','lieuDeNaissance','sexe','numeroCIN','referencePatient'];

   public function etRouteKeyName(){

    return 'referencePatient';
   }
   
    public function structures(){

        return $this->belongsToMany('App\Models\structure','consulters','idPatient','idStructure')
                                    ->withTimestamps();
    }

    public function consultations(){

        return $this->hasMany('App\Models\consultation')
                                    ->withTimestamps();
    }
}
