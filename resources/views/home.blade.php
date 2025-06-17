<x-layouts.app>
        <!-- Hero Section -->
        <section class="hero-section">
        <div class="hero-content">
            <h1 class="display-3 fw-bold mb-4">El Mejor Guaro de Costa Rica</h1>
            <p class="lead mb-4">Disfruta del auténtico sabor tico con nuestra selección premium de guaro. Tradición y calidad en cada botella.</p>
            <a href="#productos" class="btn btn-primary btn-lg me-2">Ver Productos</a>
            <a href="#contacto" class="btn btn-secondary btn-lg">Contactar</a>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-5" id="productos">
        <div class="container">
            <h2 class="text-center mb-5">Nuestros Productos</h2>
            
            <div class="d-flex justify-content-center mb-4">
                <div class="btn-group">
                    <button class="btn btn-outline-primary filter-btn active" data-filter="all">Todos</button>
                    <button class="btn btn-outline-primary filter-btn" data-filter="tradicional">Tradicional</button>
                    <button class="btn btn-outline-primary filter-btn" data-filter="premium">Premium</button>
                    <button class="btn btn-outline-primary filter-btn" data-filter="especial">Edición Especial</button>
                </div>
            </div>       
            <div class="row" id="productContainer">
                @foreach($products as $product)
                    <div class="col-md-4 product-item" data-category="{{ $product->category }}">
                        <div class="card product-card">
                            <img src="{{ $product->image_url }}" class="card-img-top product-img" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fs-5 fw-bold">₡{{ number_format($product->price, 2) }}</span>
                                    <button class="btn btn-primary add-to-cart" 
                                            data-id="{{ $product->id }}" 
                                            data-name="{{ $product->name }}" 
                                            data-price="{{ $product->price }}">
                                        Añadir al Carrito
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach                      
            </div>
        </div>
    </section>

    <!-- About Section -->
    {{-- 
        <!-- Sección "Sobre Nosotros" -->
        <section class="about-section" id="nosotros">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Columna de texto con la historia de la empresa -->
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h2 class="mb-4">Nuestra Historia</h2>
                        <p class="lead">
                            <!-- Breve introducción sobre la tradición de la empresa -->
                            Desde 1985, hemos estado produciendo el mejor guaro de Costa Rica, manteniendo viva la tradición y el sabor auténtico que nos caracteriza.
                        </p>
                        <p>
                            <!-- Explicación del proceso de destilación y calidad -->
                            Nuestro proceso de destilación combina técnicas tradicionales con tecnología moderna para garantizar la mejor calidad en cada botella. Utilizamos ingredientes 100% costarricenses y nos enorgullece ser parte de la cultura tica.
                        </p>
                        <p>
                            <!-- Mensaje sobre el orgullo y dedicación en el producto -->
                            Cada botella de Guaro Tico es un pedacito de Costa Rica, elaborada con pasión y dedicación para que disfrutes del verdadero sabor de nuestra tierra.
                        </p>
                    </div>
                    <!-- Columna con imagen representativa de la destilería -->
                    <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1504279577054-acfeccf8fc52?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Nuestra destilería" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </section>
    --}}
{{--
        <!-- Testimonials Section -->
    <section class="testimonial-section" id="testimonios">
        <div class="container">
            <h2 class="text-center mb-5">Lo que dicen nuestros clientes</h2>
            <div class="row">
                <!-- Testimonial 1 -->
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Cliente" class="rounded-circle me-3" width="60">
                            <div>
                                <h5 class="mb-0">Carlos Rodríguez</h5>
                                <small class="text-muted">San José</small>
                            </div>
                        </div>
                        <p>"El mejor guaro que he probado. Su sabor auténtico me recuerda a las fiestas de mi pueblo. ¡Pura vida!"</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Cliente" class="rounded-circle me-3" width="60">
                            <div>
                                <h5 class="mb-0">María Fernández</h5>
                                <small class="text-muted">Alajuela</small>
                            </div>
                        </div>
                        <p>"La edición especial es simplemente espectacular. El sabor es único y la presentación es elegante. Perfecto para regalar."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Cliente" class="rounded-circle me-3" width="60">
                            <div>
                                <h5 class="mb-0">Juan Mora</h5>
                                <small class="text-muted">Guanacaste</small>
                            </div>
                        </div>
                        <p>"Siempre tengo una botella en casa para las visitas. Todos mis amigos extranjeros quedan encantados con el sabor de nuestro guaro."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
--}}

    <!-- Contact Section -->
    <section class="py-5 bg-light" id="contacto">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="mb-4">Contáctanos</h2>
                    <p class="mb-4">¿Tienes alguna pregunta o comentario? ¡Nos encantaría saber de ti!</p>
                    <form id="contactForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4">Visítanos</h2>
                    <div class="mb-4">
                        <h5>Destilería Guaro Tico</h5>
                        <p>Calle Principal, 200m Este del Parque Central<br>Alajuela, Costa Rica</p>
                        <p>
                            <i class="fas fa-phone me-2"></i> +506 2222-3333<br>
                            <i class="fas fa-envelope me-2"></i> info@guarotico.cr
                        </p>
                    </div>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125759.36571051192!2d-84.21498304179686!3d9.935565899999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0f9c4c0b5c2a5%3A0x8f0feb9d0c26b26c!2sParque%20Central%20de%20Alajuela!5e0!3m2!1ses!2scr!4v1659123456789!5m2!1ses!2scr" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
