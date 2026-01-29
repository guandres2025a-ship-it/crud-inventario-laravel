<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductoRequest as RequestsStoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request\StoreProductoRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ProductoApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Producto::all()
        );
    }

    public function store(RequestsStoreProductoRequest $request)
    {
        $producto = Producto::created([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'precio'    => $request->precio,
            'stock'     => $request->stock,
            'user_id' => auth()->id(),
        ]);

        return response()->json($producto, 201);
    }


    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->update($request->validate());
        return response()->json($producto);
    }

    
}
