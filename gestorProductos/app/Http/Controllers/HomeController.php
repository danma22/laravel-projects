<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Constructor para protección de la url "dashboard"
    public function __construct(){
        // Al método index con el constructor le pasamos el parametro de autenticación
        $this->middleware('auth');
    }

    // Vista principal
    public function index(){
        return view("pages.home");
    }
}
