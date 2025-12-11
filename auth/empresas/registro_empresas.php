<?php include __DIR__ . '/../../php/auth/empresas-registro.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../resources/Logo-Icono.png">
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <title>LSBM</title>
</head>
<body>
    <header class="header">
        <a href="../../index.php" class="logo" aria-label="Inicio">
            <img src="../../resources/Logo-Png.png" alt="Logo" class="logo-img">
        </a>
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="../../index.php" class="nav-link">Principal</a></li>
                <li class="nav-item"><a href="../../mapa/mapa.php" class="nav-link">Mapa</a></li>
                <li class="nav-item"><a href="../../empresas/empresas.php" class="nav-link">Empresas</a></li>
                <li class="nav-item nav-dropdown">
                    <a href="./empresas.php" class="nav-link">Más ▼</a>
                    <ul class="dropdown-menu">
                        <li><a href="./empresas.php">Registro empresa</a></li>
                        <li><a href="../administracion/administracion.php">Administración</a></li>
                        <li><a href="../../contacto/contacto.php">Nosotros</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <button class="nav-toggle" aria-label="toggle navigation">
            <span class="hamburger"></span>
        </button>
    </header>
    <main>
        <section id="section-secondary">
            <div class="registro-secondary">
                <div class="header-registro">
                    <h1>Completa tu Registro</h1>
                    <p>Información de tu empresa</p>
                </div>
                <form method="post" enctype="multipart/form-data">
                   
                    <label for="nombre_empresa">Nombre de la Empresa <span class="required">*</span></label>
                    <input type="text" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre de tu empresa" required>
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="4" placeholder="Describe tu empresa"></textarea>
                    <label for="logo">Logo de la Empresa</label>
                    <input type="file" id="logo" name="logo" accept="image/*">
                    <label for="web_url">Página Web</label>
                    <input type="url" id="web_url" name="web_url" placeholder="https://www.ejemplo.com">
                    <label for="spot_url">Spot Publicitario (URL)</label>
                    <input type="url" id="spot_url" name="spot_url" placeholder="https://www.youtube.com/watch?v=...">
                    <label for="contacto_adicional">Contacto Adicional</label>
                    <input type="text" id="contacto_adicional" name="contacto_adicional" placeholder="Teléfono, email, etc.">
                    <label for="horario">Horario</label>
                    <input type="text" id="horario" name="horario" placeholder="Ej: Lunes a Viernes 9:00-18:00">
                    <label for="meet_url">Enlace de Meet</label>
                    <input type="url" id="meet_url" name="meet_url" placeholder="https://meet.google.com/...">
                    <?php echo $auth_message ?? ''; ?>
                    <input type="submit" name="confirmar" value="Registrar Empresa">
                </form>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 LSBM. Todos los derechos reservados.</p>
        <p>Creado por: Juan Antonio Alfaro Peña, Rafael Navarro Andres, Angel Liria Montañes</p>
    </footer>
    <script src="../../js-menu.js"></script>
</body>

</html>