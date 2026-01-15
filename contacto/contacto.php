<?php
session_start();
if (isset($_SESSION['idUsuario'])) {

    $idUsuario = $_SESSION['idUsuario'];
    $nombre = $_SESSION['nombre'];
    $tipo = $_SESSION['tipo'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>PROYECTO</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" lang="es">
    </meta>
    <link rel="icon" href="../resources/logoico3.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!--bootstrap 5 CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"><!--bootstrap 5 icons-->
    <link type="text/css" rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../global.css">
</head>

<body class="pt-3">
    <nav class="container navegador">
        <div class="container nav-content">
            <a href="../index.php"><img class="logo" src="../IMAGENES/LOGOlsbm2.png" alt=""></a>
            <button class="btn-nav"><span class="bi bi-list"></span></button>
            <ul class="nav-list">
                <li><button><a href="../index.php#PROGRAMA">PROGRAMA</a></button></li>
                <li><button><a href="../mapa/mapa.php ">STANDS</a></button></li>
                <li><button><a href="../empresas/empresas.php">RANKING</a></button></li>
                <li><button><a href="../index.php#Patrocinadores">CENTROS</a></button></li>
                <li><button><a href="contacto.php">NOSOTROS</a></button></li>
                <li><button>
                        <?php
                        if (!isset($nombre)) {
                            echo '<a href="../inicioSesion/inicioGeneral.html" id="iniciar">INICIAR SESIÓN</a>';
                        } elseif ($tipo == 'empresa') {
                            echo '<a href="../perfilEmpresa/paginaPrivada.php">' . $nombre . '</a>';
                        } elseif ($tipo == 'administrador') {
                            echo '<a href="../administrador/panel_admin.php">ADMIN</a>';
                        }
                        ?>
                    </button></li>
            </ul>
        </div>
    </nav>
    <main class="pb-3">
        <div class="text">
            <h2>¿Quiénes somos?</h2>
            <p>
                Somos un grupo de alumnos del ciclo de <strong>Desarrollo de Aplicaciones Multiplataforma (DAM)</strong>
                en <strong>La Salle Santo Ángel</strong>, encargados de diseñar y desarrollar la web de la feria virtual.
                Trabajamos en colaboración con estudiantes de <strong>Asitencia a la Dirección de Irun</strong>,
                quienes actúan como clientes, definiendo las necesidades y requisitos del proyecto. De esta manera,
                combinamos programación, diseño y gestión de datos para ofrecer una experiencia digital interactiva,
                moderna y accesible.
            </p>
            <h2>La Salle Santo Ángel</h2>
        </div>
        <br>
        <h5>DISEÑADORES FRONTEND</h5>
        <div class="equipo mt-2 row mx-3">
            <div class="miembro col-sm-8 col-md-12 col-lg-4 carta mt-2 p-0">
                <div class="container-fluid caja-img">
                    <img class="card-img-top" src="../resources/sinfoto.webp" alt="Card image cap">
                </div>
                <div class="text-miembros">
                    <h4 class="card-title mb-2">Gabriel Delgado</h4>
                    <h6>Diseñador Frontend</h6>
                    <p class="card-text">
                        Responsable del diseño visual y la experiencia del usuario.
                        Se ocupa de que la interfaz sea intuitiva, atractiva y responsive en todos los dispositivos.
                    </p>
                </div>
            </div>
            <div class="miembro col-sm-8 col-md-12 col-lg-4 carta mt-2 p-0">
                <div class="container-fluid caja-img">
                    <img class="card-img-top" src="../IMAGENES/RAFAAAA.png" alt="Card image cap">
                </div>
                <div class="text-miembros">
                    <h4 class="card-title mb-2">Rafael Navarro</h4>
                    <h6>Desarrollador Fronted</h6>
                    <p class="card-text">
                        Encargado de la lógica del servidor, gestión de usuarios y conexión con la base de datos.
                        Implementa las funcionalidades principales de la feria virtual y la seguridad del sistema.
                    </p>
                </div>
            </div>
            <div class="miembro col-sm-8 col-md-12 col-lg-4 carta mt-2 p-0">
                <div class="container-fluid caja-img">
                    <img class="card-img-top" src="../resources/liria.jpeg" alt="Card image cap">
                </div>
                <div class="text-miembros">
                    <h4 class="card-title mb-2">Ángel Liria</h4>
                    <h6>Desarrollador Fronted</h6>
                    <p class="card-text">
                        Encargado de la lógica del servidor, gestión de usuarios y conexión con la base de datos.
                        Implementa las funcionalidades principales de la feria virtual y la seguridad del sistema.
                    </p>
                </div>
            </div>
        </div>
        <br>
        <h5>DESARROLLADORES BACKEND</h5>
        <div class="equipo mt-2 row mx-3">
            <div class="miembro col-sm-8 col-md-12 col-lg-3 carta mt-2 p-0">
                <div class="container-fluid caja-img">
                    <img class="card-img-top" src="../IMAGENES/Brahim.png" alt="Card image cap">
                </div>
                <div class="text-miembros">
                    <h4 class="card-title mb-2">Brahim Litim</h4>
                    <h6>Diseñador Backend</h6>
                    <p class="card-text">
                        Responsable del diseño visual y la experiencia del usuario.
                        Se ocupa de que la interfaz sea intuitiva, atractiva y responsive en todos los dispositivos.
                    </p>
                </div>
            </div>
            <div class="miembro col-sm-8 col-md-12 col-lg-3 carta mt-2 p-0">
                <div class="container-fluid caja-img">
                    <img class="card-img-top" src="../resources/juanan.jpeg" alt="Card image cap">
                </div>
                <div class="text-miembros">
                    <h4 class="card-title mb-2">Juan Antonio Alfaro </h4>
                    <h6>Desarrollador Backend</h6>
                    <p class="card-text">
                        Encargado de la lógica del servidor, gestión de usuarios y conexión con la base de datos.
                        Implementa las funcionalidades principales de la feria virtual y la seguridad del sistema.
                    </p>
                </div>
            </div>
            <div class="miembro col-sm-8 col-md-12 col-lg-3 carta mt-2 p-0">
                <div class="container-fluid caja-img">
                    <img class="card-img-top" src="../resources/sinfoto.webp" alt="Card image cap">
                </div>
                <div class="text-miembros">
                    <h4 class="card-title mb-2">Marcos Alcega</h4>
                    <h6>Diseñador Backend</h6>
                    <p class="card-text">
                        Responsable del diseño visual y la experiencia del usuario.
                        Se ocupa de que la interfaz sea intuitiva, atractiva y responsive en todos los dispositivos.
                    </p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br><br>
        <h2>La Salle Irun</h2>
        <br><br>
        <div class="irun-org row m-0 container p-0">
            <div class="fotoirun col-sm-12 col-md-12 col-lg-6 p-0"></div>
            <div class="col-sm-12 col-md-12 col-lg-5 text-irun pt-3">
                <p>
                    La participación conjunta de ambos centros refuerza los valores de colaboración,
                    convivencia y <strong>espíritu La Salle</strong> , convirtiendo la feria en una experiencia enriquecedora
                    para todos los asistentes. Este evento permite visibilizar el esfuerzo realizado
                    en el aula y fomenta el intercambio de experiencias y el aprendizaje mutuo, dejando
                    una huella positiva en el alumnado y en toda la comunidad educativa.
                </p>
            </div>
        </div>

    </main>
    <section class="ubicaciones-section p-5">
        <h2 class="ubicaciones-title">Nuestras Ubicaciones</h2>
        <div class="ubicaciones-grid container-fluid">
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
                <h3>LA SALLE IRUN</h3>
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
    <footer class="container-fluid">
        <div class="row">
            <div class="footer-caja1 container-fluid col-sm-12 col-md-12 col-lg-4 pt-3">
                <h4>LA SALLE BUSINESS MATCH</h4>
                <p>Feria Virtual de Empresas Simuladas</p>
            </div>
            <div class="footer-caja container-fluid col-sm-12 col-md-4 col-lg-4 pt-3">
                <h5>ENLACES</h5>
                <h6><a href="../index.php">INICIO</a></h6>
                <h6><a href="../index.php#Patrocinadores">CENTROS</a></h6>
                <h6><a href="../mapa/mapa.php">STANDS</a></h6>
                <h6><a href="contacto.php">NOSOTROS</a></h6>
                <h6><a href="https://www.freepik.es/autor/upklyak">ILUSTRACIONES</a></h6>
            </div>
            <div class="footer-caja container-fluid col-sm-12 col-md-4 col-lg-4 pt-3">
                <h5>CONTACTO</h5>
                <h6><span class="bi bi-instagram"><a href="https://www.instagram.com/lasallesantoangelzaragoza/?hl=es"> INSTAGRAM</a></span></h6>
                <h6><span class="bi bi-facebook"><a href="https://www.facebook.com/lasallesantoangelzaragoza/?locale=es_ES"> FACEBOOK</a></span></h6>
                <h6><span class="bi bi-linkedin"><a href="https://es.linkedin.com/company/cpifp-la-salle-santo-ángel"> LINKEDIN</a></span></h6>
                <h6>LSBM@lasalle.es</h6>
                <h6><a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0xd596ae4350cb88f:0x5589aee9027c6a06?sa=X&ved=1t:8290&ictx=111">C. de Tomás Anzano, 1, Casablanca, 50012 Zaragoza</a></h6>

            </div>
            <div class="row">
                <div class="footer-final pt-3">
                    <p>© 2026 La Salle Business Match</p>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="./JS/perfil.js"></script>
<script src="../JS/menu.js"></script>
<!--<script src="https://cdn.botpress.cloud/webchat/v3.3/inject.js"></script>
        <script src="https://files.bpcontent.cloud/2025/10/10/16/20251010162421-YDPBONI7.js" defer></script>-->

</html>