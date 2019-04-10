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
  public function store()
  {
    Ligne::create([
      'libelle'		=>	Input::get('libelle'),
      'montant'		=>	Input::get('montant'),
      'rubrique_id'	=>	Input::get('rubrique_id')
    ]);

    $lignes     = DB::table('lignes')->where('rubrique_id', $_POST['rubrique_id'])->get();
    Session::flash('message', 'Ajout réussi !');

    return redirect(route('rubriques.show', ['id' => $_POST['rubrique_id'] ,'lignes' => $lignes]));
  }

  public function edit($id)
  {

  }

}
