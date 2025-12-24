<?php
// Script temporal de instalación para cPanel
// ELIMINAR después de ejecutar

echo "<h1>Instalación Laravel en cPanel</h1>";

// 1. Generar APP_KEY
echo "<h2>1. Generando APP_KEY...</h2>";
exec('php artisan key:generate', $output, $return);
echo "<pre>" . implode("\n", $output) . "</pre>";

// 2. Ejecutar migraciones
echo "<h2>2. Ejecutando migraciones...</h2>";
exec('php artisan migrate --force', $output, $return);
echo "<pre>" . implode("\n", $output) . "</pre>";

// 3. Cachear configuración
echo "<h2>3. Cacheando configuración...</h2>";
exec('php artisan config:cache', $output, $return);
echo "<pre>" . implode("\n", $output) . "</pre>";

// 4. Cachear rutas
echo "<h2>4. Cacheando rutas...</h2>";
exec('php artisan route:cache', $output, $return);
echo "<pre>" . implode("\n", $output) . "</pre>";

// 5. Cachear vistas
echo "<h2>5. Cacheando vistas...</h2>";
exec('php artisan view:cache', $output, $return);
echo "<pre>" . implode("\n", $output) . "</pre>";

echo "<h2 style='color: green;'>✓ Instalación completada!</h2>";
echo "<p><strong style='color: red;'>IMPORTANTE: Elimina este archivo (install.php) ahora!</strong></p>";
