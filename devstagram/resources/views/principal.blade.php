@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-7/12">
            <img class="rounded-lg shadow-xl" src="{{ asset('img/login.jpeg') }}" alt="Imagen de inicio">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer"
                href="{{ route('login') }}">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                </svg>
                
                Iniciar sesión
            </a>
        </div>
    </div>
@endsection
