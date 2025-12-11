<?php
include __DIR__ . '/../../php/auth/empresas.php';
?>

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
                    <a href="#" class="nav-link">Más ▼</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Registro empresa</a></li>
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
        <section>
            <div class="registro-principal">
                <div class="header-registro">
                    <h1>Registro de Empresas</h1>
                    <p>Solo se podran registrar empresas autorizadas</p>
                </div>
                <form method="post">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com"  required>
                    <?php echo $auth_message ?? ''; ?>
                    <input type="submit" name="check_email" value="Comprobar">
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