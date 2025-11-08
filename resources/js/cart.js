/**
 * Shopping Cart Module
 * Maneja toda la funcionalidad del carrito de compras
 */

let cart = [];
let cartCount, cartItemsList, cartTotal, emptyCartMessage, cartTable, cartTotalContainer, checkoutBtn;

export function initCart() {
    // Obtener elementos del DOM
    cartCount = document.getElementById('cartCount');
    cartItemsList = document.getElementById('cartItemsList');
    cartTotal = document.getElementById('cartTotal');
    emptyCartMessage = document.getElementById('emptyCartMessage');
    cartTable = document.getElementById('cartTable');
    cartTotalContainer = document.getElementById('cartTotalContainer');
    checkoutBtn = document.getElementById('checkoutBtn');

    if (!cartCount || !cartItemsList) return;

    // Load cart from localStorage if available
    if (localStorage.getItem('cart')) {
        cart = JSON.parse(localStorage.getItem('cart'));
        updateCartUI();
    }

    // Add event listeners to "Add to Cart" buttons
    const addToCartBtns = document.querySelectorAll('.add-to-cart');
    addToCartBtns.forEach(btn => {
        btn.addEventListener('click', handleAddToCart);
    });

    // Checkout button event
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', handleCheckout);
    }
}

function handleAddToCart(event) {
    const button = event.currentTarget;
    const id = button.getAttribute('data-id');
    const name = button.getAttribute('data-name');
    const price = parseInt(button.getAttribute('data-price'));
    const maxStock = parseInt(button.getAttribute('data-stock') || '999');

    // Check if product is already in cart
    const existingItem = cart.find(item => item.id === id);

    if (existingItem) {
        // Verificar stock antes de incrementar
        if (existingItem.quantity >= maxStock) {
            showToast('Stock Insuficiente', `Solo hay ${maxStock} unidades disponibles de ${name}`, 'warning');
            return;
        }
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: id,
            name: name,
            price: price,
            quantity: 1,
            maxStock: maxStock
        });
    }

    // Save cart to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Update cart UI
    updateCartUI();

    // Show success message
    showToast('Carrito', `${name} añadido al carrito.`, 'success');
}

function updateCartUI() {
    if (!cartCount || !cartItemsList) return;

    // Update cart count
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    cartCount.textContent = totalItems;

    // Clear cart items list
    cartItemsList.innerHTML = '';

    if (cart.length === 0) {
        if (emptyCartMessage) emptyCartMessage.style.display = 'block';
        if (cartTable) cartTable.style.display = 'none';
        if (cartTotalContainer) cartTotalContainer.style.display = 'none';
    } else {
        if (emptyCartMessage) emptyCartMessage.style.display = 'none';
        if (cartTable) cartTable.style.display = 'table';
        if (cartTotalContainer) cartTotalContainer.style.display = 'flex';

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
                    <div class="quantity-control">
                        <button class="quantity-btn decrease-quantity" data-id="${item.id}">-</button>
                        <input type="text" class="quantity-input" value="${item.quantity}" readonly>
                        <button class="quantity-btn increase-quantity" data-id="${item.id}">+</button>
                    </div>
                </td>
                <td>₡${itemTotal.toLocaleString()}</td>
                <td>
                    <button class="remove-btn remove-item" data-id="${item.id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            `;

            cartItemsList.appendChild(tr);
        });

        // Update total
        if (cartTotal) {
            cartTotal.textContent = `₡${totalPrice.toLocaleString()}`;
        }

        // Add event listeners to quantity buttons
        document.querySelectorAll('.increase-quantity').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const item = cart.find(item => item.id === id);
                if (item && item.quantity < (item.maxStock || 999)) {
                    item.quantity += 1;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartUI();
                } else {
                    showToast('Stock Insuficiente', `Solo hay ${item.maxStock} unidades disponibles`, 'warning');
                }
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

function handleCheckout() {
    let currentCart = JSON.parse(localStorage.getItem('cart')) || [];

    if (currentCart.length === 0) {
        alert('El carrito está vacío');
        return;
    }

    let message = "Hola, quiero pedir los siguientes licores:\n\n";
    let total = 0;

    currentCart.forEach(function(item, index) {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        message += `${index + 1}. ${item.name} - ₡${item.price.toLocaleString()} x ${item.quantity} = ₡${itemTotal.toLocaleString()}\n`;
    });

    message += `\nTotal: ₡${total.toLocaleString()}`;

    // Obtener el número de WhatsApp desde el meta tag
    const whatsappNumber = document.querySelector('meta[name="business-whatsapp"]')?.content || '50685443529';
    const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;

    window.open(whatsappURL, '_blank');

    // Limpiar carrito
    cart = [];
    localStorage.removeItem('cart');
    updateCartUI();

    // Cerrar modal
    const cartModalElement = document.getElementById('cartModal');
    if (cartModalElement) {
        cartModalElement.classList.remove('show');
        document.body.style.overflow = '';
    }

    setTimeout(function() {
        location.reload();
    }, 500);
}

function showToast(title, message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = 'custom-toast';
    toast.setAttribute('data-type', type);

    const bgClass = type === 'success' ? 'toast-success' : type === 'warning' ? 'toast-warning' : 'toast-info';

    toast.innerHTML = `
        <div class="toast-content ${bgClass}">
            <div class="toast-header">
                <strong>${title}</strong>
                <button type="button" class="toast-close" aria-label="Close">&times;</button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        </div>
    `;

    document.body.appendChild(toast);

    // Close button
    const closeBtn = toast.querySelector('.toast-close');
    closeBtn.addEventListener('click', () => {
        toast.remove();
    });

    // Auto remove after 3 seconds
    setTimeout(() => {
        toast.classList.add('fade-out');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}

export { updateCartUI };
