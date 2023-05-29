<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(){
        // Cerrar sesión con el helper 
        auth()->logout();
        //Enviar a la vista de login
        return redirect()->route('login');
    }
}
