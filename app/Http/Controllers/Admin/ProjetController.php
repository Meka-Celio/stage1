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
        $projet = DB::table('projets')->where('id', $id)->get();

        return view('admin.projet.show', ['projet' => $projet]);
    }
}
