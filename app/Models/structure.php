<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class structure extends Model
{
    use HasFactory;
    protected $fillable = ['nom','adresse','telephone','reference','region'];

    public function getRouteKeyName(){

        return 'reference';
    }

    public function patients(){
        return $this->BelongsToMany(' App\Models\patient','consulters')
                                    ->withTimestamps();
    }

    public function volontaires(){
        return $this->hasMany('App\Models\volontaire')
                                    ->withTimestamps();
    }
}
