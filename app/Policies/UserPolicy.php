<?php

namespace App\Policies;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use App\Models\User;

class UserPolicy
{
    use HasPageShield;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
}
