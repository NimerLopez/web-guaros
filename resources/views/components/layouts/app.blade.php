<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Guaro Tico - El mejor guaro de Costa Rica</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Custom CSS -->
        <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-color);
            background-color: var(--light-color);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #003d7a;
            border-color: #003d7a;
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-secondary:hover {
            background-color: #cc0000;
            border-color: #cc0000;
        }
        
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1506877339221-ede41280f9e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 150px 0;
            text-align: center;
            position: relative;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .product-card {
            border: none;
            transition: transform 0.3s;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .product-card:hover {
            transform: translateY(-10px);
        }
        
        .product-img {
            height: 300px;
            object-fit: cover;
        }
        
        .about-section {
            background-color: var(--primary-color);
            color: white;
            padding: 80px 0;
        }
        
        .testimonial-section {
            background-color: var(--light-color);
            padding: 80px 0;
        }
        
        .testimonial-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: 100%;
        }
        
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 50px 0 20px;
        }
        
        .social-icon {
            font-size: 24px;
            margin-right: 15px;
            color: white;
        }
        
        .age-verification {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        
        .age-verification-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            max-width: 500px;
        }
        
        .cart-icon {
            position: relative;
        }
        
        .cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: var(--secondary-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
        }
        
        .filter-btn.active {
            background-color: var(--primary-color);
            color: white;
        }
        /* Estilos generales */
:root {
    --primary-color: #8b0000; /* Rojo oscuro para tema de licor */
    --secondary-color: #f8f1e5; /* Beige claro para contraste */
    --accent-color: #ffb700; /* Dorado para acentos */
    --dark-color: #2c1a1d; /* Marrón oscuro */
    --light-color: #ffffff;
    --text-color: #333333;
    --transition: all 0.3s ease;
}

body {
    font-family: 'Poppins', sans-serif;
    color: var(--text-color);
}

/* Barra superior */
.top-bar {
    background-color: var(--dark-color);
    color: var(--light-color);
    padding: 8px 0;
    font-size: 14px;
}

.top-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.contact-info span {
    margin-right: 20px;
}

.contact-info i, .social-icons i {
    margin-right: 5px;
    color: var(--accent-color);
}

.social-icons a {
    color: var(--light-color);
    margin-left: 15px;
    transition: var(--transition);
}

.social-icons a:hover {
    color: var(--accent-color);
}

/* Navbar principal */
.navbar-custom {
    background-color: var(--primary-color);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
}

.navbar-brand img {
    transition: var(--transition);
}

.navbar-brand img:hover {
    transform: scale(1.05);
}

.navbar-toggler {
    border: 2px solid var(--light-color);
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

/* Enlaces de navegación */
.navbar-nav .nav-link {
    color: var(--light-color);
    font-weight: 500;
    padding: 10px 15px;
    position: relative;
    transition: var(--transition);
}

.navbar-nav .nav-link i {
    margin-right: 5px;
    font-size: 16px;
}

.navbar-nav .nav-link:hover, 
.navbar-nav .nav-link.active {
    color: var(--accent-color);
}

.navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background-color: var(--accent-color);
    bottom: 5px;
    left: 50%;
    transform: translateX(-50%);
    transition: var(--transition);
}

.navbar-nav .nav-link:hover::after,
.navbar-nav .nav-link.active::after {
    width: 70%;
}

/* Dropdown */
.dropdown-menu {
    background-color: var(--dark-color);
    border: none;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    padding: 10px;
    margin-top: 10px;
}

.dropdown-item {
    color: var(--light-color);
    padding: 8px 15px;
    transition: var(--transition);
    border-radius: 5px;
}

.dropdown-item:hover {
    background-color: var(--primary-color);
    color: var(--accent-color);
}

.dropdown-divider {
    border-color: rgba(255, 255, 255, 0.1);
}

/* Buscador */
.search-box {
    position: relative;
    width: 200px;
}

.search-input {
    width: 100%;
    padding: 8px 35px 8px 15px;
    border-radius: 20px;
    border: none;
    background-color: rgba(255, 255, 255, 0.2);
    color: var(--light-color);
    transition: var(--transition);
}

.search-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.search-input:focus {
    outline: none;
    background-color: rgba(255, 255, 255, 0.3);
    box-shadow: 0 0 0 2px var(--accent-color);
}

.search-btn {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    color: var(--light-color);
    cursor: pointer;
}

/* Carrito */
.cart-icon {
    position: relative;
    cursor: pointer;
    font-size: 20px;
    color: var(--light-color);
    transition: var(--transition);
}

.cart-icon:hover {
    color: var(--accent-color);
}

.cart-count {
    position: absolute;
    top: -8px;
    right: -8px;
    background-color: var(--accent-color);
    color: var(--dark-color);
    font-size: 12px;
    font-weight: bold;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.btn-cart {
    background-color: var(--accent-color);
    color: var(--dark-color);
    border: none;
    border-radius: 20px;
    padding: 8px 15px;
    font-weight: 600;
    transition: var(--transition);
}

.btn-cart:hover {
    background-color: var(--light-color);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Modal del carrito */
.modal-content {
    border-radius: 10px;
    border: none;
    overflow: hidden;
}

.modal-header {
    background-color: var(--primary-color);
    color: var(--light-color);
    border-bottom: none;
}

.modal-title i {
    margin-right: 10px;
    color: var(--accent-color);
}

.cart-items {
    max-height: 300px;
    overflow-y: auto;
}

.empty-cart-message {
    padding: 30px;
    color: #888;
    font-style: italic;
}

.cart-total {
    font-size: 18px;
    font-weight: 600;
    margin-right: auto;
}

.cart-total span:last-child {
    color: var(--primary-color);
}

.modal-footer {
    border-top: 1px solid #eee;
}

.modal-footer .btn-primary {
    background-color: var(--primary-color);
    border: none;
}

.modal-footer .btn-primary:hover {
    background-color: var(--dark-color);
}

/* Responsive */
@media (max-width: 992px) {
    .navbar-collapse {
        background-color: var(--primary-color);
        padding: 15px;
        border-radius: 8px;
        margin-top: 10px;
    }
    
    .search-box {
        width: 100%;
        margin: 10px 0;
    }
    
    .navbar-nav .nav-link::after {
        display: none;
    }
    
    .navbar-nav .nav-link {
        padding: 12px 15px;
        border-radius: 5px;
    }
    
    .navbar-nav .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    
    .dropdown-menu {
        background-color: rgba(0, 0, 0, 0.2);
        margin-top: 0;
    }
}

@media (max-width: 576px) {
    .top-info {
        flex-direction: column;
        gap: 5px;
    }
    
    .contact-info, .social-icons {
        text-align: center;
    }
    
    .contact-info span {
        display: block;
        margin: 5px 0;
    }
    
    .cart-icon {
        margin-right: 10px;
    }
    
    .btn-cart {
        padding: 6px 12px;
        font-size: 14px;
    }
}
    </style>
    </head>
    <body>
    <div class="age-verification" id="ageVerification">
        <div class="age-verification-content">
            <h2>Verificación de Edad</h2>
            <p>Para ingresar a este sitio, debes ser mayor de 18 años.</p>
            <p>¿Eres mayor de 18 años?</p>
            <div class="mt-4">
                <button class="btn btn-primary me-2" id="ageYes">Sí, soy mayor de 18</button>
                <button class="btn btn-secondary" id="ageNo">No, soy menor de 18</button>
            </div>
        </div>
    </div>
 <header>
    <!-- Barra superior con información de contacto -->
    <div class="top-bar">
        <div class="container">
            <div class="top-info">
                <div class="contact-info">
                    <span><i class="fas fa-phone-alt"></i> +506 2222-3333</span>
                    <span><i class="fas fa-envelope"></i> info@guarotico.com</span>
                </div>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Navbar principal -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/logoGuarosJorge.png') }}" alt="Guaro Tico Logo" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">
                            <i class="fas fa-home"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#productos" id="productosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-wine-bottle"></i> Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productosDropdown">
                            <li><a class="dropdown-item" href="#guaro">Guaro Tradicional</a></li>
                            <li><a class="dropdown-item" href="#chiliguaro">Chiliguaro</a></li>
                            <li><a class="dropdown-item" href="#licores">Licores Artesanales</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#todos">Ver Todos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">
                            <i class="fas fa-users"></i> Nosotros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonios">
                            <i class="fas fa-comment-dots"></i> Testimonios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">
                            <i class="fas fa-envelope"></i> Contacto
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="search-box me-3">
                        <input type="text" class="search-input" placeholder="Buscar productos...">
                        <button class="search-btn"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="cart-icon me-3" data-bs-toggle="modal" data-bs-target="#cartModal">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count" id="cartCount">0</span>
                    </div>
                    <button class="btn btn-cart" data-bs-toggle="modal" data-bs-target="#cartModal">
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
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Guaro Tico</h5>
                    <p>El auténtico guaro costarricense desde 1985.</p>
                    <div class="mt-3">
                        <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Inicio</a></li>
                        <li><a href="#productos" class="text-white">Productos</a></li>
                        <li><a href="#nosotros" class="text-white">Nosotros</a></li>
                        <li><a href="#testimonios" class="text-white">Testimonios</a></li>
                        <li><a href="#contacto" class="text-white">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Horario</h5>
                    <p>Lunes a Viernes: 9:00 AM - 6:00 PM<br>
                    Sábados: 10:00 AM - 3:00 PM<br>
                    Domingos: Cerrado</p>
                    <p class="mt-3">
                        <small>El consumo excesivo de alcohol es perjudicial para la salud. Prohibida la venta a menores de edad.</small>
                    </p>
                </div>
            </div>
            <hr class="mt-4 bg-light">
            <div class="text-center">
                <p>&copy; 2023 Guaro Tico. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Tu Carrito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cartItems">
                        <p class="text-center" id="emptyCartMessage">Tu carrito está vacío.</p>
                        <table class="table" id="cartTable" style="display: none;">
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
                    <div class="d-flex justify-content-between mt-4" id="cartTotalContainer" style="display: none;">
                        <h5>Total:</h5>
                        <h  style="display: none;">
                        <h5>Total:</h5>
                        <h5 id="cartTotal">₡0</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Seguir Comprando</button>
                    <button type="button" class="btn btn-primary" id="checkoutBtn">Finalizar Compra</button>
                </div>
            </div>
        </div>
    </div>
        <div class="modal fade" id="checkoutSuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¡Compra Exitosa!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                        <h4 class="mt-3">¡Gracias por tu compra!</h4>
                        <p>Tu pedido ha sido procesado correctamente.</p>
                        <p>Recibirás un correo electrónico con los detalles de tu compra.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        // Age Verification
        document.addEventListener('DOMContentLoaded', function() {
            const ageVerification = document.getElementById('ageVerification');
            const ageYesBtn = document.getElementById('ageYes');
            const ageNoBtn = document.getElementById('ageNo');
            
            // Check if user has already verified age
            if (!localStorage.getItem('ageVerified')) {
                ageVerification.style.display = 'flex';
            } else {
                ageVerification.style.display = 'none';
            }
            
            ageYesBtn.addEventListener('click', function() {
                localStorage.setItem('ageVerified', 'true');
                ageVerification.style.display = 'none';
            });
            
            ageNoBtn.addEventListener('click', function() {
                window.location.href = 'https://www.google.com';
            });
            
            // Product Filtering
            const filterBtns = document.querySelectorAll('.filter-btn');
            const productItems = document.querySelectorAll('.product-item');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterBtns.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    const filter = this.getAttribute('data-filter');
                    
                    productItems.forEach(item => {
                        if (filter === 'all' || item.getAttribute('data-category') === filter) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
            
            // Shopping Cart
            let cart = [];
            const cartCount = document.getElementById('cartCount');
            const cartItemsList = document.getElementById('cartItemsList');
            const cartTotal = document.getElementById('cartTotal');
            const emptyCartMessage = document.getElementById('emptyCartMessage');
            const cartTable = document.getElementById('cartTable');
            const cartTotalContainer = document.getElementById('cartTotalContainer');
            const checkoutBtn = document.getElementById('checkoutBtn');
            const addToCartBtns = document.querySelectorAll('.add-to-cart');
            
            // Load cart from localStorage if available
            if (localStorage.getItem('cart')) {
                cart = JSON.parse(localStorage.getItem('cart'));
                updateCartUI();
            }
            
            addToCartBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const price = parseInt(this.getAttribute('data-price'));
                    
                    // Check if product is already in cart
                    const existingItem = cart.find(item => item.id === id);
                    
                    if (existingItem) {
                        existingItem.quantity += 1;
                    } else {
                        cart.push({
                            id: id,
                            name: name,
                            price: price,
                            quantity: 1
                        });
                    }
                    
                    // Save cart to localStorage
                    localStorage.setItem('cart', JSON.stringify(cart));
                    
                    // Update cart UI
                    updateCartUI();
                    
                    // Show success message
                    const toast = document.createElement('div');
                    toast.className = 'position-fixed bottom-0 end-0 p-3';
                    toast.style.zIndex = '5';
                    toast.innerHTML = `
                        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto">Carrito</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                ${name} añadido al carrito.
                            </div>
                        </div>
                    `;
                    document.body.appendChild(toast);
                    
                    setTimeout(() => {
                        toast.remove();
                    }, 3000);
                });
            });
            
            function updateCartUI() {
                // Update cart count
                const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
                cartCount.textContent = totalItems;
                
                // Clear cart items list
                cartItemsList.innerHTML = '';
                
                if (cart.length === 0) {
                    emptyCartMessage.style.display = 'block';
                    cartTable.style.display = 'none';
                    cartTotalContainer.style.display = 'none';
                } else {
                    emptyCartMessage.style.display = 'none';
                    cartTable.style.display = 'table';
                    cartTotalContainer.style.display = 'flex';
                    
                    // Add items to cart
                    let totalPrice = 0;
                    
                    cart.forEach(item => {
                        const itemTotal = item.price * item.quantity;
                        totalPrice += itemTotal;
                        
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${item.name}</td>
                            <td>₡${item.price.toLocaleString()}</td>
                            <td>
                                <div class="input-group input-group-sm" style="width: 100px;">
                                    <button class="btn btn-outline-secondary decrease-quantity" data-id="${item.id}">-</button>
                                    <input type="text" class="form-control text-center" value="${item.quantity}" readonly>
                                    <button class="btn btn-outline-secondary increase-quantity" data-id="${item.id}">+</button>
                                </div>
                            </td>
                            <td>₡${itemTotal.toLocaleString()}</td>
                            <td>
                                <button class="btn btn-sm btn-danger remove-item" data-id="${item.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        `;
                        
                        cartItemsList.appendChild(tr);
                    });
                    
                    // Update total
                    cartTotal.textContent = `₡${totalPrice.toLocaleString()}`;
                    
                    // Add event listeners to quantity buttons
                    document.querySelectorAll('.increase-quantity').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const id = this.getAttribute('data-id');
                            const item = cart.find(item => item.id === id);
                            item.quantity += 1;
                            localStorage.setItem('cart', JSON.stringify(cart));
                            updateCartUI();
                        });
                    });
                    
                    document.querySelectorAll('.decrease-quantity').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const id = this.getAttribute('data-id');
                            const item = cart.find(item => item.id === id);
                            if (item.quantity > 1) {
                                item.quantity -= 1;
                            } else {
                                cart = cart.filter(item => item.id !== id);
                            }
                            localStorage.setItem('cart', JSON.stringify(cart));
                            updateCartUI();
                        });
                    });
                    
                    document.querySelectorAll('.remove-item').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const id = this.getAttribute('data-id');
                            cart = cart.filter(item => item.id !== id);
                            localStorage.setItem('cart', JSON.stringify(cart));
                            updateCartUI();
                        });
                    });
                }
            }
            
            // Checkout
            checkoutBtn.addEventListener('click', function() {
                // In a real application, you would send the cart data to the server
                // For this example, we'll just show a success message and clear the cart
                
                // Clear cart
                cart = [];
                localStorage.removeItem('cart');
                updateCartUI();
                
                // Hide cart modal
                const cartModal = bootstrap.Modal.getInstance(document.getElementById('cartModal'));
                cartModal.hide();
                
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('checkoutSuccessModal'));
                successModal.show();
            });
            
            // Contact Form
            const contactForm = document.getElementById('contactForm');
            
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // In a real application, you would send the form data to the server
                // For this example, we'll just show a success message
                
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const message = document.getElementById('message').value;
                
                // Clear form
                contactForm.reset();
                
                // Show success message
                const toast = document.createElement('div');
                toast.className = 'position-fixed bottom-0 end-0 p-3';
                toast.style.zIndex = '5';
                toast.innerHTML = `
                    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto">Mensaje Enviado</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            ¡Gracias por contactarnos! Te responderemos pronto.
                        </div>
                    </div>
                `;
                document.body.appendChild(toast);
                
                setTimeout(() => {
                    toast.remove();
                }, 3000);
            });
        });
    </script>
</html>
