<?php

namespace App\Http\Controllers;

use App\Models\fournisseur;
use Illuminate\Http\Request;

class ControllerFournisseur extends Controller
{

    public function index()
    {
         $fournisseurs = fournisseur::all();

        return ( view('fournisseur.acceuil',compact('fournisseurs')));
    }

    public function create()
    {

         return (view('fournisseur.create'));
    }


    public function store(Request $request)
    {
        //
         $request->validate([
            'referenceFournisseur' => 'required',
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'adresse' => 'required'

        ]);
         $fournisseur = fournisseur::create($request->all());
         return redirect()->route('fournisseur.index')
            ->with('success', 'Fournisseur crée avec succès.');

    }


    public function show($idFournisseur)
    {
        //
        $fournisseur=fournisseur::find($idFournisseur);
        return (view('fournisseur.show',compact('fournisseur')));
    }


    public function edit($idFournisseur)
    {
        //
        $fournisseur=fournisseur::find($idFournisseur);

         return (view('fournisseur.edit',compact('fournisseur')));
    }

    public function update( $idFournisseur,Request $request)
    {
        $request->validate([
            'referenceFournisseur' => 'required',
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'adresse' => 'required'

        ]);
        $fournisseur = fournisseur::find($idFournisseur);
         $fournisseur->update($request->all());
         return redirect()->route('fournisseur.index')
            ->with('success', 'Fournisseur modifié avec succès.');

    }

    public function destroy($idFournisseur)
    {
        //
         $fournisseur=fournisseur::find($idFournisseur);
         $fournisseur->delete();
        // $fournisseur->materiels()->detach();
         return redirect()->route('fournisseur.index')
            ->with('success', 'Fournisseur supprimé avec succès .');
    }
}
