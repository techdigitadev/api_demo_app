<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Resources\CategorieResource;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $categories = Categorie::all();
        return CategorieResource::collection($categories)->toJson(JSON_PRETTY_PRINT);

    }

    public function fichiers($id_categorie){

        $categorie = Categorie::find($id_categorie);
        $fichiers = $categorie->fichiers;

        return $fichiers;
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
        $categorie = new Categorie();
        // on valide les champs necessaires et on affecte les valeurs  a la variable
        $categorie-> nom = $request->nom;
        $categorie->save();

        return $categorie;
        // $lapin-> sexe = $request->sexe;
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
        $categorie  = Categorie::find($id);

        $fichier_arr = array($categorie) ;
        $fichier_arr[0]['fichier_total'] = $categorie->fichiers->count(); // for your $arr2
        unset($fichier_arr[0]['fichiers']);

        //$fichier_arr

        //return $categorie;
        return $fichier_arr[0];
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
        $categorie = Categorie::find($id);
        $categorie->nom = $request->nom;
        $categorie->save();

        return $categorie;
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

        $categorie = Categorie::find($id);
        $categorie->delete();

        return 'deletion successful';
    }
}
