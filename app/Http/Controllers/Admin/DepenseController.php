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
    public function __construct(){

        $this->middleware('auth');
    }
    
    public function index()
    {
        
    	$lignes 	= DB::table('lignes')->get();
    	$activites 	= DB::table('activites')->get();
    	$depenses 	= DB::table('depenses')->get();

    	return view('admin.depenses', ['lignes' => $lignes, 'activites' => $activites, 'depenses' => $depenses]);
    }

    public function store()
    {
        /*
            - Récupération de $id_ligne
            - Récup de $cout
            - Récup de la ligne
        */

        $id_ligne = $_POST['ligne_id'];
        $cout = Input::get('cout');
        $ligne = DB::table('lignes')->where('id', $id_ligne)->get();

        // Dépliage de la ligne 
        foreach ($ligne as $l)
        {
            // Si le cout > montant de la ligne
            if ($l->montant < $cout)
            {
                Session::flash('message', 'Le cout de la dépense est supérieur au montant disponible, impossible de créer cette dépense !');

                return redirect(route('depenses.index'));
            }
            else{
                Depense::create([
                    'nom' => Input::get('nom'),
                    'cout'  => Input::get('cout'),
                    'activite_id' => Input::get('activite_id'),
                    'ligne_id'  => Input::get('ligne_id')
                ]);

                // Nouveau montant
                $newMontant = ($l->montant) - $cout;

                // Modification de la ligne courante
                DB::table('lignes')->where('id', $id_ligne)->update(['montant' => $newMontant]);

                Session::flash('message', 'Ajout Réussi !');

                return redirect(route('depenses.index'));
            }
        }
    }

    public function edit($id)
    {
        $lignes     = DB::table('lignes')->get();
        $activites  = DB::table('activites')->get();
        $depense   = DB::table('depenses')->where('id', $id)->get();
        $depenses   = DB::table('depenses')->get();

        return view('admin.depenses.edit_depense', ['lignes' => $lignes, 'activites' => $activites, 'depenses' => $depenses, 'depense' => $depense]);
    }

    public function update($id)
    {
        DB::table('depenses')->where('id', $id)->update([
            'nom'           => Input::get('nom'),
            'cout'          => Input::get('cout'),
            'activite_id'   => Input::get('activite_id'),
            'ligne_id'      => Input::get('ligne_id'),
            'updated_at'    =>  date('Y-m-d H-i-s')
        ]);

        Session::flash('message', 'Modification réussi !');

        return redirect(route('depenses.index'));
    }

    public function destroy($id)
    {
        DB::table('depenses')->where('id', $id)->delete();

        Session::flash('message', 'Suppression réussi !');

        return redirect(route('depenses.index'));
    }
}
