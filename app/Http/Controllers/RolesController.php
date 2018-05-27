<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RolesController extends Controller
{

    public function getRoles()
    {
        $profiles = Role::all();
        return $profiles;
    }

}
