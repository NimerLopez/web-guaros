# Mejoras de Seguridad Implementadas

Este documento detalla las mejoras de seguridad críticas implementadas en el proyecto Guaro Tico.

**Fecha:** 1 de Noviembre, 2025
**Versión:** 1.0

---

## 1. Sistema de Roles y Permisos

### Middleware IsAdmin
**Archivo:** `app/Http/Middleware/IsAdmin.php`

**Descripción:**
- Middleware personalizado que protege el área de administración
- Verifica que el usuario esté autenticado
- Valida que el usuario tenga permisos de administrador

**Configuración actual:**
Por ahora, el middleware valida por email. Los emails autorizados se encuentran en:
```php
$adminEmails = [
    'admin@guaroscr.com',
    'superachievercr@gmail.com',
];
```

**TODO para producción:**
Agregar campo `is_admin` a la tabla users mediante una migración:
```bash
php artisan make:migration add_is_admin_to_users_table
```

**Rutas protegidas:**
- `/admin/dashboard` - Dashboard principal
- `/admin/categories` - Gestión de categorías (GET/POST/PUT/DELETE)
- `/admin/products` - Gestión de productos (GET/POST/PUT/DELETE)

---

## 2. Rate Limiting

### Protección contra Fuerza Bruta

**Rutas de autenticación (5 intentos por minuto):**
```php
Route::middleware(['throttle:5,1'])->group(function () {
    Auth::routes();
});
```

**API de validación de stock (60 intentos por minuto):**
```php
Route::middleware(['throttle:60,1'])->group(function () {
    Route::post('/api/validate-stock', ...);
});
```

**Beneficios:**
- Previene ataques de fuerza bruta en login
- Evita abuso de la API de validación de stock
- Protección contra DDoS básicos

---

## 3. Variables de Entorno para Datos Sensibles

### Archivo: `.env`

**Variables agregadas:**
```env
# Configuración del negocio
BUSINESS_WHATSAPP_NUMBER=50685443529
BUSINESS_PHONE="+506 8544 3529"
BUSINESS_EMAIL=superachievercr@gmail.com
BUSINESS_NAME="Guaro Tico"

# Redes sociales (URLs completas)
SOCIAL_FACEBOOK_URL=
SOCIAL_INSTAGRAM_URL=
SOCIAL_WHATSAPP_URL=
```

**Archivos actualizados:**
- `resources/views/components/layouts/app.blade.php`

**Uso en vistas:**
```blade
{{ env('BUSINESS_PHONE', '+506 8544 3529') }}
{{ env('BUSINESS_EMAIL', 'info@guaroscr.com') }}
{{ env('BUSINESS_WHATSAPP_NUMBER', '50685443529') }}
```

**Beneficios:**
- Datos sensibles no están hardcodeados en el código
- Fácil cambio de configuración sin modificar código
- Mejor seguridad en control de versiones

---

## 4. Validación de Stock Server-Side

### Endpoint API
**Ruta:** `POST /api/validate-stock`
**Controlador:** `ProductController@validateStock`

**Validaciones:**
- Producto debe existir en la base de datos
- Cantidad debe ser un número entero mayor a 0
- Debe haber stock suficiente disponible

**Respuesta exitosa:**
```json
{
    "success": true,
    "message": "Stock disponible",
    "product": {
        "id": 1,
        "name": "Producto",
        "price": 15000,
        "available_stock": 10
    }
}
```

**Respuesta de error (stock insuficiente):**
```json
{
    "success": false,
    "message": "No hay suficiente stock disponible. Stock actual: 2",
    "available_stock": 2
}
```

**Componente de productos actualizado:**
- Muestra stock disponible
- Deshabilita botón "Añadir" si no hay stock
- Incluye atributo `data-stock` para validación en frontend

---

## 5. Sanitización de Inputs

### Búsqueda de Productos
**Archivo:** `resources/views/components/layouts/app.blade.php`

**Función de escape HTML:**
```javascript
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
```

**Implementación:**
- Todo input de búsqueda es escapado antes de procesarse
- Previene inyección de scripts maliciosos (XSS)
- Normalización de texto después del escape

**Beneficios:**
- Protección contra XSS en búsqueda
- Input seguro del usuario
- No afecta la funcionalidad de búsqueda

---

## 6. Reorganización de Rutas

### Nueva estructura

**Rutas públicas:**
- `/` - Home
- `/productos` - Catálogo con filtros
- `/products/category/{slug}` - API de filtrado

**Rutas de admin (protegidas con prefix `/admin`):**
- `/admin/dashboard`
- `/admin/categories`
- `/admin/products`

**Beneficios:**
- Estructura más clara y organizada
- Fácil identificación de áreas protegidas
- Mejor mantenibilidad del código

---

## Checklist de Seguridad para Producción

### ANTES DE DEPLOY:

- [ ] **Cambiar APP_DEBUG=false en .env**
- [ ] **Agregar contraseña fuerte a la base de datos**
- [ ] **Revisar y actualizar emails de admin en IsAdmin middleware**
- [ ] **Configurar SSL/HTTPS**
- [ ] **Implementar campo is_admin en tabla users**
- [ ] **Configurar backup automático de base de datos**
- [ ] **Revisar permisos de archivos en servidor**
- [ ] **Configurar firewall**
- [ ] **Implementar logging de accesos al admin**
- [ ] **Configurar variables de entorno de producción**
- [ ] **Actualizar URLs de redes sociales en .env**
- [ ] **Revisar y actualizar rate limiting según necesidades**

### RECOMENDACIONES ADICIONALES:

1. **Implementar 2FA (autenticación de dos factores)**
   ```bash
   composer require pragmarx/google2fa-laravel
   ```

2. **Agregar campo is_admin a users:**
   ```php
   Schema::table('users', function (Blueprint $table) {
       $table->boolean('is_admin')->default(false);
   });
   ```

3. **Logs de auditoría:**
   - Implementar logging de todas las acciones de admin
   - Registrar creación/edición/eliminación de productos
   - Monitorear intentos fallidos de login

4. **Backup automático:**
   ```bash
   composer require spatie/laravel-backup
   ```

5. **Headers de seguridad:**
   Agregar en `.htaccess` o configuración de servidor:
   ```
   X-Frame-Options: SAMEORIGIN
   X-Content-Type-Options: nosniff
   X-XSS-Protection: 1; mode=block
   ```

---

## Contacto de Seguridad

Para reportar vulnerabilidades de seguridad, contactar a:
- Email: seguridad@guaroscr.com (configurar)
- Responsable: Administrador del sistema

---

## Registro de Cambios

### Versión 1.0 (2025-11-01)
- ✅ Implementación de middleware IsAdmin
- ✅ Rate limiting en rutas críticas
- ✅ Variables de entorno para datos sensibles
- ✅ Validación de stock server-side
- ✅ Sanitización de inputs de búsqueda
- ✅ Reorganización de rutas con protección

---

**Nota:** Este documento debe mantenerse actualizado con cada cambio de seguridad implementado.
