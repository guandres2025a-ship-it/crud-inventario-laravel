<?php

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('una categoria puede tener muchos productos', function () {

    // Crear categoría
    $categoria = Categoria::factory()->create();

    // Crear 3 productos asociados
    Producto::factory()->count(3)->create([
        'categoria_id' => $categoria->id,
    ]);

    // Verificar relación
    expect($categoria->productos)->toHaveCount(3);
});
