<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
	public function __construct(){

		$this->middleware('auth');
	}

    public function index(){
    	 
        return view('admin.dashboard');
    }
}
