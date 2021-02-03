<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class volontaire extends Model
{
    use HasFactory;

    protected $fillable = ['nom','prenom','adresse','telephone','dateDeNaissance','lieuDeNaissance','email','numeroCIN','reference'];
}
