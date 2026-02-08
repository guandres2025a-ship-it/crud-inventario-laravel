<?php

use App\Models\User;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('un usuario solo ve sus productos', function () {

    $user = User::factory()->create([
        'role' => 'user'
    ]);

    $misProductos = Producto::factory()->count(2)->create([
        'user_id' => $user->id,
    ]);

    Producto::factory()->count(3)->create();

    $response = $this->actingAs($user)
        ->get(route('dashboard'));

    $response->assertStatus(200);

    
    foreach ($misProductos as $producto) {
        $response->assertSee($producto->nombre);
    }


    expect($response->getContent())->toContain('Gestión de Productos');
});


test('un administrador puede ver todos los productos', function () {

    $admin = User::factory()->create([
        'role' => 'admin'
    ]);

    $productos = Producto::factory()->count(5)->create();

    $response = $this->actingAs($admin)
        ->get(route('dashboard'));

    $response->assertStatus(200);

    
    foreach ($productos as $producto) {
        $response->assertSee($producto->nombre);
    }
});


test('un usuario no puede editar los productos de otros', function (){
    $user = User::factory()->create([
        'role' => 'user'
    ]);

    $other_user = User::factory()->create([
        'role' => 'role'
    ]);

    $foreign_product = Producto::factory()->create([
        'user_id' => $other_user->id
    ]);

    $response = $this->actingAs($user)
        ->put(route('productos.update', $foreign_product), [
            'nombre' => 'Producto Hackeado',
            'categoria' => 'Fake',
            'precio' => 999,
            'stock' => 99,
        ]);

    $response->assertStatus(403);
});


test('un usuario no puede eliminar los productos de otros', function () {
    $user = User::factory()->create([
        'role' => 'user'
    ]);

    $other_user = User::factory()->create([
        'role' => 'role'
    ]);

    $foreign_product = Producto::factory()->create([
        'user_id' => $other_user->id
    ]);

    $response = $this->actingAs($user)
        ->delete(route('productos.destroy', $foreign_product));

    $response->assertStatus(403);
});