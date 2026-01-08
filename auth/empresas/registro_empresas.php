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
    <main>
        <video autoplay loop muted id="video_background">
            <source src="../../resources/0_Landscape_Mountains_1280x720.mp4" type="video/mp4">
        </video>
        <section id="section-secondary">
            <div class="registro-secondary">
                <div class="header-registro">
                    <div class="logo"><img src="../../resources/Logo-Png.png"></div>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <h1>Completa tu Registro</h1>
                    <label for="nombre_empresa">Nombre de la Empresa <span class="required">*</span></label>
                    <input type="text" id="nombre_empresa" class="form-control" name="nombre_empresa" placeholder="Nombre de tu empresa" required>
                    <label for="contrasena_empresa">Contraseña<span class="required">*</span></label>
                    <input type="password" id="contrasena_empresa" class="form-control" name="contrasena_empresa" placeholder="Contraseña de tu empresa" required>
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="4" placeholder="Describe tu empresa"></textarea>
                    <label for="logo">Logo de la Empresa</label>
                    <input type="file" id="logo" name="logo" class="form-control" accept="image/*">
                    <label for="web_url">Página Web</label>
                    <input type="url" id="web_url" name="web_url" class="form-control" placeholder="https://www.ejemplo.com">
                    <label for="spot_url">Spot Publicitario (URL)</label>
                    <input type="url" id="spot_url" name="spot_url" class="form-control" placeholder="https://www.youtube.com/watch?v=...">
                    <label for="contacto_adicional">Contacto Adicional</label>
                    <input type="text" id="contacto_adicional" class="form-control" name="contacto_adicional" placeholder="Teléfono, email, etc.">
                    <label for="horario">Horario</label>
                    <input type="text" id="horario" name="horario" class="form-control" placeholder="Ej: Lunes a Viernes 9:00-18:00">
                    <label for="meet_url">Enlace de Meet</label>
                    <input type="url" id="meet_url" name="meet_url" class="form-control" placeholder="https://meet.google.com/...">
                    <?php echo $auth_message ?? ''; ?>
                    <input type="submit" name="confirmar" value="Registrar Empresa">
                </form>
            </div>
        </section>
    </main>
    <script src="../../js-menu.js"></script>
</body>

</html>