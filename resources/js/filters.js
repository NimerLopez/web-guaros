/**
 * Product Filters Module
 * Maneja el filtrado y búsqueda de productos
 */

export function initFilters() {
    const searchInput = document.querySelector('.search-input');
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productItems = document.querySelectorAll('.product-item');

    if (!searchInput) return;

    // Escapar HTML para prevenir XSS
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Normalizar texto para búsqueda (ignorar tildes y mayúsculas)
    function normalizeText(text) {
        const escaped = escapeHtml(text);
        return escaped.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
    }

    // Función para filtrar productos
    function filterProducts() {
        const searchTerm = normalizeText(searchInput.value);
        const activeFilter = document.querySelector('.filter-btn.active')?.dataset.filter || 'all';

        productItems.forEach(item => {
            const productName = normalizeText(item.querySelector('.product-title')?.textContent || '');
            const productDesc = normalizeText(item.querySelector('.product-description')?.textContent || '');
            const productCategory = item.dataset.category;

            // Verificar coincidencia
            const matchesSearch = searchTerm === '' ||
                               productName.includes(searchTerm) ||
                               productDesc.includes(searchTerm);

            const matchesCategory = activeFilter === 'all' ||
                                  productCategory === activeFilter;

            // Mostrar u ocultar con animación
            if (matchesSearch && matchesCategory) {
                item.style.display = 'block';
                item.classList.add('fade-in');
            } else {
                item.style.display = 'none';
                item.classList.remove('fade-in');
            }
        });
    }

    // Evento para botones de categoría
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            // Actualizar URL con el parámetro de categoría
            const url = new URL(window.location);
            if (filter === 'all') {
                url.searchParams.delete('category');
            } else {
                url.searchParams.set('category', filter);
            }

            // Recargar la página con el nuevo filtro
            window.location.href = url.toString();
        });
    });

    // Eventos para búsqueda
    searchInput.addEventListener('input', filterProducts); // Búsqueda en tiempo real
    searchInput.addEventListener('keyup', function(e) {
        if (e.key === 'Enter') filterProducts();
    });

    // Cargar filtros desde URL al inicio
    const urlParams = new URLSearchParams(window.location.search);
    const categoryParam = urlParams.get('category');
    const searchParam = urlParams.get('search');

    if (categoryParam) {
        const correspondingBtn = document.querySelector(`.filter-btn[data-filter="${categoryParam}"]`);
        if (correspondingBtn) {
            filterBtns.forEach(b => b.classList.remove('active'));
            correspondingBtn.classList.add('active');
        }
    }

    if (searchParam) {
        searchInput.value = searchParam;
    }

    filterProducts(); // Aplicar filtros iniciales
}
