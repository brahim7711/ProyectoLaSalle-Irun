// JavaScript para el mapa de la feria de empleo

// Función para redirigir a la página de empresa específica
function irAEmpresa(standId) {
    // Añadir efecto visual antes de la redirección
    const stand = document.querySelector(`[data-stand="${standId}"]`);
    if (stand) {
        setTimeout(() => {
            window.location.href = `../empresas/ver-empresa.php?stand=${standId}`;
        }, 200);
    }
}

// Función para añadir efectos hover adicionales    
function inicializarEfectos() {
    const standsOcupados = document.querySelectorAll('.stand.ocupado');
    
    standsOcupados.forEach(stand => {
        stand.addEventListener('mouseenter', function() {
            const standId = this.getAttribute('data-stand');
            this.setAttribute('title', `Stand ${standId} - Clic para ver empresa`);
        });
    });
}

//DOM Es un evento que espera a que todo el contenido HTML del documento se haya cargado completamente antes de ejecutar el código JavaScript.
document.addEventListener('DOMContentLoaded', function() {
    inicializarEfectos();
});

// Función auxiliar para actualizar el estado de un stand para actualizaciorlos el mapa
function actualizarStand(standId, ocupado = true) {
    const stand = document.querySelector(`[data-stand="${standId}"]`);
    if (stand) {
        if (ocupado) {
            stand.classList.remove('vacio');
            stand.classList.add('ocupado');
            stand.setAttribute('onclick', `irAEmpresa('${standId}')`);
            stand.style.cursor = 'pointer';
        } else {
            stand.classList.remove('ocupado');
            stand.classList.add('vacio');
            stand.removeAttribute('onclick');
            stand.style.cursor = 'default';
        }
    }
}

// Exportar funciones para uso global
window.irAEmpresa = irAEmpresa;
window.actualizarStand = actualizarStand;