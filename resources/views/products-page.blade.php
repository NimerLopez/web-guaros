<x-layouts.app>
<!-- Sección Hero de Productos -->
<section class="py-5 bg-white" id="productos-header">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-3">Nuestros Productos</h1>
                <p class="lead text-muted mb-4">
                    Explora nuestra selección completa de licores premium de Costa Rica.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-5 bg-light" id="productos">
    <div class="container">
        <!-- Filtros por categoría -->
        <x-category-filters
            :categories="$categories"
            activeFilter="{{ request('category', 'all') }}"
        />

        <!-- Contenedor de productos -->
        <x-products :products="$products" columns="col-lg-4 col-md-6" />
    </div>
</section>
</x-layouts.app>
