<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder al panel de administración.');
        }

        // Verificar si el usuario es admin (por email o campo is_admin)
        // Por ahora verificamos si el email contiene 'admin' o si es el email específico del admin
        $user = auth()->user();

        // TODO: Cambiar esta lógica cuando agregues el campo 'is_admin' a la tabla users
        // if (!$user->is_admin) { abort(403, 'No tienes permiso para acceder a esta área.'); }

        // Por ahora, solo permitir acceso a emails que contengan 'admin' o emails específicos
        $adminEmails = [
            'admin@guaroscr.com',
            'superachievercr@gmail.com',
            'admin@elguaro.com',
            'admin@example.com', // Email de ejemplo para desarrollo
            // Agrega más emails de admin aquí
        ];

        if (!in_array(strtolower($user->email), array_map('strtolower', $adminEmails))) {
            abort(403, 'No tienes permiso para acceder al panel de administración.');
        }

        return $next($request);
    }
}
