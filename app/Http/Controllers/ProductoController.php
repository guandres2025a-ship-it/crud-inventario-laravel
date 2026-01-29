<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * LISTADO DE PRODUCTOS
     * - Admin: ve todos
     * - Usuario: ve solo los suyos
     */

    
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $productos = Producto::paginate(10);
        } else {
            $productos = Producto::where('user_id', $user->id)->paginate(10);
        }

        return view('productos.index', compact('productos'));
    }

    /**
     * GUARDAR PRODUCTO
     * - Siempre se asigna al usuario logueado
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'precio'    => 'required|numeric|min:0',
            'stock'     => 'required|integer|min:0',
        ]);

        Producto::create([
            'nombre'    => $request->nombre,
            'categoria' => $request->categoria,
            'precio'    => $request->precio,
            'stock'     => $request->stock,
            'user_id'   => auth()->id(), 
        ]);

        return redirect()->route('dashboard')
                         ->with('success', 'Producto creado correctamente.');
    }

    /**
     * EDITAR PRODUCTO
     * - Solo admin o dueño
     */
    public function edit(Producto $producto)
    {
        if (!auth()->user()->isAdmin() && $producto->user_id !== auth()->id()) {
            abort(403);
        }

        return view('productos.edit', compact('producto'));
    }

    /**
     * ACTUALIZAR PRODUCTO
     * - Solo admin o dueño
     */
    public function update(Request $request, Producto $producto)
    {
        if (!auth()->user()->isAdmin() && $producto->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'nombre'    => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'precio'    => 'required|numeric|min:0',
            'stock'     => 'required|integer|min:0',
        ]);

        $producto->update([
            'nombre'    => $request->nombre,
            'categoria' => $request->categoria,
            'precio'    => $request->precio,
            'stock'     => $request->stock,
        ]);

        return redirect()->route('dashboard')
                         ->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * ELIMINAR PRODUCTO
     * - Solo admin o dueño
     */
    public function destroy(Producto $producto)
    {
        if (!auth()->user()->isAdmin() && $producto->user_id !== auth()->id()) {
            abort(403);
        }

        $producto->delete();

        return redirect()->route('dashboard')
                         ->with('success', 'Producto eliminado correctamente.');
    }
}
