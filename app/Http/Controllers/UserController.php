<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function manageAdmin()
    {
        $users = User::all();
        return view('admin.users')->with(compact('users'));
    }

    public function togglerole(Request $request)
    {
        if (Gate::denies('manage')) return redirect('/')->with('message','No, no, no !!!');
        $user = User::find($request->input('userid'));
        $user->togglerole();
        return redirect(route('admin.users'))->with('message','Ok!');
    }

}
