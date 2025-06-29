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
        <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
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
                    <span><i class="fas fa-phone-alt"></i> +506 8544 3529</span>
                    <span><i class="fas fa-envelope"></i> Superachievercr@gmail.com</span>
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
                            @isset($categories)
                                @foreach($categories as $category)
                                    <li><a class="dropdown-item" href="#{{ $category->slug }}">{{ $category->name }}</a></li>
                                @endforeach
        
                                @if(count($categories) > 0)
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                            @endisset
                            <li><a class="dropdown-item" href="/">Ver Todos</a></li>
                        </ul>
                    </li>                    
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
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
    <footer class="footer py-3 text-white" style="background-color: #8b0000;">
        <div class="container text-center">
            <small>&copy; 2023 Guaro Tico. Todos los derechos reservados.</small>
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
            
checkoutBtn.addEventListener('click', function() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    if (cart.length === 0) {
        alert('El carrito está vacío');
        return;
    }
    let message = "Hola, quiero pedir los siguientes licores:\n\n";

    cart.forEach(function(item, index) {
        message += `${index + 1}. ${item.name} - ₡${item.price} x ${item.quantity}\n`;
    });
    let phone = '50685443529';
    let whatsappURL = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
    window.open(whatsappURL, '_blank');
    cart = [];
    localStorage.removeItem('cart');
    updateCartUI();
    const cartModal = bootstrap.Modal.getInstance(document.getElementById('cartModal'));
    cartModal.hide();
    setTimeout(function() {
        location.reload();
    }, 500); // 
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Elementos del DOM
    const searchInput = document.querySelector('.search-input');
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productItems = document.querySelectorAll('.product-item');
    
    // Normalizar texto para búsqueda (ignorar tildes y mayúsculas)
    function normalizeText(text) {
        return text.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
    }
    
    // Función para filtrar productos
    function filterProducts() {
        const searchTerm = normalizeText(searchInput.value);
        const activeFilter = document.querySelector('.filter-btn.active')?.dataset.filter || 'all';
        
        productItems.forEach(item => {
            const productName = normalizeText(item.querySelector('.card-title').textContent);
            const productDesc = normalizeText(item.querySelector('.card-text').textContent);
            const productCategory = item.dataset.category;
            
            // Verificar coincidencia
            const matchesSearch = searchTerm === '' || 
                               productName.includes(searchTerm) || 
                               productDesc.includes(searchTerm);
            
            const matchesCategory = activeFilter === 'all' || 
                                  productCategory === activeFilter;
            
            // Mostrar u ocultar
            item.style.display = (matchesSearch && matchesCategory) ? 'block' : 'none';
        });
    }
    
    // Evento para botones de categoría
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            filterProducts();
            
            // Actualizar URL (opcional)
            const url = new URL(window.location);
            url.searchParams.set('category', this.dataset.filter);
            history.pushState({}, '', url);
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
});
    </script>
</html>
