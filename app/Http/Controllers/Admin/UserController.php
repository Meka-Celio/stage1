<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
		$users = DB::table('users')->get();
    	return view('admin.users', ['users' => $users]);
    }

    public function create()
    {
    	return view('admin.user.createUser');
    }

    public function store(UserRequest $request)
    {
    	$validated = $request->validated();

    	$user = User::create([
    		'name'	=>	Input::get('name'),
    		'email' =>	Input::get('email'),
    		'password' => md5(Input::get('password')),
    		'fonction' => Input::get('fonction'),
    		'role'  => Input::get('role')
    	]);
 
    	$users = DB::table('users')->get();
    	Session::flash('message', 'User ajouté avec succès !');

    	return redirect(route('users.index', ['users' => $users]));
    }

    public function edit($id)
    {
    	$user = DB::table('users')->where('id', $id)->get();

    	return view('admin.user.editUser', ['user' => $user]);
    }

    public function update(UserRequest $request, $id)
    {
    	$validated = $request->validated();

    	$user = DB::table('users')->where('id', $id)
    	->update([
    		'name'	=>	Input::get('name'),
    		'email' =>	Input::get('email'),
    		'password' => md5(Input::get('password')),
    		'fonction' => Input::get('fonction'),
    		'role'  => Input::get('role')
    	]);

    	$users = DB::table('users')->get();
    	Session::flash('message', 'User modifié avec succès !');

    	return redirect(route('users.index', ['users' => $users]));
    }

    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();
        $users = DB::table('users')->get();
        // Session::flash('message', 'User bien supprimé !');
        return redirect(route('users.index', ['users' => $users]));
    }
}
