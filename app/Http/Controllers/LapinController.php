<?php

namespace App\Http\Controllers;

use App\Http\Resources\LapinResource;
use App\Lapin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LapinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lapins = Lapin::all();
        //return $produits;

        return LapinResource::collection($lapins)->toJson(JSON_PRETTY_PRINT);
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
        //

        $lapin = new Lapin();
        // on valide les champs necessaires et on affecte les valeurs  a la variable
        $lapin-> nom = $request->nom;
        $lapin-> sexe = $request->sexe;
        $lapin-> poids = $request->poids;
        $lapin-> couleur_pelage = $request->couleur_pelage;
        $lapin-> race = $request->race;
        $lapin-> type = $request->type;

        if($lapin->save())
            return $lapin; // on renvoie le produit nouvellement cree
        else
            return response()->json('Erreur!', 400);

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
        $lapin = Lapin::find($id);
        return $lapin ;
      //  return new LapinResource($lapin);
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
    public function destroy($request)
    {
        //

        $lapin = Lapin::find($request->id); //sélectionner le produit
        $lapin->delete(); // supprimer le produit

        return response()->json(null, 204); //renvoie la reponse
    }

    public function statistiques(){

        $total_lapins = Lapin::all()->count();
        $males = Lapin::where('sexe' ,true)->count();
        $femelles = Lapin::where('sexe',false)->count();
        $laperaux = Lapin::where('type','lapereau')->count();
        $poids_moyen = $this->getPoidsMoyen();

        $statistiques = array('total' => $total_lapins, 'males' =>$males , 'femelles' =>$femelles,
            'laperaux'=>$laperaux, 'poids_moyen' =>$poids_moyen );

        return $statistiques;
    }

    public function getPoidsMoyen(){
        $lapins = Lapin::all();
        $total = $lapins->count();
        $poids_total = $lapins->sum('poids');

     return   $poids_moyen = $poids_total / $total;


    }
}
