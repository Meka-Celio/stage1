<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Activite;
use App\Ligne;
use App\Projet;
use App\Rubrique;

class ActiviteController extends Controller
{
    public function index()
    {
    	$activites 	= DB::table('activites')->get();
    	$projets 	= DB::table('projets')->get();

    	return view('admin.activites',['activites' => $activites, 'projets' => $projets]);
    }

    public function show($id)
    {
    	$activite = DB::table('activites')->where('id', $id)->get();
        $lignes = DB::table('lignes')->get();
        $projets    = DB::table('projets')->get();
        $rubriques = DB::table('rubriques')->get();

    	return view('admin.activite.show', ['activite' => $activite, 'lignes' => $lignes, 'projets' => $projets, 'rubriques' => $rubriques]);
    }
 
 	public function edit($id)
    {
        $activite = DB::table('activites')->where('id', $id)->get();
        $lignes = DB::table('lignes')->get();
        $projets    = DB::table('projets')->get();
        $rubriques = DB::table('rubriques')->get();

        return view('admin.activite.edit', ['activite' => $activite, 'lignes' => $lignes, 'projets' => $projets, 'rubriques' => $rubriques]);
    }
    
    public function update($id)
    {
        
    }

    public function store()
    {
    	Activite::create([
    		'nom'		=>	Input::get('nom'),
    		'projet_id'	=>	Input::get('projet_id')
    	]);

    	Session::flash('message','Ajout réussi !');

    	$activites 	= DB::table('activites')->get();
    	$projets 	= DB::table('projets')->get();

    	return redirect(route('activites.index', ['activites' => $activites, 'projets' => $projets]));
    }


}
