<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index() {
        if(request()->has('empty')) {
            $users = [];
        } else {
            $users = [
                "Hugo",
                "Paco",
                "Luis"
            ];
        }

        return view('users', ['users' => $users]);
    }

    function show($id) {
        return "Mostrando detalles del usuario: {$id}";
    }

    function create() {
        return "Creando nuevo usuario";
    }
}
