/**
 * Age Verification Module
 * Maneja la verificación de edad al ingresar al sitio
 */

export function initAgeVerification() {
    const ageVerification = document.getElementById('ageVerification');
    const ageYesBtn = document.getElementById('ageYes');
    const ageNoBtn = document.getElementById('ageNo');

    if (!ageVerification || !ageYesBtn || !ageNoBtn) return;

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
}
