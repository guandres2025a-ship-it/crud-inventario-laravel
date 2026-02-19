<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Producto;

class ProductoPolicy
{
    /**
     * Ver listado
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Ver producto individual
     */
    public function view(User $user, Producto $producto): bool
    {
        return $user->isAdmin() || $producto->user_id === $user->id;
    }

    /**
     * Crear producto
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Actualizar producto
     */
    public function update(User $user, Producto $producto): bool
    {
        return $user->isAdmin() || $producto->user_id === $user->id;
    }

    /**
     * Eliminar producto
     */
    public function delete(User $user, Producto $producto): bool
    {
        return $user->isAdmin() || $producto->user_id === $user->id;
    }
}
