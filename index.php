<?php include __DIR__ . '/php/inscribete/inscribete.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="resources/Logo-Icono.png">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>LSBM</title>
</head>

<body>
    <header class="header">
        <a href="index.php" class="logo" aria-label="Inicio">
            <img src="resources/Logo-Png.png" alt="Logo" class="logo-img">
        </a>
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="index.php" class="nav-link">Principal</a></li>
                <li class="nav-item"><a href="./mapa/mapa.php" class="nav-link">Mapa</a></li>
                <li class="nav-item"><a href="./empresas/empresas.php" class="nav-link">Empresas</a></li>
                <li class="nav-item nav-dropdown">
                    <a href="./auth/empresas/empresas.php" class="nav-link">Más ▼</a>
                    <ul class="dropdown-menu">
                        <li><a href="./auth/empresas/empresas.php">Registro empresa</a></li>
                        <li><a href="./auth/administracion/administracion.php">Administración</a></li>
                        <li><a href="./contacto/contacto.php">Nosotros</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <button class="nav-toggle" aria-label="toggle navigation">
            <span class="hamburger"></span>
        </button>
    </header>
    <main>
        <section>
            <div class="carousel-container">
                <div class="carousel-slide fade">
                    <img src="./resources/Feria-1.jpg" alt="Imagen Feria 1">
                    <div class="carousel-text">Feria de Empleo 2024</div>
                </div>
                <div class="carousel-slide fade">
                    <img src="./resources/Feria-2.jpg" alt="Imagen 2">
                    <div class="carousel-text">Feria de Empleo 2024</div>
                </div>
                <div class="carousel-slide fade">
                    <img src="./resources/Feria-3.jpg" alt="Imagen 3">
                    <div class="carousel-text">Feria de Empleo 2024</div>
                </div>
                <div class="carousel-slide fade">
                    <img src="./resources/Feria-4.jpg" alt="Imagen 1">
                    <div class="carousel-text">Feria de Empleo 2025</div>
                </div>
                <div class="carousel-slide fade">
                    <img src="./resources/Feria-5.jpg" alt="Imagen 2">
                    <div class="carousel-text">Feria de Empleo 2025</div>
                </div>
                <div class="carousel-slide fade">
                    <img src="./resources/Feria-6.jpg" alt="Imagen 3">
                    <div class="carousel-text">Feria de Empleo 2025</div>
                </div>
            </div>
        </section>
        <section class="video-info">
            <p>INFORMACION DE LA FERIA</p>
            <video src="./resources/Video-Imfomacion.mp4" autoplay controls muted loop></video>
            <input type="submit" id="inscribete" class="btn-inscribete" value="Inscribete a la Feria">
            
            <div class="botones-pdf-container">
                <a href="./resources/documento1.pdf" download class="btn-pdf">Descargar 1 <img src="./resources/descargar.png" alt="Imagen Descargar"></a>
                <a href="./resources/documento2.pdf" download class="btn-pdf">Descargar 2 <img src="./resources/descargar.png" alt="Imagen Descargar"></a>
                <a href="./resources/documento3.pdf" download class="btn-pdf">Descargar 3 <img src="./resources/descargar.png" alt="Imagen Descargar"></a>
            </div>
            
        </section>
        <section class="video-Spot">
            <h3>VIDEO GANADOR DEL SPOT PUBLICITARIO</h3>
            <div>
                <video src="./resources/video-spot.mp4" autoplay controls muted loop></video>
                <p>
                    <strong class="video-spot-texto">¡EVENTUR es el merecido ganador!</strong>
                    <br>
                    Nos complace anunciar que su excepcional spot ha sido seleccionado como el más destacado de La Salle
                    Business Match.
                    <br>
                    Agradecemos profundamente la calidad y la creatividad de las piezas presentadas por todos los
                    concursantes.
                </p>
            </div>
        </section>


        <div id="modal-inscribete" class="modal-overlay <?php echo (!empty($mensaje)) ? 'active' : ''; ?>">
            <div class="modal-content">
                <button class="modal-close" id="close-modal">&times;</button>
                <div class="modal-header">
                    <h2>Inscríbete a la Feria</h2>
                    <p>Completa el formulario para inscribirte</p>
                </div>
                
                <?php if (!empty($mensaje)): ?>
                    <div class="message-container show">
                        <p class="<?php echo $tipo_mensaje; ?>-message"><?php echo htmlspecialchars($mensaje); ?></p>
                    </div>
                <?php endif; ?>
                
                <form class="form-inscripcion" id="form-inscripcion" method="POST" >
                    <div class="form-group">
                        <label for="nombre">Nombre <span class="required">*</span></label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre"  required>
                    </div>

                    <div class="form-group">
                        <label for="apellidos">Apellidos <span class="required">*</span></label>
                        <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos"  required>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo Electrónico <span class="required">*</span></label>
                        <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com"  required>
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI/NIE <span class="required">*</span></label>
                        <input type="text" id="dni" name="dni" placeholder="12345678A" pattern="[0-9]{8}[A-Za-z]{1}" 
                            required>
                        <small class="input-help">Formato: 8 números seguidos de una letra</small>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-submit" name="aceptar" value="1">Enviar Inscripción</button>
                        <button type="button" class="btn-cancel" id="cancel-btn">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        <section class="patrocinadores-section">
            <h2>Nuestros Patrocinadores</h2>
            <div class="patrocinadores-carousel">
                <div class="patrocinadores-track" id="patrocinadores-track">
                    <div class="patrocinador-item">
                        <img src="./resources/Logo-Png.png" alt="Patrocinador 1">
                    </div>
                    <div class="patrocinador-item">
                        <img src="./resources/Logo-Png.png" alt="Patrocinador 2">
                    </div>
                    <div class="patrocinador-item">
                        <img src="./resources/Logo-Png.png" alt="Patrocinador 3">
                    </div>
                    <div class="patrocinador-item">
                        <img src="./resources/Logo-Png.png" alt="Patrocinador 4">
                    </div>
                    <!-- LO DUPLUCAMOS PARA QUE SEA INFINITO ES DECIR Q REPETIMOS LOS QUE HAY ARRIBA -->
                    <div class="patrocinador-item">
                        <img src="./resources/Logo-Png.png" alt="Patrocinador 1">
                    </div>
                    <div class="patrocinador-item">
                        <img src="./resources/Logo-Png.png" alt="Patrocinador 2">
                    </div>
                    <div class="patrocinador-item">
                        <img src="./resources/Logo-Png.png" alt="Patrocinador 3">
                    </div>
                    <div class="patrocinador-item">
                        <img src="./resources/Logo-Png.png" alt="Patrocinador 4">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 LSBM. Todos los derechos reservados.</p>
        <p>Página web diseñada y distribuida por participantes del desafio La Salle Santo Angel: <br> Juan Antonio Alfaro Peña, Rafael Navarro Andres, Angel Liria Montañes</p>
    </footer>
    

    <!-- API EmailJS SDK -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <!-- Pasar datos PHP a JavaScript PARA EL CORREO -->
    <script>
        window.emailConfig = {
            enviarEmail: <?php echo $enviar_email ? 'true' : 'false'; ?>,
            datosEmail: {
                nombre: "<?php echo isset($datos_email['nombre']) ? htmlspecialchars($datos_email['nombre']) : ''; ?>",
                email: "<?php echo isset($datos_email['email']) ? htmlspecialchars($datos_email['email']) : ''; ?>"
            }
        };
    </script>
    
    <script src="js-menu.js"></script>
    <script src="scrip.js"></script>
</body>

</html>