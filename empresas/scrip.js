document.addEventListener('DOMContentLoaded', function () {
    const btnVotar = document.getElementById('btn-votar');
    const modalVotacion = document.getElementById('modal-votacion');
    const closeVotacion = document.getElementById('close-votacion');
    const cancelVotacion = document.getElementById('cancel-votacion');
    const formVotacion = document.getElementById('form-votacion');
    const mensajeVotacion = document.getElementById('mensaje-votacion');

    function abrirModal() {
        modalVotacion.classList.add('active');
    }

    function cerrarModal() {
        modalVotacion.classList.remove('active');
        formVotacion.reset();
        mensajeVotacion.className = 'mensaje-votacion';
        mensajeVotacion.textContent = '';
    }

    btnVotar.addEventListener('click', abrirModal);
    closeVotacion.addEventListener('click', cerrarModal);
    cancelVotacion.addEventListener('click', cerrarModal);

    modalVotacion.addEventListener('click', function (e) {
        if (e.target === modalVotacion) {
            cerrarModal();
        }
    });


    if (mensajeVotacion && mensajeVotacion.textContent.trim() !== '' && mensajeVotacion.classList.contains('error')) {
        abrirModal();
    }
});