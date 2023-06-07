<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Controlador de la vista de Registro

class RegisterController extends Controller
{
    // Crear primer método del controlador
    public function index(){
        return view("auth.register");
    }

    public function store(Request $request){
        // MOdificamos el request para que no se repitan
        $request->request->add(['username'=>Str::slug($request->username)]);

        // dd: dump and die, imprime lo que se tiene del proyecto y lo muestra
        // dd('Post...');
        // dd($request) // Para ver oda la petición
        // dd($request->get('username')); // Para ver un campo mandado en la peticion
        $this->validate($request, [
            'name'=>'required|min:5',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:5',
            'password_confirmation'=>''
        ]);

        // dd('Mensaje: Creando cuenta culeros');

        // Invocar el modelo User para crear el usuario
        User::create([
            'name'=>$request->name,
            //Insertar username en minusculas y sin espacios
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        // Autenticar un usuario con el método
        //
        // auth()->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ]);

        //Opcion 2
        auth()->attempt($request->only('email','password'));

        // Redireccionando
        return redirect()->route('post.index');
    }
}
