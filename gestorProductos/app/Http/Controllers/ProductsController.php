<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // Constructor para protección de la url "dashboard"
    public function __construct(){
        // Al método index con el constructor le pasamos el parametro de autenticación
        $this->middleware('auth');
    }

    public function index(){
        $products = Product::get();
        return view("pages.products", ['products'=>$products]);
    }

    public function newProduct(){
        return view("pages.newProduct");
    }

    // Método para registrar un producto en la base de datos
    public function store(Request $request){
        // Validar los campos 
        $this->validate($request, [
            'name'=>'required|min:5|max:60',
            'short_desc'=>'required|max:60',
            'long_desc'=>'required',
            'sales_price'=>'required',
            'purchase_price'=>'required',
            'stock'=>'required',
            'weight'=>'required'
        ]);

        //Se añaden los productos a la base de datos
        Product::create([
            'name'=>$request->name,
            'short_desc'=>$request->short_desc,
            'long_desc'=>$request->long_desc,
            'sales_price'=>$request->sales_price,
            'purchase_price'=>$request->purchase_price,
            'stock'=>$request->stock,
            'weight'=>$request->weight
        ]);
        //Se retorna la vista de los productos
        return redirect()->route('products')->with('success','El producto fue agregado con exito');

    }

    public function delete(Request $request){
        //Funcion para eliminar el producto
        $user = Product::find($request->id);
        $user->delete();

        return redirect()->route('products')->with('success','El producto fue eliminado con exito');

    }
}



