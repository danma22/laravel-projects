@extends('layout.app')

@section('titulo')
Productos | Gestor de productos
@endsection

@section('contenido')
<div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Productos
    </h2>

    <!-- Nuevo producto form -->
    <h4
      class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
      Nuevo producto
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <form action="{{route('nuevoProd')}}" method="POST">
        @csrf
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Nombre del producto</span>
          <input
            id="name" 
            name="name" 
            type="text" 
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Pelota"
          />

          @error('name')
            <span class="text-xs text-red-600 dark:text-red-400">
              {{$message}}
            </span>
          @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Descripción corta</span>
          <input
            id="short_desc" 
            name="short_desc" 
            type="text" 
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="La pelota es..."
          />

          @error('short_desc')
            <span class="text-xs text-red-600 dark:text-red-400">
              {{$message}}
            </span>
          @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Descripción larga</span>
          <textarea
            id="long_desc" 
            name="long_desc"
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            rows="3"
            placeholder="La pelota es..."
          ></textarea>

          @error('long_desc')
            <span class="text-xs text-red-600 dark:text-red-400">
              {{$message}}
            </span>
          @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Precio de venta</span>
          <input
            id="sales_price" 
            name="sales_price" 
            type="number" 
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="45.00"
          />

          @error('sales_price')
            <span class="text-xs text-red-600 dark:text-red-400">
              {{$message}}
            </span>
          @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Precio de compra</span>
          <input
            id="purchase_price" 
            name="purchase_price" 
            type="number" 
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="64.00"
          />

          @error('purchase_price')
            <span class="text-xs text-red-600 dark:text-red-400">
              {{$message}}
            </span>
          @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Stock</span>
          <input
            id="stock" 
            name="stock" 
            type="number" 
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="10"
          />

          @error('stock')
            <span class="text-xs text-red-600 dark:text-red-400">
              {{$message}}
            </span>
          @enderror
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Peso (kg)</span>
          <input
            id="weight" 
            name="weight" 
            type="number" 
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="1.4"
          />

          @error('weight')
            <span class="text-xs text-red-600 dark:text-red-400">
              {{$message}}
            </span>
          @enderror
        </label>

        <div class="flex justify-end w-full">
          <button 
            class="flex items-center justify-between px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="submit"
          >
            <span>Crear nuevo producto</span>
            <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
              <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection