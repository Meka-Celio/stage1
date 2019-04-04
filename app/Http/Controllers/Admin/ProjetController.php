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

    public function update(ProjetRequest $request, $id)
    {
        $validated = $request->validated();

        // $projet = DB::table('projets')->where('id', $id)->get();

        // Session::flash('message', 'Projet modidié avec succès !');

        // return redirect(route('projets.index', ['projets' => $projets]));

        return "update";
    }
}
