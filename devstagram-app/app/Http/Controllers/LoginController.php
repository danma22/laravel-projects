<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    //Validar formulario de login
    public function store(Request $request){
        // Reglas de validación
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);
        
        // Verificar que las credenciales son correctas
        if(!auth()->attempt($request->only('email', 'password'))){
            // Usar directiva "with" para llenar los valores de la sesión
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        // Credenciales correctas

        return redirect()->route('post.index', auth()->user()->username);
    }
}
