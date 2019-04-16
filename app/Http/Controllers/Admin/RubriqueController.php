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
	public function index()
	{
		$projets 	= 	DB::table('projets')->get();
		$rubriques	=	DB::table('rubriques')->get();

		return view('admin.rubriques', ['projets' => $projets, 'rubriques' => $rubriques]);
	}

	public function store()
	{
		Rubrique::create([
			'code'		=>	Input::get('code'),
			'libelle'	=>	Input::get('libelle'),
			'projet_id'	=>	Input::get('projet_id')
		]);

		Session::flash('message', 'Ajout réussi !');

		$projets 	= 	DB::table('projets')->get();
		$rubriques = DB::table('rubriques')->get();

		return redirect(route('projets.show', ['projets' => $projets, '$rubriques' => $rubriques]));
	}

	public function show($id)
	{
		$rubrique 		= DB::table('rubriques')->where('id', $id)->get();
		$projets 		= DB::table('projets')->get();
		$lignes	= DB::table('lignes')->where('rubrique_id', $id)->get();

		return view('admin.rubriques.show_rubrique', ['rubrique' => $rubrique, 'projets' => $projets, 'lignes' => $lignes]);
	}

	public function edit($id)
	{
		
		$rubrique 		= DB::table('rubriques')->where('id', $id)->get();
		$projets 		= DB::table('projets')->get();
		$lignes			= DB::table('lignes')->get();

		return view('admin.rubriques.edit_rubrique', ['rubrique' => $rubrique, 'projets' => $projets, 'lignes' => $lignes]);
	}

	public function update($id)
	{
		DB::table('rubriques')->where('id', $id)->update([
			'libelle'	=>	Input::get('libelle')
		]);

		$projetId = $_POST['projet_id'];
		$rubrique = DB::table('rubriques')->where('id', $id)->get();

		Session::flash('message', 'Modification réussi !');

		return redirect(route('projets.show', ['id'	=>	$projetId, 'rubrique' => $rubrique]));
	}

	public function destroy($id)
	{
		
		try{

			DB::table('rubriques')->where('id', $id)->delete();
			Session::flash('message', 'Suppression réussie !');

			$rubriques = DB::table('rubriques')->get();
			$projetID = $_POST['projet_id']; 
			
			return redirect(route('projets.show', ['id' => $projetID, 'rubriques' => $rubriques]));
		}
		catch(Exception $e){
			Session::flash('message', 'Verifier que la rubrique soit vide !');
			return view('errorPage');
		}

			
	}
}
