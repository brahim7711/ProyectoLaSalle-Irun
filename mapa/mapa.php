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
                <li class="nav-item"><a href="#" class="nav-link">Mapa</a></li>
                <li class="nav-item"><a href="../empresas/empresas.php" class="nav-link">Empresas</a></li>
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
        <section class="mapa-container">
        <div class="mapa-titulo">
            <h1>MAPA DE LA FERIA DE EMPLEO</h1>
            <p>Haz clic en los stands ocupados para ver información de las empresas</p>
        </div>

        <?php
        include_once __DIR__ . '/../php/stand/stand.php';
        ?>

        <div class="leyenda">
            <div class="leyenda-item">
                <div class="color-box ocupado"></div>
                <span>Stand ocupado (clic para ver empresa)</span>
            </div>
            <div class="leyenda-item">
                <div class="color-box vacio"></div>
                <span>Stand disponible</span>
            </div>
            <div class="leyenda-item">
                <div class="color-box pasillo"></div>
                <span>Pasillos</span>
            </div>
        </div>
    </section>
    </main>

    <footer>
        <p>&copy; 2025 LSBM. Todos los derechos reservados.</p>
        <p>Creado por: Juan Antonio Alfaro Peña, Rafael Navarro Andres, Angel Liria Montañes</p>
    </footer>
    <script src="../js-menu.js"></script>
    <script src="script.js"></script>

</body>

</html>