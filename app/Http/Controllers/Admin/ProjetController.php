<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Projet;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjetRequest;

class ProjetController extends Controller 
{
    //
    public function index()
    {
        $projets = DB::table('projets')->get();

    	return view('admin.projets', ['projets' => $projets]);
    }

    public function store(ProjetRequest $request)
    {
        $validated = $request->validated();

    	$projet = Projet::create([
    		'projetName' => Input::get('projetName')
    	]);
        $projets = DB::table('projets')->get();

        Session::flash('message', 'Projet créé avec succès !');

        return redirect(route('projets.index', ['projets' => $projets]));

    }

    public function show($id)
    {
        $projet     = DB::table('projets')->where('id', $id)->get();
        $rubriques  = DB::table('rubriques')->where('projet_id', $id)->get();

        return view('admin.projet.showProjet', ['projet' => $projet, 'rubriques' => $rubriques]);
    }

    public function edit($id)
    {
        $projet     = DB::table('projets')->where('id', $id)->get();
        $rubriques  = DB::table('rubriques')->where('projet_id', $id)->get();

        return view('admin.projet.editProjet', ['projet' => $projet, 'rubriques' => $rubriques]);
    }

    public function update($id)
    {
        $projet = DB::table('projets')->where('id', $id)->update([
            'projetName' => Input::get('projetName')
        ]);
        $projets = DB::table('projets')->get();

        Session::flash('message', 'Modification réussi !');

        return redirect(route('projets.index', ['projets' => $projets]));
    }

    public function destroy($id)
    {
        DB::table('rubriques')->where('projet_id', $id)->delete();
        $delpro = DB::table('projets')->where('id', $id)->delete();
        if ($delpro){

            $projets = DB::table('projets')->get();

            Session::flash('message', 'Projet bien supprimé !');

            return redirect(route('projets.index', ['projets' => $projets]));
        }
        else{
            Session::flash('message', 'Vous ne pouvez pas supprimer une table parent qui a des sous-tables !');
            return view('errorPage');
        }
    }
}
