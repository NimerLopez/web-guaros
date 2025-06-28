@props(['products', 'columns' => 'col-lg-4 col-md-6'])

<div class="row g-4" id="productContainer">
    @foreach($products as $product)
        <div class="{{ $columns }} product-item" data-category="{{ $product->category ?? '' }}">
            <div class="card product-card h-100 border-0 shadow-sm overflow-hidden">
                <div class="position-relative">
                    <img src="{{ $product->image_url }}" 
                         class="card-img-top product-img" 
                         alt="{{ $product->name }}" 
                         style="height: 220px; object-fit: cover;">
                    
                    @if($product->is_new ?? false)
                        <span class="position-absolute top-0 end-0 m-2 badge bg-danger">Nuevo</span>
                    @endif
                </div>
                
                <div class="card-body">
                    @if($product->category_name ?? false)
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">{{ $product->category_name }}</span>
                            
                            @if($product->rating ?? false)
                                <div class="text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($product->rating))
                                            <i class="bi bi-star-fill"></i>
                                        @elseif($i == ceil($product->rating) && $product->rating != floor($product->rating))
                                            <i class="bi bi-star-half"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            @endif
                        </div>
                    @endif              
                    <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                </div>            
                <div class="card-footer bg-transparent border-top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fs-4 fw-bold text-primary">₡{{ number_format($product->price, 2) }}</span>
                        <button class="btn btn-primary rounded-pill px-3 add-to-cart" 
                                data-id="{{ $product->id }}" 
                                data-name="{{ $product->name }}" 
                                data-price="{{ $product->price }}">
                            <i class="bi bi-cart-plus me-2"></i>Añadir
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>