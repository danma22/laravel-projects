@extends('layouts.app')

@section('titulo')
Tu cuenta de Devstagram
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{asset('imgs/usuario.svg')}}" alt="Imagen de usuario">
            </div>
            <div class='md:w-8/12 lg:w-6/12 px-5'>
                <p class="text-gray-700 text-2xl">{{auth()->user()->username}}</p>

                <p class="text-gray-600 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>

                <p class="text-gray-600 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Siguiendo</span>
                </p>

                <p class="text-gray-600 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Post</span>
                </p>
            </div>
        </div>
    </div>
@endsection