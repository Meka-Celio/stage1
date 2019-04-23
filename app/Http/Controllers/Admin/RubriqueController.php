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
	public function __construct(){

        $this->middleware('auth');
    }
	
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

		return redirect(route('rubriques.index', ['projets' => $projets, '$rubriques' => $rubriques]));
	}

	public function show($id)
	{
		$rubrique 		= DB::table('rubriques')->where('id', $id)->get();
		$projets 		= DB::table('projets')->get();

		return view('admin.rubriques.show_rubrique', ['rubrique' => $rubrique, 'projets' => $projets]);
	}

	public function edit($id)
	{
		
		$rubrique 		= DB::table('rubriques')->where('id', $id)->get();
		$projets 		= DB::table('projets')->get();

		return view('admin.rubriques.edit_rubrique', ['rubrique' => $rubrique, 'projets' => $projets]);
	}

	public function update($id)
	{
		DB::table('rubriques')->where('id', $id)->update([
			'code'			=>	Input::get('code'),
			'libelle'		=>	Input::get('libelle'),
			'projet_id'		=>	$_POST['projet_id'],
			'updated_at'	=>	date('Y-m-d H-i-s')
		]);

		$projetId = $_POST['projet_id'];
		$rubrique = DB::table('rubriques')->where('id', $id)->get();

		Session::flash('message', 'Modification réussi !');

		return redirect(route('rubriques.index', ['id'	=>	$projetId, 'rubrique' => $rubrique]));
	}

	public function destroy($id)
	{
		
		try{

			DB::table('rubriques')->where('id', $id)->delete();
			Session::flash('message', 'Suppression réussie !');

			$rubriques = DB::table('rubriques')->get();
			
			return redirect(route('rubriques.index', ['rubriques' => $rubriques]));
		}
		catch(Exception $e){
			Session::flash('message', 'Verifier que la rubrique soit vide !');
			return view('errorPage');
		}

			
	}
}
