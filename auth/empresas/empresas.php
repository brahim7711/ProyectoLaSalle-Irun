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


    <main>
        <video autoplay loop muted id="video_background">
            <source src="../../resources/0_Landscape_Mountains_1280x720.mp4" type="video/mp4">
        </video>
        <section>
            <div class="registro-principal">
                <div class="header-registro">
                    <div class="logo"><img src="../../resources/Logo-Png.png"></div>
                </div>
                <form method="post">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="form-control" placeholder="ejemplo@correo.com" required>
                    <?php echo $auth_message ?? ''; ?>
                    <input type="submit" name="check_email" value="Comprobar">
                </form>
            </div>
        </section>
    </main>

    <script src="../../js-menu.js"></script>
</body>

</html>