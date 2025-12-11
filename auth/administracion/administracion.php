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
                    <a href="../empresas/empresas.php" class="nav-link">Más ▼</a>
                    <ul class="dropdown-menu">
                        <li><a href="../empresas/empresas.php">Registro empresa</a></li>
                        <li><a href="#">Administración</a></li>
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
        <section class="inicio-sesion">
            <div class="registro-card">
                <div class="header-registro">
                    <h1>Iniciar sesión</h1>
                    <p>Este Inicio de Sesión es para acceder a la plataforma de administración.</p>
                </div>
                <form method="post">
                    <div class="login-form">
                        <label for="username">Correo:</label>
                        <input type="text" id="username" name="username" required>
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" required>
                        <?php
                            include("../../php/auth/admin.php");
                        ?>
                        <input class="button" type="submit" name="aceptar" value="Iniciar sesión">
                    </div>
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