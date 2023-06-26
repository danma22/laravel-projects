<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    // Método para eliminar
    public function store(Request $request, User $user, Post $post){
        // validar
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);

        // almacenar el resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        // imprimir un mensaje
        return back()->with('mensaje', 'Comentario Realizado Correctamente');
    }

    // Método para eliminar el comentario del post
    public function delete($id)
    {
        // Se encuentra el comentario con el id 
        Comentario::find($id)->delete();
        // Se vuelve a la vista del post
        return back()->with('mensaje', 'Comentario eliminado correctamente');
    }
}
