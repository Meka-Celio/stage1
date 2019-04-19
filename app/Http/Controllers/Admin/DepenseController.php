<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Depense;

class DepenseController extends Controller
{
    public function index()
    {
    	$lignes 	= DB::table('lignes')->get();
    	$activites 	= DB::table('activites')->get();
    	$depenses 	= DB::table('depenses')->get();

    	return view('admin.depenses', ['lignes' => $lignes, 'activites' => $activites, 'depenses' => $depenses]);
    }

    public function store()
    {
    	Depense::create([
    		'nom' => Input::get('nom'),
    		'cout'	=> Input::get('cout'),
    		'activite_id' => Input::get('activite_id'),
    		'ligne_id'	=> Input::get('ligne_id')
    	]);

    	Session::flash('message', 'Ajout Réussi !');

    	return redirect(route('depenses.index'));
    }
}
