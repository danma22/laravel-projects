<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        // Para verificar que el user este autenticado
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(User $user)
    {   
        // get es para obtener el resultado de la consulta
        $posts = Post::where('user_id', $user->id)->paginate(10);


        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    // Método para mostrar la vista de creacion de posts
    public function create()
    {
        return view('posts.create');
    }

    // Método para almacenar un post
    public function store(Request $request){
        // Validar campos
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        // Primera forma de registrar
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);

        // Segunda forma de registrar
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        // Tercera forma de registrar
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        // Se manda a la pantalla principal del usuario
        return redirect()->route('posts.index', auth()->user()->username);
    }

    // Método para que se muestre la vista de posts
    public function show(User $user, Post $post){
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    // Método para eliminar un post
    public function destroy(Post $post) {

        // Se utiliza las policies, para autorizar la eliminación
        $this->authorize('delete', $post);
        $post->delete();

        $imagen_path = public_path('uploads/'.$post->imagen);
        if(File::exists($imagen_path)){
            unlink($imagen_path);
            // File::delete();
        }

        // se regresa al inicio
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
