import './bootstrap';
import { initAgeVerification } from './age-verification';
import { initCart } from './cart';
import { initFilters } from './filters';
import { initNavbar } from './navbar';
import { initModals } from './modals';

/**
 * Main Application JavaScript
 * Inicializa todos los módulos cuando el DOM está listo
 */

document.addEventListener('DOMContentLoaded', function() {
    // Inicializar verificación de edad
    initAgeVerification();

    // Inicializar carrito de compras
    initCart();

    // Inicializar filtros y búsqueda
    initFilters();

    // Inicializar navbar (sin Bootstrap)
    initNavbar();

    // Inicializar modales (sin Bootstrap)
    initModals();

    console.log('Aplicación inicializada correctamente');
});
