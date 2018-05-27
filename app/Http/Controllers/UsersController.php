<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    function listUsers(){
        $objUser = new User;
        $data=$objUser->with('profile')->orderBy('id', 'desc')->get();
        return response()->json( [ 'data' => $data ], 200);
    }

    function editUser($id){
        $objUser= User::findorFail($id);
        $objUser->name = request()->name;
        $objUser->email = request()->email;
        $objUser->profile_id = request()->profile_id;
        $objUser->status = request()->status;
        $objUser->save();

        $result = User::with('profile')->find($id);
        return ['message' => 'Registro modificado con exito', 'data' => $result];
        
    }

    function createUser()
    {
        $objUser= new User();
        $objUser->name = request()->name;
        $objUser->email = request()->email;
        $objUser->profile_id = request()->profile_id['id'];
        $objUser->status = request()->status;
        $objUser->save();

        $result = User::with('profile')->find($objUser->id);
        return ['message' => 'Registro creado con exito', 'data' => $result];
    }
        function deleteUser($id){;
                $objUser= User::findorFail($id);
                $objUser->name = request()->name;
                $objUser->email = request()->email;
                $objUser->profile_id = request()->profile_id;
                $objUser->status = request()->status;
                $objUser->delete();

                return ['message' => 'Registro eliminado con exito', 'data' => $objUser];

    }
}