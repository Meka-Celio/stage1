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
		$rubriques = DB::table('rubriques')->get();
		$projets = DB::table('projets')->get();

		return view('admin.rubriques', ['rubriques' => $rubriques, 'projets' => $projets]);
	}
}
