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
                <li class="nav-item"><a href="../empresas/empresas.php" class="nav-link">Empresas</a></li>
                <li class="nav-item nav-dropdown">
                    <a href="../auth/empresas/empresas.php" class="nav-link">Más ▼</a>
                    <ul class="dropdown-menu">
                        <li><a href="../auth/empresas/empresas.php">Registro empresa</a></li>
                        <li><a href="../auth/administracion/administracion.php">Administración</a></li>
                        <li><a href="#">Nosotros</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <button class="nav-toggle" aria-label="toggle navigation">
            <span class="hamburger"></span>
        </button>
    </header>

    <main>
        <div class="contacto-container">
            <section class="salle-section">
                <h2 class="salle-title">LA SALLE SANTO ANGEL</h2>
                <div class="cards-grid cards-grid-3">
                    <div class="contact-card">
                        <div class="card-image"><img src="../resources/rafa.jpeg" alt="Rafael Navarro Andrés"></div>
                        <div class="card-content">
                            <h3>Rafael Navarro Andrés</h3>
                            <p>Administrador de BBDD y Desarrollador Front-end</p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="card-image"><img src="../resources/juanan.jpeg" alt="Juan Antonio Alfaro"></div>
                        <div class="card-content">
                            <h3>Juan Antonio Alfaro Peña</h3>
                            <p>Desarrollador Back-end</p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="card-image"><img src="../resources/liria.jpeg" alt="Ángel Liria Montañes"></div>
                        <div class="card-content">
                            <h3>Ángel Liria Montañes</h3>
                            <p>Desarrollador Front-end</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="salle-section">
                <h2 class="salle-title">LA SALLE IRUN</h2>
                <div class="cards-grid cards-grid-4">
                    <div class="contact-card">
                        <div class="card-image"><img src="" alt=""></div>
                        <div class="card-content">
                            <h3>Andoni Salguero</h3>
                            <p>Administrativo</p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="card-image"><img src="" alt=""></div>
                        <div class="card-content">
                            <h3>Alfonso Simonet</h3>
                            <p>Administrativo</p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="card-image"><img src="" alt=""></div>
                        <div class="card-content">
                            <h3>Ane Iza</h3>
                            <p>Administrativo</p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="card-image"><img src="" alt=""></div>
                        <div class="card-content">
                            <h3>Ethan Rial</h3>
                            <p>Admnistrativo</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ubicaciones-section">
                <h2 class="ubicaciones-title">Nuestras Ubicaciones</h2>
                
                <div class="ubicaciones-grid">
                    <div class="ubicacion-card">
                        <h3>LA SALLE SANTO ÁNGEL</h3>
                        <div class="ubicacion-info">
                            <p><strong>Dirección:</strong><br> C. de Tomás Anzano, 1, Casablanca, 50012 Zaragoza</p>
                            <p><strong>Teléfono:</strong><br>976 75 37 18</p>
                            <p><strong>Email:</strong><br>administracion@lasallesantoangel.es</p>
                            <p><strong>Horario:</strong><br>Lunes - Viernes: 08:00 - 14:00</p>
                        </div>
                        <div class="ubicacion-mapa">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3030.9287047883627!2d-0.8899999!3d41.6555556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5e7f5c5c5c5c5cd%3A0x1234567890!2sC.%20de%20Tom%C3%A1s%20Anzano%2C%201%2C%20Casablanca%2C%2050012%20Zaragoza!5e0!3m2!1ses!2ses!4v1234567890" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="ubicacion-card">
                        <h3>LA SALLE IRÚN</h3>
                        <div class="ubicacion-info">
                            <p><strong>Dirección:</strong><br>Elizatxo Hiribidea, 14, 20303 Irun, Gipuzkoa</p>
                            <p><strong>Teléfono:</strong><br>943 62 84 11</p>
                            <p><strong>Email:</strong><br>lsbm@lasalle. es</p>
                            <p><strong>Horario:</strong><br>Lunes - Viernes: 08:00 - 18:00</p>
                        </div>
                        <div class="ubicacion-mapa">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2900.123456789!2d-1.7944444!3d43.3477778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd517e8e8e8e8e8ef%3A0x1234567890!2sElizatxo%20Hiribidea%2C%2014%2C%2020303%20Irun%2C%20Gipuzkoa!5e0!3m2!1ses!2ses!4v1234567890" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 LSBM. Todos los derechos reservados.</p>
        <p>Creado por: Juan Antonio Alfaro Peña, Rafael Navarro Andres, Angel Liria Montañes</p>
    </footer>
    <script src="../js-menu.js"></script>
    

</body>

</html>