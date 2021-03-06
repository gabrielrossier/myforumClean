<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('make:adminuser {user_id}', function ($user_id) {
    $user = User::find($user_id);
    if ($user) {
        $user->roles()->attach(Role::where('slug','ADMI')->first());
        $user->save();
        echo $user->pseudo." est maintenant admin\n";
    } else {
        echo "L'utilisateur $user_id n'existe pas\n";
    }
})->purpose('Grant the admin role to a user');
