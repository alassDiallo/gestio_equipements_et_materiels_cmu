<?php

use App\Models\structure;

if(! function_exists("referenceStructure")){
function referenceStructure(){
    $ref = rand(100000,1000000)."REF";
    if(structure::where('reference',$ref)->count() >0)
    return referenceStructure();
    return $ref;
}

}

if(! function_exists("referenceVolontaire")){
    function referenceVolontaire(){
        $ref = rand(100000,1000000)."VOL";
        if(volontaire::where('reference',$ref)->count() >0)
        return referenceVolontaire();
        return $ref;
    }
    
    }