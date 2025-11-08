/**
 * Modals JavaScript
 * Maneja la funcionalidad de modales sin Bootstrap
 */

export class Modal {
    constructor(modalId) {
        this.modal = document.getElementById(modalId);
        this.isOpen = false;

        if (this.modal) {
            this.init();
        }
    }

    init() {
        // Close buttons
        const closeButtons = this.modal.querySelectorAll('.modal-close, .modal-overlay');
        closeButtons.forEach(button => {
            button.addEventListener('click', () => this.hide());
        });

        // ESC key to close
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isOpen) {
                this.hide();
            }
        });

        // Prevent modal body scroll propagation
        const modalDialog = this.modal.querySelector('.modal-dialog');
        if (modalDialog) {
            modalDialog.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }
    }

    show() {
        this.modal.classList.add('show');
        this.isOpen = true;
        document.body.style.overflow = 'hidden';
    }

    hide() {
        this.modal.classList.remove('show');
        this.isOpen = false;
        document.body.style.overflow = '';
    }

    toggle() {
        if (this.isOpen) {
            this.hide();
        } else {
            this.show();
        }
    }
}

export function initModals() {
    // Cart Modal
    const cartModal = new Modal('cartModal');
    const cartIconBtn = document.getElementById('cartIconBtn');
    const viewCartBtn = document.getElementById('viewCartBtn');
    const continueShoppingBtn = document.getElementById('continueShoppingBtn');

    if (cartIconBtn) {
        cartIconBtn.addEventListener('click', () => cartModal.show());
    }

    if (viewCartBtn) {
        viewCartBtn.addEventListener('click', () => cartModal.show());
    }

    if (continueShoppingBtn) {
        continueShoppingBtn.addEventListener('click', () => cartModal.hide());
    }

    // Checkout Success Modal
    const checkoutSuccessModal = new Modal('checkoutSuccessModal');
    const closeSuccessModal = document.getElementById('closeSuccessModal');
    const acceptSuccessBtn = document.getElementById('acceptSuccessBtn');

    if (closeSuccessModal) {
        closeSuccessModal.addEventListener('click', () => checkoutSuccessModal.hide());
    }

    if (acceptSuccessBtn) {
        acceptSuccessBtn.addEventListener('click', () => checkoutSuccessModal.hide());
    }

    // Return modal instances for use in other modules
    return {
        cartModal,
        checkoutSuccessModal
    };
}

// Export modals for use in other modules
export let modals = null;
