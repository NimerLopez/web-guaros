<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="business-whatsapp" content="{{ env('BUSINESS_WHATSAPP_NUMBER', '50685443529') }}">
        <title>{{ env('BUSINESS_NAME', 'Guaro Tico') }} - El mejor guaro de Costa Rica</title>
        <meta name="description" content="Descubre la mejor selección de guaros y licores de Costa Rica. Calidad premium y entrega rápida.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Custom CSS (legacy) -->
        <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">

        <!-- Vite Assets -->
        @vite(['resources/css/app.css'])
    </head>
    <body>
    <div class="age-verification" id="ageVerification">
        <div class="age-verification-content">
            <h2>Verificación de Edad</h2>
            <p>Para ingresar a este sitio, debes ser mayor de 18 años.</p>
            <p>¿Eres mayor de 18 años?</p>
            <div class="age-buttons">
                <button class="age-btn age-btn-primary" id="ageYes">Sí, soy mayor de 18</button>
                <button class="age-btn age-btn-secondary" id="ageNo">No, soy menor de 18</button>
            </div>
        </div>
    </div>
 <header>
    <!-- Barra superior con información de contacto -->
    <div class="top-bar">
        <div class="container">
            <div class="top-info">
                <div class="contact-info">
                    <span><i class="fas fa-phone-alt"></i> {{ env('BUSINESS_PHONE', '+506 8544 3529') }}</span>
                    <span><i class="fas fa-envelope"></i> {{ env('BUSINESS_EMAIL', 'info@guaroscr.com') }}</span>
                </div>
                <div class="social-icons">
                    @if(env('SOCIAL_FACEBOOK_URL'))
                        <a href="{{ env('SOCIAL_FACEBOOK_URL') }}" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(env('SOCIAL_INSTAGRAM_URL'))
                        <a href="{{ env('SOCIAL_INSTAGRAM_URL') }}" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if(env('SOCIAL_WHATSAPP_URL'))
                        <a href="{{ env('SOCIAL_WHATSAPP_URL') }}" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar principal -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('products.home') }}">
                <img src="{{ asset('assets/img/logoGuarosJorge.png') }}" alt="Guaro Tico Logo" class="navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" id="navbarToggler" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('products.home') }}" aria-current="page">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button" aria-expanded="false">
                            <i class="fas fa-wine-bottle"></i> Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productosDropdown">
                            @isset($categories)
                                @foreach($categories as $category)
                                    <li><a class="dropdown-item" href="{{ route('productos.catalogo', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
                                @endforeach

                                @if(count($categories) > 0)
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                            @endisset
                            <li><a class="dropdown-item" href="{{ route('productos.catalogo') }}">Ver Todos</a></li>
                        </ul>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                </ul>
                <div class="navbar-actions">
                    <div class="search-box">
                        <input type="text" class="search-input" placeholder="Buscar productos...">
                        <button class="search-btn"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="cart-icon" id="cartIconBtn">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count" id="cartCount">0</span>
                    </div>
                    <button class="btn btn-cart" id="viewCartBtn">
                        Ver Carrito
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>
        <main class="w-full lg:max-w-4xl max-w-[335px] flex flex-col items-center justify-center text-center">
            {{ $slot }}
        </main>
           <!-- Footer -->
    <footer class="footer py-3 text-white" style="background-color: #8b0000;">
        <div class="container text-center">
            <small>&copy; 2023 Guaro Tico. Todos los derechos reservados.</small>
        </div>
    </footer>

    <!-- Cart Modal -->
    <div class="modal" id="cartModal">
        <div class="modal-overlay" id="cartModalOverlay"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tu Carrito</h5>
                    <button type="button" class="modal-close" id="closeCartModal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="cartItems">
                        <p class="text-center" id="emptyCartMessage">Tu carrito está vacío.</p>
                        <table class="cart-table" id="cartTable" style="display: none;">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="cartItemsList">
                                <!-- Cart items will be added here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-total-container" id="cartTotalContainer" style="display: none;">
                        <h5>Total:</h5>
                        <h5 id="cartTotal">₡0</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="continueShoppingBtn">Seguir Comprando</button>
                    <button type="button" class="btn btn-primary" id="checkoutBtn">Finalizar Compra</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout Success Modal -->
    <div class="modal" id="checkoutSuccessModal">
        <div class="modal-overlay" id="checkoutSuccessOverlay"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¡Compra Exitosa!</h5>
                    <button type="button" class="modal-close" id="closeSuccessModal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-check-circle text-success" style="font-size: 4rem; color: #28a745;"></i>
                        <h4 style="margin-top: 1rem;">¡Gracias por tu compra!</h4>
                        <p>Tu pedido ha sido procesado correctamente.</p>
                        <p>Recibirás un correo electrónico con los detalles de tu compra.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="acceptSuccessBtn">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Vite JavaScript -->
    @vite(['resources/js/app.js'])

    </body>
</html>