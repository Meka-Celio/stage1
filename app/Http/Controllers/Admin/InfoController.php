<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
	public function __construct(){

		$this->middleware('auth');
	}
	
    public function index()
    {
        return view('admin.informations');
    }
}
