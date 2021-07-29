<?php

namespace App\Http\Controllers;

use App\Fichier;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Fragment\FragmentHandler;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class FichierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fichiers = Fichier::all();
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

        $fichier = new Fichier();
        $fichier->nom_fichier = $request->nom_fichier;
        $fichier->categorie_id = $request->categorie_id;

        if ($request->hasFile( 'nom' )){ // uniquement s'il a ajouté l'image
            $fichier->nom = $this->fileUpload($request,'nom', $request->nom_fichier);//ce champ est obligatoire
        }

        $fichier->save();

        return $fichier;
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

        $fichier = Fichier::find($id);
        return $fichier ;
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
        $fichier = Fichier::find($id);
        $fichier->delete();

        return 'deletion successful';

    }

    public function fileUpload(Request $request, $nameForm , $nom_fichier) {
        /* $this->validate($request, [
             $nameForm => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);*/

        //if ($request->hasFile( ''.$nameForm.'' )) // on vérifie si le champ est dans la requête envoyée
        //{

        //$randomString = Str::random(10);
        $image = $request->file(''.$nameForm.''); // on recupère le fichier depuis la requête
        $name = $nom_fichier.'.'.$image->getClientOriginalExtension(); // on renomme le fichier image
        $destinationPath = public_path('files/fichiers_audios'); // on crée le chemin où on veut sauvegarder les images
        // URL::to('');
        $image->move($destinationPath, $name); // on déplace les images sur le serveur
        return $name ; // on renvoie le nom de l'image créée
        //  }
    }


}
