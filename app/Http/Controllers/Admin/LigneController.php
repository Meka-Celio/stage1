<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Ligne;

class LigneController extends Controller
{

  public function index()
  {
    $projets    = DB::table('projets')->get();
    $rubriques  = DB::table('rubriques')->get();
    $lignes     = DB::table('lignes')->get();

    return view('admin.lignes', ['projets' => $projets, 'rubriques' => $rubriques, 'lignes' => $lignes]);
  }

  public function store()
  {
    Ligne::create([
      'libelle'		=>	Input::get('libelle'),
      'montant'		=>	Input::get('montant'),
      'rubrique_id'	=>	$_POST['rubrique_id']
    ]);

    Session::flash('message', 'Ajout réussi !');

    return redirect(route('lignes.index'));
  }

  public function edit($id)
  {
    $ligne    = DB::table('lignes')->where('id', $id)->get();
    $projets  = DB::table('projets')->get();
    $rubriques = DB::table('rubriques')->get();

    return view('admin.lignes.edit_ligne', ['rubriques' => $rubriques ,'ligne' => $ligne, 'projets' => $projets]);
  }

  public function update($id)
  {
    DB::table('lignes')->where('id', $id)->update([
      'libelle' =>  Input::get('libelle'),
      'montant' =>  Input::get('montant'),
      'rubrique_id' =>  Input::get('rubrique_id'),
      'updated_at'  =>  date('Y-m-d H-i-s')
    ]);

    Session::flash('message', 'Modification réussi !');

    return redirect(route('lignes.index'));
  }

  public function destroy($id)
  {
    try{
      DB::table('lignes')->where('id', $id)->delete();
    }
    catch(Exception $e){
      echo 'Echec de la suppression '.$e->getMessage();
    }

    Session::flash('message', 'Suppression réussie !');

    return redirect(route('lignes.index'));

  }

}
