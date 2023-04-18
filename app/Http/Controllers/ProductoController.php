<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
{
    $productos = Producto::all();
    return view('productosview', compact('productos'));
}

public function create()
{
    return view('Crearproducto');
}

public function store(Request $request)
{
    $request->validate([
        'nombre',// => 'required|string|max:255',
        'precio',//  => 'required|numeric|min:0',
        'descripcion'// => 'nullable|string'
    ]);

    $producto = new Producto();
    $producto->nombre = $request->input('nombre');
    $producto->precio = $request->input('precio');
    $producto->descripcion = $request->input('descripcion');
    $producto->save();
    $productos = Producto::all();
    return view('productosview', compact('productos'))->with('success', 'El producto se ha creado exitosamente.');
}

public function delete($id)
{
    Producto::find($id)->delete();
    $productos = Producto::all();
    return view('productosview', compact('productos'));
}

}
