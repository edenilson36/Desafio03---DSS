<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // muestra todos los productos
    public function index()
    {
        $productos = Producto::all(); // obtiene todos los productos de la base de datos
        return view('producto.index', compact('productos')); // envia los productos a la vista
    }

    // muestra el formulario para crear un nuevo producto
    public function create()
    {
        return view('producto.create'); // retorna la vista para crear un producto
    }

    // guarda un nuevo producto en la base de datos
    public function store(Request $request)
    {
        // validacion de los datos ingresados
        $request->validate([
            'nombre' => 'required|min:3',
            'precio_unitario' => 'required|numeric|min:0.01',
            'cantidad' => 'required|integer|min:0',
            'categoria' => 'required',
        ]);

        Producto::create($request->all()); // crea un nuevo producto con los datos validados
        return redirect()->route('producto.index')->with('success', 'Producto creado correctamente.'); // redirige con mensaje de exito
    }

    // metodo show vacio por el momento
    public function show(string $id)
    {
       
    }

    // muestra el formulario para editar un producto existente
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id); // busca el producto por id o falla si no existe
        return view('producto.edit', compact('producto')); // envia el producto a la vista de edicion
    }

    // actualiza un producto existente en la base de datos
    public function update(Request $request, string $id)
    {
        // validacion de los datos actualizados
        $request->validate([
            'nombre' => 'required|min:3',
            'precio_unitario' => 'required|numeric|min:0.01',
            'cantidad' => 'required|integer|min:0',
            'categoria' => 'required',
        ]);

        $producto = Producto::findOrFail($id); // busca el producto por id
        $producto->update($request->all()); // actualiza el producto con los nuevos datos
        return redirect()->route('producto.index')->with('success', 'Producto actualizado correctamente.'); // redirige con mensaje de exito
    }

    // elimina un producto de la base de datos
    public function destroy(string $id)
    {
        Producto::destroy($id); // elimina el producto segun el id
        return redirect()->route('producto.index')->with('success', 'Producto eliminado correctamente.'); // redirige con mensaje de exito
    }
}
