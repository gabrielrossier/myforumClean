<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Tells if the current user has management privileges in general
     * @return bool
     */
    public function manage()
    {
        return Auth::user() && Auth::user()->isAdmin();
    }
}
