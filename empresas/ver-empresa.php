<?php
// Iniciar sesión para los mensajes de votación
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../resources/Logo-Icono.png">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>LSBM</title>
</head>

<body>
    <header class="header">
        <a href="../index.php" class="logo" aria-label="Inicio">
            <img src="../resources/Logo-Png.png" alt="Logo" class="logo-img">
        </a>
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="../index.php" class="nav-link">Principal</a></li>
                <li class="nav-item"><a href="../mapa/mapa.php" class="nav-link">Mapa</a></li>
                <li class="nav-item"><a href="empresas.php" class="nav-link">Empresas</a></li>
                <li class="nav-item nav-dropdown">
                    <a href="../auth/empresas/empresas.php" class="nav-link">Más ▼</a>
                    <ul class="dropdown-menu">
                        <li><a href="../auth/empresas/empresas.php">Registro empresa</a></li>
                        <li><a href="../auth/administracion/administracion.php">Administración</a></li>
                        <li><a href="../contacto/contacto.php">Nosotros</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <button class="nav-toggle" aria-label="toggle navigation">
            <span class="hamburger"></span>
        </button>
    </header>

    <main>
       <?php include "../php/empresas/ver-empresa.php"?>
       
       <form method="POST" action="../php/empresas/megusta.php" style="display: inline;">
           <input type="hidden" name="empresa_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : (isset($_GET['stand']) ? $empresa['id'] : ''); ?>">
           <button type="submit" class="btn-megusta-flotante" aria-label="Me gusta esta empresa">
               <span>Me Gusta</span>
           </button>
       </form>
       
       <button id="btn-votar" class="btn-votar-flotante" aria-label="Votar por esta empresa">
           <span>Votar</span>
       </button>
       
       <div id="modal-megusta" class="modal-votacion <?php echo isset($_SESSION['mensaje_megusta']) ? 'active' : ''; ?>">
           <div class="modal-votacion-content">
               <button class="modal-votacion-close" id="close-megusta">&times;</button>
               <div class="modal-votacion-header">
                   <h2><?php echo isset($_SESSION['tipo_mensaje_megusta']) && $_SESSION['tipo_mensaje_megusta'] === 'success' ? '¡Gracias!' : 'Atención'; ?></h2>
               </div>
               <div class="mensaje-votacion <?php echo isset($_SESSION['tipo_mensaje_megusta']) ? $_SESSION['tipo_mensaje_megusta'] : ''; ?>" style="display: block; margin-bottom: 15px;">
                   <?php 
                       if (isset($_SESSION['mensaje_megusta'])) {
                           echo $_SESSION['mensaje_megusta'];
                           unset($_SESSION['mensaje_megusta']);
                           unset($_SESSION['tipo_mensaje_megusta']);
                       }
                   ?>
               </div>
               <div class="form-actions" style="justify-content: center; margin-top: 10px;">
                   <button type="button" class="btn-votar-submit" id="btn-cerrar-megusta" style="flex: 0 0 auto; max-width: 200px;">Aceptar</button>
               </div>
           </div>
       </div>
       
       <div id="modal-votacion" class="modal-votacion">
           <div class="modal-votacion-content">
               <button class="modal-votacion-close" id="close-votacion">&times;</button>
               <div class="modal-votacion-header">
                   <h2>Vota por esta empresa</h2>
               </div>
               
               <div id="mensaje-votacion" class="mensaje-votacion <?php 
                    if (isset($_SESSION['tipo_mensaje_votacion'])) {
                        echo $_SESSION['tipo_mensaje_votacion'] . '" style="display: block;">' . $_SESSION['mensaje_votacion'];
                        unset($_SESSION['mensaje_votacion']);
                        unset($_SESSION['tipo_mensaje_votacion']);
                    } else {
                        echo '">';
                    }
                ?></div>
               
               <form id="form-votacion" class="form-votacion" method="POST" action="../php/empresas/votaciones.php">
                   <input type="hidden" id="empresa-id" name="empresa_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : (isset($_GET['stand']) ? $empresa['id'] : ''); ?>">
                   <div class="form-group">
                       <label for="dni-voto">Correo electrónico <span class="required">*</span></label>
                       <input type="email" id="correo-voto" name="correo" placeholder="ejemplo@correo.com" required>
                       <small class="input-help">Usa el correo con el que te inscribiste</small>
                   </div>
                   <div class="form-actions">
                       <button type="submit" class="btn-votar-submit">Enviar Voto</button>
                       <button type="button" class="btn-votar-cancel" id="cancel-votacion">Cancelar</button>
                   </div>
               </form>
           </div>
       </div>
    </main>

    <footer>
        <p>&copy; 2025 LSBM. Todos los derechos reservados.</p>
        <p>Creado por: Juan Antonio Alfaro Peña, Rafael Navarro Andres, Angel Liria Montañes</p>
    </footer>
    <script src="../js-menu.js"></script>
    <script src="./scrip.js"></script>
    <script>
        // Manejo del modal de Me Gusta
        const modalMegusta = document.getElementById('modal-megusta');
        const closeMegusta = document.getElementById('close-megusta');
        const btnCerrarMegusta = document.getElementById('btn-cerrar-megusta');
        
        if (closeMegusta) {
            closeMegusta.addEventListener('click', function() {
                modalMegusta.classList.remove('active');
            });
        }
        
        if (btnCerrarMegusta) {
            btnCerrarMegusta.addEventListener('click', function() {
                modalMegusta.classList.remove('active');
            });
        }
        
        if (modalMegusta) {
            modalMegusta.addEventListener('click', function(e) {
                if (e.target === modalMegusta) {
                    modalMegusta.classList.remove('active');
                }
            });
        }
    </script>

</body>

</html>