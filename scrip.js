let slideIndex = 0; //es como un contador
let slides = document.getElementsByClassName("carousel-slide");

function startCarousel() {
    if (slides.length == 0) return;
    showNextSlide();
    setInterval(showNextSlide, 7000); 
}

function showNextSlide() {
    let currentSlide = slides[slideIndex];
    
    slideIndex = (slideIndex + 1) % slides.length; // suma al contador y cuando llega al final vuelve a 0
    let nextSlide = slides[slideIndex];

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
        slides[i].classList.remove('active-slide', 'prev-slide', 'next-slide');
    }

    nextSlide.classList.add('next-slide');

    currentSlide.style.display = 'block';
    nextSlide.style.display = 'block';
    
    void nextSlide.offsetWidth; // Fuerza el reflow para reiniciar las animaciones CSS

    currentSlide.classList.add('prev-slide');

    nextSlide.classList.remove('next-slide');
    nextSlide.classList.add('active-slide');
}

startCarousel();

// Modal de inscripción
document.addEventListener('DOMContentLoaded', function() {
    const modalOverlay = document.getElementById('modal-inscribete');
    const btnInscribete = document.getElementById('inscribete');
    const btnCloseModal = document.getElementById('close-modal');
    const btnCancel = document.getElementById('cancel-btn');
    const formInscripcion = document.getElementById('form-inscripcion');

    // Inicializar EmailJS
    if (typeof emailjs !== 'undefined') {
        emailjs.init("6jOG8sRboH9wS04R9");
    }

    // Función para cerrar el modal
    function cerrarModal() {
        if (modalOverlay) {
            modalOverlay.classList.remove('active');
            if (formInscripcion) {
                formInscripcion.reset();
            }
        }
    }

    // Abrir modal al hacer clic en "Inscribete a la Feria"
    if (btnInscribete) {
        btnInscribete.addEventListener('click', function(e) {
            e.preventDefault();
            if (modalOverlay) {
                modalOverlay.classList.add('active');
            }
        });
    }

    // Cerrar modal con el botón X
    if (btnCloseModal) {
        btnCloseModal.addEventListener('click', cerrarModal);
    }

    // Cerrar modal con el botón Cancelar
    if (btnCancel) {
        btnCancel.addEventListener('click', cerrarModal);
    }

    // Si hay un mensaje de éxito, cerrar el modal después de 3 segundos
    const successMessage = document.querySelector('.success-message');
    if (successMessage && modalOverlay.classList.contains('active')) {
        setTimeout(() => {
            cerrarModal();
            // Limpiar el formulario después de cerrar el modal
            if (formInscripcion) {
                formInscripcion.reset();
            }
        }, 3000);
    }

    // Enviar email con EmailJS 
    if (typeof window.emailConfig !== 'undefined' && window.emailConfig.enviarEmail) {
        if (typeof emailjs !== 'undefined') {
            emailjs.send("service_h1pinuq", "template_dy2usca", {
                name: window.emailConfig.datosEmail.nombre,
                email: window.emailConfig.datosEmail.email,
                reply_to: window.emailConfig.datosEmail.email,
                codigo: Math.floor(Math.random() * 999999)
            })
            
        } 
    }

});


