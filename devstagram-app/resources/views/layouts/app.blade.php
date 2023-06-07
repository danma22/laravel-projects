<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        @vite('resources/css/app.css')
        <title>Portal - @yield('titulo')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    </head>
    <body class="antialiased">

        {{-- header --}}
        <header class="p-1 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text gap-1 item-center">Devstagram</h1>

                <!-- Para users autenticados -->
                @auth
                    <nav class="flex gap-2 items-center">
                        <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer"
                            href="{{ route('post.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            Crear
                        </a>

                        <a class="font-bold text-gray-600 text-sm" href="{{ route('post.index', auth()->user()->username) }}">
                            Hola!
                            <span class="font-normal">
                                {{ auth()->user()->username }}
                            </span>
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                                Cerrar Sesión
                            </button>
                        </form>
                    </nav>
                @endauth
                    
                {{-- Determinar a usuario no autenticado --}}
                @guest
                    <nav class="flex gap-1 item-center">
                        <a href="{{route('login')}}" class="font bold uppercase text-gray-600 text-sm">Login</a>
                        <a href="{{route('register')}}" class="font bold uppercase text-gray-600 text-sm">Crear cuenta</a>
                        <a href="{{route('logout')}}" class="font bold uppercase text-gray-600 text-sm">Cerrar sesón</a>
                    </nav>
                @endguest
            </div>
        </header>
        {{-- / header --}}

        {{-- contenido --}}
        <main class="container mx-auto mt-10">
            @yield("contenido")
        </main>
        {{-- / contenido --}}

        {{-- footer --}}
        <footer class="text-center p-5 text-gray-500 font-bold uppercase">
            Devstagram UPV - Todos los derechos reservados {{now()->year}}
        </footer>
        {{-- / footer --}}
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</html>
