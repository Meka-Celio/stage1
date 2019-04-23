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
    public function __construct(){

        $this->middleware('auth');
    }
    
    public function index()
    {
    	$activites 	= DB::table('activites')->get();
    	$projets 	= DB::table('projets')->get();

    	return view('admin.activites',['activites' => $activites, 'projets' => $projets]);
    }

    public function show($id)
    {
    	$activite = DB::table('activites')->where('id', $id)->get();
        $projets    = DB::table('projets')->get();

    	return view('admin.activite.show', ['activite' => $activite, 'projets' => $projets]);
    }
 
 	public function edit($id)
    {
        $activite = DB::table('activites')->where('id', $id)->get();
        $projets    = DB::table('projets')->get();
        $activites = DB::table('activites')->get();

        return view('admin.activite.edit', ['activite' => $activite, 'projets' => $projets, 'activites' => $activites]);
    }
    
    public function update($id)
    {
        DB::table('activites')->where('id', $id)->update([
            'nom'           =>  Input::get('nom'),
            'projet_id'     =>  Input::get('projet_id'),
            'updated_at'    =>  date('Y-m-d H-i-s')
        ]);

        Session::flash('message', 'Modification réussi !');

        return redirect(route('activites.index'));
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

    public function destroy($id)
    {
        DB::table('activites')->where('id',$id)->delete();

        Session::flash('message', 'Suppréssion réussie !');

        return redirect(route('activites.index'));
    }
}
