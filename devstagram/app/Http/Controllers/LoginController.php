<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{    
    // Método que muestra la vista del login
    public function index()
    {
        return view('auth.login');
    }

    // Método para iniciar sesión
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Se valida si las credenciales son correctas
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            // back() para volver a la pagina anterior, en este caso, con un mensaje
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        // Se redirecciona a la página principal del usuario en caso de ser correcto
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
