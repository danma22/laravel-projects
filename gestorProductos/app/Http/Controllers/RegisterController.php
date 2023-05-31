<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Método para mostrar la vista del registro
    public function index(){
        return view("auth.register");
    }

    public function store(Request $request){
        // Validar campos obtenidos
        $this->validate($request, [
            'name'=>'required|min:5',
            'username'=>'required|unique:users|min:3',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:5',
            'conf_password'=>''
        ]);
        
        // Invocar el modelo User para crear el usuario
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        // Autenticar un usuario
        auth()->attempt($request->only('email','password'));

        // Redireccionando
        return redirect()->route('home');
    }
}
