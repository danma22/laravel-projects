<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    // Constructor para protección de la url "dashboard"
    public function __construct(){
        // Al método index con el constructor le pasamos el parametro de autenticación
        $this->middleware('auth');
    }

    public function index(User $user){
        // validar helper
        //dd(auth()->user());

        return view('dashboard',[
            'user'=>$user
        ]);
    }

    // CREANDO MÉTODOCREATE PARA FORMULARIO DE PUBLICACIONES
    public function create(){
        return view('posts.create');
    }
}
