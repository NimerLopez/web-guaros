<x-layouts.app>
<!-- Sección El Guaro -->
<section class="py-5 bg-white" id="el-guaro">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-3">El guaro, el mejor de Costa Rica</h1>
                <p class="lead text-muted mb-4">
                    Disfruta del auténtico sabor con nuestra selección de guaros de todo tipo.
                </p>
            </div>
        </div>
    </div>
</section>
    <!-- Products Section -->
<section class="py-5 bg-light" id="productos">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Nuestros Productos</h2>
            <p class="lead text-muted">Descubre nuestra selección</p>
        </div>
        
        <!-- Filtros mejorados -->
        <x-category-filters 
            :categories="$categories"
            activeFilter="{{ request('category', 'all') }}"
        />
        <!-- Contenedor de productos -->
        <x-products :products="$products" columns="col-lg-4 col-md-6" />
        <!-- No hay productos -->
        <div class="text-center mt-5" id="noProductsMessage">
            <h3 class="text-muted">No hay productos disponibles en esta categoría.</h3>
            <p class="text-muted">Prueba con otra categoría o revisa más tarde.</p>
        </div>

    </div>
</section>
</x-layouts.app>
