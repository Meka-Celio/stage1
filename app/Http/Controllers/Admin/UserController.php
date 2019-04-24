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
    public function __construct(){

        $this->middleware('auth');
    }
    
    public function index()
    {
		$users = DB::table('users')->get();
    	return view('admin.users', ['users' => $users]);
    }

    public function create()
    {
    	return view('admin.user.createUser');
    }

    

    public function edit($id)
    {
    	$user = DB::table('users')->where('id', $id)->get();

    	return view('admin.user.editUser', ['user' => $user]);
    }

    public function update($id)
    {
    	if (Auth::user()->role == 'user')
        {
            DB::table('users')->where('id', $id)->update([
                'name'  =>  Input::get('name')
            ]);
            Session::flash('message', 'User modifié avec succès !');

            return redirect(route('users.index'));
        }
        else{
            DB::table('users')->where('id', $id)->update([
             'name'     =>  Input::get('name'),
             'fonction' => Input::get('fonction'),
             'role'     => Input::get('role')
            ]);

            Session::flash('message', 'User modifié avec succès !');

            return redirect(route('users.index'));
        }
    }

    public function destroy($id)
    {
        $session_id = Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->get();

        foreach ($user as $u)
        {
            if ($u->id == $session_id)
            {
                Session::flash('message', 'Vous ne pouvez pas vous supprimer vous-même !');
                return redirect(route('users.index'));
            }
            else{
                if (Auth::user()->role == 'user')
                {
                    Session::flash('message', 'Seul les admins peuvent supprimer des utilisateurs !');
                    return redirect(route('users.index'));
                }
                else{
                    DB::table('users')->where('id', $id)->delete();
                    Session::flash('message', 'User bien supprimé !');
                    return redirect(route('users.index'));
                }
            }
        }
    }
}
