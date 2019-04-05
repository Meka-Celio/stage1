<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Rubrique;

class RubriqueController extends Controller
{
	public function store()
	{
		Rubrique::create([
			'code'		=>	Input::get('code'),
			'libelle'	=>	Input::get('libelle'),
			'projet_id'	=>	Input::get('projet_id')
		]);

		Session::flash('message', 'Ajout réussi !');

		$rubriques = DB::table('rubriques')->where('projet_id', $_POST['projet_id'])->get();

		return redirect(route('projets.show', ['id' => $_POST['projet_id'], '$rubriques' => $rubriques]));
	}

	// public function show($id, $projet_id)
	// {	
	// 	$projet = DB::table('projets')->where('id',$projet_id)->get();
	// 	$rubrique = DB::table('rubriques')->where('id', $id)->get();

	// 	return view('admin.rubriques.show_rubrique', ['rubrique' => $rubrique]);
	// } 
}
