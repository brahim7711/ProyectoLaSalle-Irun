<!DOCTYPE html>
<html lang="es">

<head>
    <title>PROYECTO</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../IMAGENES/logoico3.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link type="text/css" rel="stylesheet" href="paginaPrivada.css">
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['idUsuario'])) {
        header("Location: InicioSesionEmpresa.html");
        exit;
    }

    $idUsuario = $_SESSION['idUsuario'];
    $nombre = $_SESSION['nombre'];
    $correo = $_SESSION['correo'];

    require '../php/bd.php';

    // Cargar datos de la empresa
    $sqlInfo = "SELECT nombre_empresa, contacto_adicional, descripcion, web_url, spot_url, meet_url, logo_url FROM empresas WHERE id_autorizado = ?";
    $stmtInfo = $conexion->prepare($sqlInfo);
    $stmtInfo->bind_param("i", $idUsuario);
    $stmtInfo->execute();
    $datos = $stmtInfo->get_result()->fetch_assoc();

    $link = $datos["spot_url"];
    $linkMeet = $datos["meet_url"];
    $nombre = $datos["nombre_empresa"];
    $correoActual = $correo;
    $telefonoActual = $datos["contacto_adicional"];
    $decripcionActual = $datos["descripcion"];
    $logo  = $datos["logo_url"];
    $mensaje = ""; // mensaje de error o éxito

    //la ruta relativa

    $RutaIcono = str_replace("../../", "", $logo);
    $RutaIconoExplode = explode("/", $logo);



    // MODIFICAR VIDEO
    if (isset($_POST["url"]) && $_POST["url"] !== "") {
        $url = $_POST["url"];
        if (strpos($url, "youtube.com/watch?v=") !== false) {
            $videoID = explode("&", explode("v=", $url)[1])[0];
            $link = "https://www.youtube.com/embed/" . $videoID;
        } elseif (strpos($url, "youtu.be/") !== false) {
            $videoID = explode("?", explode("youtu.be/", $url)[1])[0];
            $link = "https://www.youtube.com/embed/" . $videoID;
        }
        $sql = "UPDATE empresas SET spot_url=? WHERE id_autorizado=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("si", $link, $idUsuario);
        $stmt->execute();
    }

    // MODIFICAR MEET
    if (isset($_POST["linkMeet"]) && $_POST["linkMeet"] !== "") {
        $meet = $_POST["linkMeet"];
        $sql = "UPDATE empresas SET meet_url=? WHERE id_autorizado=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("si", $meet, $idUsuario);
        $stmt->execute();
        $linkMeet = $meet;
    }

    // MODIFICAR NOMBRE
    if (isset($_POST["nuevoNombre"])) {
        $nuevoNombre = $_POST["nuevoNombre"];
        $sql = "UPDATE empresas SET nombre_empresa=? WHERE id_autorizado=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("si", $nuevoNombre, $idUsuario);
        $stmt->execute();
        $_SESSION['nombre'] = $nuevoNombre;
        $nombre = $nuevoNombre;
    }

    // MODIFICAR CORREO
    // if (isset($_POST["nuevoCorreo"])) {
    //     $nuevoCorreo = $_POST["nuevoCorreo"];
    //     $sql = "UPDATE empresas SET email=? WHERE id=?";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bind_param("si", $nuevoCorreo, $idUsuario);
    //     $stmt->execute();
    // }

    // MODIFICAR TELÉFONO
    if (isset($_POST["nuevoTelefono"])) {
        $nuevoTel = $_POST["nuevoTelefono"];
        $sql = "UPDATE empresas SET contacto_adicional=? WHERE id_autorizado=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("si", $nuevoTel, $idUsuario);
        $stmt->execute();
        $telefonoActual = $nuevoTel;
    }

    // MODIFICAR DESCRIPCIÓN
    if (isset($_POST["nuevaDescripcion"])) {
        $newDesc = $_POST["nuevaDescripcion"];
        $sql = "UPDATE empresas SET descripcion=? WHERE id_autorizado=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("si", $newDesc, $idUsuario);
        $stmt->execute();
        $decripcionActual = $newDesc;
    }

    //Remplazar el logo manteniendo el mismo nombre
    if (isset($_FILES['logoNuevo']['tmp_name'])) {
        unlink("../" . $RutaIcono);


        $carpetaDestino = "../resources/logos-empresas/";

        $rutaFinal = $carpetaDestino . $RutaIconoExplode[4];

        if (!move_uploaded_file($_FILES['logoNuevo']['tmp_name'], $rutaFinal)) {
            $nombreUnico = null;
        }
    }
    // ACTUALIZAR CONTRASEÑA
    if (isset($_POST['btnCambiarPass'])) {
        $passActual = $_POST['passActual'] ?? '';
        $passNueva = $_POST['passNueva'] ?? '';
        $passRepite = $_POST['passRepite'] ?? '';


        if ($passNueva !== '' || $passRepite !== '') {
            if ($passActual === '') {
                $mensaje = "Debes ingresar la contraseña actual para cambiarla";
            } else if ($passNueva !== $passRepite) {
                $mensaje = "Las contraseñas nuevas no coinciden";
            } else {
                $sql = "SELECT contrasena FROM empresas WHERE id_autorizado = ?";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("i", $idUsuario);
                $stmt->execute();
                $row = $stmt->get_result()->fetch_assoc();
                $passGuardada = $row['contrasena'];


                if (hash("sha256", $passActual) !== $passGuardada) {
                    $mensaje = "La contraseña actual no es correcta";
                } else {
                    $hashNueva = hash("sha256", $passNueva);
                    $sqlUpdate = "UPDATE empresas SET contrasena=? WHERE id_autorizado=?";
                    $stmt = $conexion->prepare($sqlUpdate);
                    $stmt->bind_param("si", $hashNueva, $idUsuario);
                    $stmt->execute();
                    $mensaje = "Contraseña actualizada correctamente";
                }
            }
        }
    }

    ?>

    <nav class="container navegador bg-dark">
        <div class="container nav-content">
            <a href="../index.php">
                <img class="logo my-1" src="../IMAGENES/LOGOlsbm2.png" alt="">
            </a>

            <button class="btn-nav">
                <span class="bi bi-list"></span>
            </button>

            <ul class="nav-list">
                <li><button><a href="../index.php#PROGRAMA">PROGRAMA</a></button></li>
                <li><button><a href="../mapa/mapa.php">STANDS</a></button></li>
                <li><button><a href="../index.php#Patrocinadores">CENTROS</a></button></li>
                <li><button><a href="../empresas/empresas.php">RANKING</a></button></li>
                <li><button><a href="../contacto/contacto.php">NOSOTROS</a></button></li>
                <li><button>
                        <?php
                        if (!isset($nombre)) {
                            echo '<a href="../InicioSesionEmpresa.html" id="iniciar">INICIAR SESIÓN</a>';
                        } elseif ($_SESSION['tipo'] == 'empresa') {
                            echo '<a href="paginaPrivada.php">' . $nombre . '</a>';
                        }
                        ?>
                    </button></li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="col navtab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">
                            Datos Generales
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab">
                            Video
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="meet-tab" data-bs-toggle="tab" data-bs-target="#meet" type="button" role="tab">
                            Meet
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pass-tab" data-bs-toggle="tab" data-bs-target="#pass" type="button" role="tab">
                            Contraseña
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pass-tab" data-bs-toggle="tab" data-bs-target="#icono" type="button" role="tab">
                            Icono
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pass-tab" data-bs-toggle="tab" data-bs-target="#megustas" type="button" role="tab">
                            Me gustas
                        </button>
                    </li>
                </ul>

                <form method="POST" enctype="multipart/form-data">
                    <div class="tab-content" id="myTabContent">
                        <!-- TAB 1 DATOS -->
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nombre de la Empresa</label>
                                    <input type="text" class="form-control" name="nuevoNombre" value="<?php echo $nombre; ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Correo</label>
                                    <input type="email" readonly class="form-control" name="nuevoCorreo" value="<?php echo $correoActual; ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" name="nuevoTelefono" value="<?php echo $telefonoActual; ?>">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Descripción</label>
                                    <textarea class="form-control" name="nuevaDescripcion" rows="4"><?php echo $decripcionActual; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 2 VIDEO -->
                        <div class="tab-pane fade" id="video" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="ratio ratio-16x9">
                                        <iframe src="<?php echo $link ?>" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Spot</label>
                                    <input type="text" class="form-control" name="url" value="<?php echo $link ?>">
                                </div>
                            </div>
                        </div>

                        <!-- TAB 3 MEET -->
                        <div class="tab-pane fade" id="meet" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Google Meet</label>
                                    <input type="text" class="form-control" name="linkMeet" value="<?php echo $linkMeet; ?>">
                                </div>
                            </div>
                        </div>

                        <!-- TAB 4 CONTRASEÑA -->
                        <div class="tab-pane fade" id="pass" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Contraseña Actual</label>
                                    <input type="password" class="form-control" name="passActual">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Nueva Contraseña</label>
                                    <input type="password" class="form-control" name="passNueva">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Repetir Nueva Contraseña</label>
                                    <input type="password" class="form-control" name="passRepite">
                                </div>
                            </div>

                        </div>

                        <!-- TAB 5 Icono -->
                        <div class="tab-pane fade" id="icono" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="ratio ratio-16x9">
                                        <image src="../<?php echo $RutaIcono ?>"></image>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Cambiar logo</label>
                                    <input type="file" id="logo" name="logoNuevo" class="form-control" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <!-- TAB 6 Me gusta -->
                        <div class="tab-pane fade" id="megustas" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Estas son las empresas que te han dado me gusta</label>
                                    <br>
                                    <?php include '../php/empresas/megustas.php'; ?>
                                </div>
                            </div>
                        </div>

                        <?php if ($mensaje != "") { ?>
                            <div class=" alert <?php echo ($mensaje === 'Contraseña actualizada correctamente') ? 'alert-success' : 'alert-danger'; ?> mt-2">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php } ?>
                    </div>

                    

                    <!-- BOTÓN GLOBAL -->
                    <div class="text-end mt-1">
                        <button type="submit" class="btn btn-primary" name="btnCambiarPass">Guardar Cambios</button>
                        <a href="cerrarSesion.php" class="btn btn-danger">Cerrar Sesión</a>

                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="container-fluid">
        <div class="row">
            <div class="footer-caja1 container-fluid col-sm-12 col-md-12 col-lg-4 pt-3">
                <h4>LA SALLE BUSINESS MATCH</h4>
                <p>Feria Virtual de Empresas Simuladas</p>
            </div>
            <div class="footer-caja container-fluid col-sm-12 col-md-4 col-lg-4 pt-3">
                <h5>ENLACES</h5>
                <h6><a href="index.php">INICIO</a></h6>
                <h6><a href="index.php#Patrocinadores">PATROCINADORES</a></h6>
                <h6><a href="participantes.php">VOTACIÓN</a></h6>
                <h6><a href="nosotros.php">NOSOTROS</a></h6>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./JS/main.js"></script>
</body>

</html>