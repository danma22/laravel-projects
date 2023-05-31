@extends('layout.app')

@section('titulo')
Productos | Gestor de productos
@endsection

@section('contenido')
<div class="container grid px-6 mx-auto">
    <div class="flex items-center justify-between">
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Productos
      </h2>

      <div class="px-6 my-6">
        <a
          class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="{{route('nuevoProd')}}"
        >
          Añadir producto
          <span class="ml-2" aria-hidden="true">+</span>
        </a>
      </div>
    </div>
    

    <!-- Tabla productos -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full ">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">Nombre</th>
              <th class="px-4 py-3">Descripción corta</th>
              <th class="px-4 py-3">Descripción larga</th>
              <th class="px-4 py-3">Precio venta</th>
              <th class="px-4 py-3">Precio compra</th>
              <th class="px-4 py-3">Stock</th>
              <th class="px-4 py-3">Peso</th>
              <th class="px-4 py-3">Fecha</th>
              <th class="px-4 py-3">Accioness</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >

            {{-- Foreach para recorrer la lista de productos --}}
            @foreach ($products as $product)
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3 text-sm">
                {{$product->name}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{$product->short_desc}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{$product->long_desc}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{$product->sales_price}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{$product->purchase_price}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{$product->stock}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{$product->weight}}
              </td>
              <td class="px-4 py-3 text-sm">
                {{$product->created_at}}
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                  <form action="{{route('deleteProd')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button
                      class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                      aria-label="Delete"
                      type="submit"
                    >
                      <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                    </button>                              
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection