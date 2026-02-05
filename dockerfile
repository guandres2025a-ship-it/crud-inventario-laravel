# 1️⃣ Imagen base con PHP
FROM php:8.2-apache

# 2️⃣ Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl

# 3️⃣ Habilitar extensiones PHP necesarias para Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# 4️⃣ Habilitar mod_rewrite (Laravel lo necesita)
RUN a2enmod rewrite

# 5️⃣ Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6️⃣ Establecer directorio de trabajo
WORKDIR /var/www/html

# 7️⃣ Copiar el proyecto al contenedor
COPY . .

# 8️⃣ Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# 9️⃣ Permisos para storage y cache
RUN chown -R www-data:www-data storage bootstrap/cache

# 🔟 Exponer el puerto 80
EXPOSE 80
