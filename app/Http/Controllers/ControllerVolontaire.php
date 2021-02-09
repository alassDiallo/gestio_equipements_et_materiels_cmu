<?php

namespace App\Http\Controllers;

use App\Models\materiel;
use App\Models\structure;
use Illuminate\Http\Request;
use App\Models\volontaire;
use Validator;

class ControllerVolontaire extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volontaires = volontaire::all();
        $structure = structure::all();
        $materiel = materiel::all();

        return view('volontaire.accueil_volontaire',['structure'=>$structure,'materiel'=>$materiel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'nom'=>'required | string | min :2',
            'prenom'=>'required| string | min:2',
            'dateDeNaissance'=>'required| date ',
            'lieuDeNaissance'=>'required|s tring |min:2',
            'adresse'=>'required|string',
            'telephone'=>'required|digits:9 | unique:volontaires',
            'email'=>'required|email',
            'cin'=>'required|alpha_num:12|unique:volontaires',
            'structure'=>'required',
            'materiel'=>'required'

        ];
      $error = Validator::make($request->all(),$rule);
      if($error->fails()){
          return response()->json(['error'=>$error->errors()]);
      }
      return response()->json(['success'=>'reussi']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
