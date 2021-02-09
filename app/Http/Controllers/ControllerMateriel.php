<?php

namespace App\Http\Controllers;

use App\Models\fournisseur;
use App\Models\materiel;
use App\Models\volontaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ControllerMateriel extends Controller
{

    public function index()
    {

         $materiels = materiel::all();


        return ( view('materiel.acceuil',compact('materiels')));
    }


    public function create()
    {
        //
        $fournisseurs=fournisseur::all();

         return (view('materiel.create',compact('fournisseurs')));
    }


    public function store(Request $request)
    {
        //
         $request->validate([
            'reference' => 'required',
            'prix' => 'required',
            'type' => 'required',
            'libelle' => 'required',
            'quantite' => 'required'

        ]);
         $materiel = materiel::create($request->all());
        $materiel->fournisseurs()->attach($request->idFournisseur,['date'=>date('Y-m-d H:i:s'),'quantite'=>$request->quantite]);
         return redirect()->route('materiel.index')
            ->with('success', 'Matériel creé avec succès.');

    }


    public function show($idMateriel)
    {
        //
        $materiel=materiel::find($idMateriel);
        $materiel->with('fournisseurs')->get();
        return (view('materiel.show',compact('materiel')));
    }


    public function edit($idMateriel)
    {
        //
        $materiel=materiel::find($idMateriel);
        $fournisseurs=fournisseur::all();
         return (view('materiel.edit',compact('materiel','fournisseurs')));
    }


    public function update( $idMateriel,Request $request)
    {
        //
        $request->validate([
            'reference' => 'required',
            'prix' => 'required',
            'type' => 'required',
            'libelle' => 'required',
           'quantite' => 'required'
        ]);
        $materiel = materiel::find($idMateriel);
        $materiel->update($request->all());
        $materiel->fournisseurs()->sync([$request->idFournisseur=>['date'=>date('Y-m-d H:i:s'),'quantite'=>$request->quantite]]);
         // $materiel->fournisseurs()->sync($request->idFournisseur,['date'=>date('Y-m-d H:i:s'),'quantite'=>$request->quantite]);
         //$materiel->fournisseurs()->sync(['date'=>date('Y-m-d H:i:s'),'quantite'=>$request->quantite]);
         return redirect()->route('materiel.index')
            ->with('success', 'Matériel modifié avec succès.');

    }


    public function destroy($idMateriel)
    {
        //
         $materiel=materiel::find($idMateriel);
         $materiel->delete();
          $materiel->fournisseurs()->detach();

         return redirect()->route('materiel.index')
            ->with('success', 'Matériel supprimé avec succès .');
    }
}
