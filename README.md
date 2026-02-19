# CRUD Inventario Laravel

Este es un sistema de gestión de inventarios desarrollado con Laravel 12, diseñado para facilitar el control de productos y categorías de manera eficiente.

## Características

- **Gestión de Productos:** CRUD completo (Crear, Leer, Actualizar, Eliminar) para productos.
- **Categorización:** Organización de productos mediante categorías dinámicas.
- **Panel de Administración:** Sección exclusiva para administradores con estadísticas globales y gestión de usuarios.
- **API RESTful:** Endpoints listos para integrar con otros sistemas o aplicaciones móviles.
- **Autenticación con Jetstream:** Sistema robusto de inicio de sesión y registro utilizando Laravel Jetstream con Livewire.
- **Gestión de Equipos:** Soporte integrado para equipos, permitiendo la colaboración en la gestión del inventario.
- **Seguridad:** Implementación de Laravel Sanctum para la seguridad de la API.

## Requisitos Técnicos

- **PHP:** ^8.2
- **Framework:** Laravel 12
- **Frontend:** Livewire, Tailwind CSS, Vite
- **Base de Datos:** SQLite (configuración predeterminada)

## Instalación y Configuración

Puedes levantar el proyecto de dos maneras: localmente o usando Docker.

### Opción 1: Localmente (Recomendado para desarrollo rápido)

Este método utiliza el servidor embebido de PHP y una base de datos SQLite.

1. **Clonar el repositorio:**
   ```bash
   git clone <url-del-repositorio>
   cd crud-inventario-laravel
   ```

2. **Configuración automática:**
   Ejecuta el siguiente comando para instalar todas las dependencias y configurar la base de datos automáticamente:
   ```bash
   composer run setup
   ```
   *Este comando realiza: `composer install`, copia `.env`, genera `APP_KEY`, crea la base de datos SQLite, ejecuta migraciones, hace `npm install` y `npm run build`.*

3. **Iniciar el proyecto:**
   Para levantar el servidor y compilar los activos en tiempo real:
   ```bash
   composer run dev
   ```
   Accede a: `http://localhost:8000`

---

### Opción 2: Docker (Contenedores)

Si prefieres usar Docker con MySQL y Nginx:

1. **Levantar contenedores:**
   ```bash
   docker-compose up -d
   ```

2. **Acceder al contenedor para finalizar la configuración:**
   ```bash
   docker exec -it clothes_app bash
   ```

3. **Dentro del contenedor, configurar la aplicación (solo la primera vez):**
   ```bash
   php artisan key:generate
   php artisan migrate
   npm install
   npm run build
   ```
   Accede a el puerto configurado en `docker-compose.yml` (por defecto `http://localhost:8000`).

## Acceso Predeterminado (Desarrollo)

Para facilitar las pruebas, puedes usar las siguientes credenciales de administrador:

- **Email:** `arizaalvaro238@gmail.com`
- **Contraseña:** `alvaro123`

## Documentación de la API

El sistema cuenta con una API básica para la gestión de productos:

| Método | Endpoint | Descripción |
| :--- | :--- | :--- |
| `GET` | `/api/productos` | Lista todos los productos con sus categorías. |
| `POST` | `/api/productos` | Crea un nuevo producto. |
| `PUT` | `/api/productos/{id}` | Actualiza un producto existente. |
| `DELETE` | `/api/productos/{id}` | Elimina un producto. |

## Comandos Útiles

- **`composer run test`**: Ejecuta las pruebas del sistema.
- **`php artisan db:seed`**: Poblar la base de datos con el usuario administrador y datos de prueba.
- **`npm run dev`**: Solo para compilar activos de frontend en tiempo real.

## Licencia

Este proyecto es software de código abierto bajo la licencia [MIT](https://opensource.org/licenses/MIT).
