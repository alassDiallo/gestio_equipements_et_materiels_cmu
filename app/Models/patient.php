<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenom','adresse','telephone','dateDeNaissance','lieuDeNaissance','sexe','numeroCIN','referencePatient'];
}
