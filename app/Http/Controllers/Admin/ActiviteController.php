<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Activite;

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

    	return view('admin.activite.show', ['activite' => $activite]);
    }
 
 	public function edit($id)
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
