@extends("layouts.app")

@section("titulo")
    Registrate a Devstagram
@endsection


@section("contenido")
    <h2 class="font-black text-center text-3xl">@yield("titulo")</h2>
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            {{-- insertar imagen utilizando assert (acceder a carpeta public) --}}
            <img src="{{asset('imgs/Diseño/registrar.jpg')}}" alt="Imagen registro de usuario">
        </div>

        <div class="md:w-5/12 bg-white p-6 rounded lg shadow-xl">
            <form action="{{route('register')}}" method="POST">
                {{-- directiva que genera un token para poder mandar los datos de manera segura --}}
                @csrf

                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        placeholder="Tu nombre" 
                        class="border p-3 w-full rounded-lg
                        @error('name') border-red-500 @enderror",
                        value="{{old('name')}}">

                    {{-- directiva para mostrar mensaje de error --}}
                    @error('name')
                        <p class='bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center'>
                            {{$message}}
                        </p>                        
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        id="username" 
                        name="username" 
                        type="text" 
                        placeholder="Tu username" 
                        class="border p-3 w-full rounded-lg
                        @error('username') border-red-500 @enderror"
                        value="{{old('username')}}">
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        placeholder="Tu email" 
                        class="border p-3 w-full rounded-lg
                        @error('email') border-red-500 @enderror"
                        value="{{old('email')}}">
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        placeholder="Tu password" 
                        class="border p-3 w-full rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Confirmar password
                    </label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        placeholder="Confirmar password" 
                        class="border p-3 w-full rounded-lg">
                </div>

                <input 
                    type="submit" 
                    value="Crear cuenta" 
                    class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection