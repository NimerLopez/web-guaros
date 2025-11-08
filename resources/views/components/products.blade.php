@props(['products', 'columns' => 'col-lg-4 col-md-6'])

<div class="products-grid" id="productContainer">
    @forelse($products as $product)
        <div class="product-item" data-category="{{ $product->category ?? '' }}">
            <div class="product-card">
                <div class="product-image-wrapper">
                    <img src="{{ $product->image_url ?? asset('assets/img/default-product.png') }}"
                         class="product-img"
                         alt="{{ $product->name }}">

                    @if($product->is_featured ?? false)
                        <span class="product-badge featured-badge">
                            <i class="fas fa-star"></i> Destacado
                        </span>
                    @endif

                    @if(isset($product->stock) && $product->stock <= 5 && $product->stock > 0)
                        <span class="product-badge stock-badge low-stock">
                            ¡Últimas unidades!
                        </span>
                    @endif
                </div>

                <div class="product-body">
                    @if($product->category_name ?? false)
                        <div class="product-category">
                            <span class="category-badge">{{ $product->category_name }}</span>
                        </div>
                    @endif

                    <h3 class="product-title">{{ $product->name }}</h3>
                    <p class="product-description">{{ Str::limit($product->description, 80) }}</p>

                    <div class="product-meta">
                        <div class="product-price">
                            <span class="price-symbol">₡</span>
                            <span class="price-amount">{{ number_format($product->price, 0) }}</span>
                        </div>

                        @if(isset($product->stock))
                            <div class="product-stock">
                                @if($product->stock > 5)
                                    <i class="fas fa-check-circle"></i> Disponible
                                @elseif($product->stock > 0)
                                    <i class="fas fa-exclamation-circle"></i> Stock bajo
                                @else
                                    <i class="fas fa-times-circle"></i> Sin stock
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <div class="product-footer">
                    @if(($product->stock ?? 1) > 0)
                        <button class="product-add-btn add-to-cart"
                                data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}"
                                data-price="{{ $product->price }}"
                                data-stock="{{ $product->stock ?? 999 }}">
                            <i class="fas fa-cart-plus"></i>
                            <span>Añadir al carrito</span>
                        </button>
                    @else
                        <button class="product-add-btn disabled" disabled>
                            <i class="fas fa-ban"></i>
                            <span>No disponible</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="no-products">
            <div class="no-products-icon">
                <i class="fas fa-wine-bottle"></i>
            </div>
            <h3>No hay productos disponibles</h3>
            <p>Prueba con otra categoría o vuelve más tarde.</p>
        </div>
    @endforelse
</div>