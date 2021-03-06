<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function manageAdmin()
    {
        $users = User::all();
        return view('admin.users')->with(compact('users'));
    }

    public function togglerole(Request $request)
    {
        $selectedrole = $request->input('roles');
        if (Gate::denies('manage')) return redirect('/')->with('message','No, no, no !!!');
        $user = User::find($request->input('userid'));
        if($selectedrole == "ADMI" && User::admins()->count() <= 1 && $user->roles()->where('slug','ADMI')->first() != null)
        {
            return redirect(route('admin.users'))->with('message','Do not suicide ! You are the last Admin !');

        }
        elseif($user->id == Auth::user()->id && $selectedrole == ('ADMI'))
        {
            return redirect(route('admin.users'))->with('message','You cannot sucide !');
        }
        elseif($user->roles()->where('slug',$selectedrole)->first() != null && $user->roles()->count() <= 1)
        {
            return redirect(route('admin.users'))->with('message','You cannot remove all roles from an user');
        }
        $user->togglerole($selectedrole);
        return redirect(route('admin.users'))->with('message','Ok!');
    }

}
