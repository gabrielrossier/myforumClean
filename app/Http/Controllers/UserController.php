<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function manageAdmin()
    {
        $users = User::all();
        return view('admin.users')->with(compact('users'));
    }

    public function promote(Request $request)
    {
        if (Auth::user()->role->slug != 'ADMI') return redirect('/')->with('message','No, no, no !!!');
        $user = User::find($request->input('userid'));
        $user->role()->associate(Role::where('slug','ADMI')->first());
        $user->save();
        return redirect(route('admin.users'))->with('message','Ok!');
    }

    public function demote(Request $request)
    {
        if (Auth::user()->role->slug != 'ADMI') return redirect('/')->with('message','No, no, no !!!');
        $user = User::find($request->input('userid'));
        $user->role()->associate(Role::where('slug','STUD')->first());
        $user->save();
        return redirect(route('admin.users'))->with('message','Ok!');
    }

}
