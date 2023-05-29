<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Controlador de la vista de pagina principal
class HomeController extends Controller
{
    // Crear primer método del controlador
    public function index(){
        return view("principal");
    }
}
