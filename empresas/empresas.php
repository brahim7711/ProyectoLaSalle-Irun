<?php
session_start();
if (isset($_SESSION['idUsuario'])) {

    $idUsuario = $_SESSION['idUsuario'];
    $nombre = $_SESSION['nombre'];
    $tipo = $_SESSION['tipo'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!--bootstrap 5 CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"><!--bootstrap 5 icons-->
    <link rel="icon" type="image/png" href="../resources/logoico3.png">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="styles.css">
    <title>LSBM</title>
</head>

<body>
    <nav class="container navegador">
        <div class="container nav-content">
            <a href="../index.php"><img class="logo" src="../IMAGENES/LOGOlsbm2.png" alt=""></a>
            <button class="btn-nav"><span class="bi bi-list"></span></button>
            <ul class="nav-list">
                <li><button><a href="../index.php#PROGRAMA">PROGRAMA</a></button></li>
                <li><button><a href="../mapa/mapa.php">STANDS</a></button></li>
                <li><button><a href="empresas.php">RANKING</a></button></li>
                <li><button><a href="../index.php#Patrocinadores">CENTROS</a></button></li>
                <li><button><a href="../contacto/contacto.php">NOSOTROS</a></button></li>
                <li><button>
                        <?php
                        if (!isset($nombre)) {
                            echo '<a href="../inicioSesion/inicioGeneral.html" id="iniciar">INICIAR SESIÓN</a>';
                        } elseif ($tipo == 'empresa') {
                            echo '<a href="../perfilEmpresa/paginaPrivada.php">' . $nombre . '</a>';
                        }elseif ($tipo == 'administrador') {
                            echo '<a href="../administrador/panel_admin.php">ADMIN</a>';
                        }   
                        ?>
                </button></li>
            </ul>
        </div>
    </nav>
    <main>
        <section class="container-fluid empresas-section">
                <div class="votaciones-ranking">
                    <?php include("../php/empresas/ranking.php"); ?>
                </div>
                
            </div>
        </section>
    </main>
    <footer class="container-fluid p-0 m-0">
        <div class="row">
            <div class="footer-caja1 container-fluid col-sm-12 col-md-12 col-lg-3 pt-3">
                <h4>LA SALLE BUSINESS MATCH</h4>
                <p>Feria Virtual de Empresas Simuladas</p>
            </div>
            <div class="footer-caja container-fluid col-sm-12 col-md-4 col-lg-3 pt-3">
                <h5>ENLACES</h5>
                <h6><a href="../index.php">INICIO</a></h6>
                <h6><a href="../index.php#Patrocinadores">CENTROS</a></h6>
                <h6><a href="../mapa/mapa.php">STANDS</a></h6>
                <h6><a href="empresas.php">RANKING</a></h6>
                <h6><a href="https://www.freepik.es/autor/upklyak">ILUSTRACIONES</a></h6>
            </div>
            <div class="footer-caja container-fluid col-sm-12 col-md-4 col-lg-3 pt-3">
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
<script src="../JS/menu.js"></script>

</html>