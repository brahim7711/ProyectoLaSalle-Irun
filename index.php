<?php include __DIR__ . '/php/inscribete/inscribete.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>PROYECTO</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" lang="es">
    </meta>
    <link rel="icon" href="./IMAGENES/logoico3.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!--bootstrap 5 CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"><!--bootstrap 5 icons-->
    <link type="text/css" rel="stylesheet" href="Proyecto.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="global.css">
</head>

<body>
    <nav class="container navegador bg-dark">
        <div class="container nav-content">
            <a href="index.php"><img class="logo" src="./IMAGENES/LOGOlsbm2.png" alt=""></a>
            <button class="btn-nav"><span class="bi bi-list"></span></button>
            <ul class="nav-list">
                <li><button><a href="index.php#PROGRAMA">PROGRAMA</a></button></li>
                <li><button><a href="./mapa/mapa.php">STANDS</a></button></li>
                <li><button><a href="./empresas/empresas.php">RANKING</a></button></li>
                <li><button><a href="index.php#Patrocinadores">CENTROS</a></button></li>
                <li><button><a href="./contacto/contacto.php">NOSOTROS</a></button></li>
                <li><button>
                        <?php
                        if (!isset($nombre)) {
                            echo '<a href="./inicioSesion/inicioGeneral.html" id="iniciar">INICIAR SESIÓN</a>';
                        } elseif ($tipo == 'empresa') {
                            echo '<a href="./perfilEmpresa/paginaPrivada.php">' . $nombre . '</a>';
                        } elseif ($tipo == 'administrador') {
                            echo '<a href="administrador/panel_admin.php">ADMIN</a>';
                        }
                        ?>
                    </button></li>
            </ul>
        </div>
    </nav>
    <main class="container-fluid p-0 m-0">
        <img class="img-main" src="./IMAGENES/lasallef1.jpg" alt="">
        <section class="container-fluid p-0 m-0 ">
            <div class="container portada-content col-sm-12 col-md-10 col-lg-6 p-0 m-0 ">
                <div class="container portada-title mb-2">
                    <h1 class="display-4 pb-2">LA SALLE BUSINESS MATCH</h1>
                    <h3>22 de Enero 2026</h3>
                </div>
                <div class="container-fluid portada-text mb-4 px-5">
                    <p> ¡Bienvenidos a la feria virtual que conecta empresas y talento joven!
                        Participa como empresa para presentar tus proyectos y descubrir nuevos talentos,
                        o regístrate como visitante para explorar oportunidades, aprender y conectar con líderes del sector.
                    </p>
                </div>
                <div class="container-fluid portada-btns">
                    <button class="btn1"><a href="./auth/empresas/empresas.php">EMPRESA</a></button>
                    <input type="submit" id="inscribete" class="btn-inscribete btn1" value="VISITANTE">
                </div>
            </div>
        </section>
        <div class="inicio-bolitas">
        </div>
    </main>
    <article class="container-fluid  m-0" id="PROGRAMA">
        <div class="container-fluid pt-5">
            <h1 class="titulo">PROGRAMA</h1>
        </div>
        <div class="container-fluid programa-content row m-0 py-5">
            <div class="container-fluid col-5 pc">
                <div class="caja">
                    <h4>ACTO INAUGURAL <br> <a id="enlacesAcceso" href="https://meet.google.com/bpm-mbns-njb" target="_blank">Acceder</a> </h4>
                </div>
                <div class="caja"></div>
                <div class="caja">
                    <h4>INICIO DE LA FERIA</h4>
                </div>
                <div class="caja"></div>
                <div class="caja">
                    <h4>CLAUSURA DE LA FERIA <br> <a id="enlacesAcceso" href="https://meet.google.com/bpm-mbns-njb" target="_blank">Acceder</a></h4>
                </div>
            </div>
            <div class="container-fluid col-2 linea px-1">
                <div class="caja1 punto">
                    <h5 class="">9:00</h5>
                </div>
                <div class="caja4 punto">
                    <h5 class="ps-5">9:30</h5>
                </div>
                <div class="caja3 punto">
                    <h5>10:00</h5>
                </div>
                <div class="caja4 punto">
                    <h5 class="ps-5">17:00</h5>
                </div>
                <div class="caja5 punto">
                    <h5>17:15</h5>
                </div>
            </div>
            <div class="container-fluid col-5 pc">
                <div class="caja"></div>
                <div class="caja">
                    <h4>CONFERENCIA: EMPRENDER CON YERAY MATEOS (EYWA SPACE) <br> <a id="enlacesAcceso" href="https://meet.google.com/bpm-mbns-njb" target="_blank">Acceder</a></h4>
                </div>
                <div class="caja"></div>
                <div class="caja">
                    <h4>FIN DE LA FERIA</h4>
                </div>
                <div class="caja"></div>
            </div>
        </div>
    </article>
    <div class="container-fluid s-caja m-0 caja11 mb-5">
        <div class="container-fluid row pt-5">
            <div class="container-fluid s-vota-content col-sm-12 col-md-12 col-lg-6 p-0 ">
                <div class="container-fluid blur m-0 py-4 px-5">
                    <div class="container-fluid p-0 m-0">
                        <h1 class="mb-3">VOTACIÓN</h1>
                    </div>
                    <div class="caja-text">
                        <p> En el marco del <strong>Nuevo Contexto de Aprendizaje (NCA)</strong> de La Salle, una propuesta que impulsa el protagonismo del alumno, la creatividad y el aprendizaje significativo, las empresas simuladas del <strong>La Salle Business Match 2026</strong> presentan su talento y originalidad a través de sus spots publicitarios.</p>
                        <p> Descubre sus propuestas, valora su trabajo y elige el spot que mejor refleje los valores, la innovación y el espíritu de <strong>La Salle</strong>.</p>
                        <p>Tu voto puede marcar la diferencia.</p>
                    </div>
                    <div class="container-fluid d-flex justify-content-center">
                        <button class="btn1"><a href="./mapa/mapa.php">VOTAR</a></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid col-sm-0 col-md-0 col-lg-6 img-vot">
            </div>
        </div>
    </div>
    <div id="modal-inscribete" class="modal-overlay <?php echo (!empty($mensaje)) ? 'active' : ''; ?>">
        <div class="modal-content">
            <button class="modal-close" id="close-modal">&times;</button>
            <div class="modal-header">
                <h2>Inscríbete a la Feria</h2>
                <p>Completa el formulario para inscribirte</p>
            </div>

            <?php if (!empty($mensaje)): ?>
                <div class="message-container show">
                    <p class="<?php echo $tipo_mensaje; ?>-message"><?php echo htmlspecialchars($mensaje); ?></p>
                </div>
            <?php endif; ?>

            <form class="form-inscripcion" id="form-inscripcion" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre <span class="required">*</span></label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos <span class="required">*</span></label>
                    <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos" required>
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico <span class="required">*</span></label>
                    <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn-submit" name="aceptar" value="1">Enviar Inscripción</button>
                    <button type="button" class="btn-cancel" id="cancel-btn">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid s-caja caja22 pt-5 ">
        <div class="container titulo2 pt-5 p-0 m-0">
            <h1>La Salle Business Match 2026</h1>
        </div>
        <div class="container video-contenedor p-0 m-0 mt-3 pb-5 mb-5">
            <div class="container-fluid v2 p-0">
                <span class="bi bi-play-circle-fill play"></span>
                <iframe class="video" controls src="https://www.youtube.com/embed/zYtfJW4OBzU?si=fYmn5e0JVYyBky5t" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    <div class="container-fluid s-caja s-pat p-0 m-0 pt-5" id="Patrocinadores">
        <div class="container-fluid pt-5 p-0 m-0">
            <h1 class="titulo">CENTROS PARTICIPANTES</h1>
            <div class="text-center mt-4">
                <button class="btn btn-outline-warning" id="togglePatrocinadores">
                    Ver todos los participantes
                </button>
            </div>
        </div>
        <div class="container-fluid patrocinadores row pt-5">
            <div class=" container-fluid carta col-sm-6 col-md-4 col-lg-2 carta1">
                <div class="container-fluid log">
                    <img src="./IMAGENES/logodistrito.png" alt="">
                </div>
                <div class="pat-text">
                    <p>Distrito educativo que coordina los centros La Salle de España y Portugal, impulsando proyectos comunes, formación
                        y acompañamiento a escuelas y comunidades lasalianas.</p>
                </div>
            </div>
            <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta2">
                <div class="container-fluid log">
                    <img src="./IMAGENES/lasallesantoangel.png" alt="">
                </div>
                <div class="pat-text">
                    <p>Centro educativo ubicado en Zaragoza perteneciente a La Salle que ofrece programas formativos orientados al crecimiento académico,
                        personal y social del alumnado, integrándose en la red de escuelas lasalianas.</p>
                </div>
            </div>
            <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta3">
                <div class="container-fluid log">
                    <img src="./IMAGENES/lasalleirun.png" alt="">
                </div>
                <div class="pat-text">
                    <p>Colegio concertado en Irun (Gipuzkoa) perteneciente a La Salle, que ofrece educación desde infantil hasta formación
                        profesional con un modelo pedagógico innovador.</p>
                </div>
            </div>
            <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta4">
                <div class="container-fluid log">
                    <img src="./resources/LOGOSCENTROS/eywa.png" alt="">
                </div>
                <div class="pat-text">
                    <p>EYWA SPACE somos un equipo de emprendedores, consultores y expertos tecnológicos con más de 15 años de experiencia en sus respectivos campos que dibujan el camino hacia el éxito de tu Startup</p>
                </div>
            </div>

        </div>

        <div class="container-fluid patrocinadores-extra">
            <div class="container-fluid patrocinadores row pt-5">
                <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta5">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LasalleBarceloneta.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>La Salle Barceloneta es un centro de formación post-obligatorio concertado, Bachillerato y FP de Grado Medio y Superior. Educamos a los jóvenes en los valores humanos y cristianos característicos de La Salle para promover una mejor sociedad.</p>
                    </div>
                </div>
                <div class=" container-fluid carta col-sm-6 col-md-4 col-lg-2 carta6">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleBerrozpe.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>Somos una comunidad que lleva más de 70 años creciendo con las personas, acompañándolas en todas las etapas de su vida académica y personal. Un lugar donde se aprende, se trabaja, se colabora y se celebra.</p>
                    </div>
                </div>
                <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta7">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleFMoreno.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>La Salle Fundación Moreno Bachiller es un centro educativo concertado y católico ubicado en Arcos de la Frontera (Cádiz).
                            Pertenece a la red de centros de los Hermanos de las Escuelas Cristianas (La Salle) y tiene una historia muy ligada a la generosidad local.</p>
                    </div>
                </div>
                <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta8">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleInca.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>La Salle Inca es un colegio católico y concertado en Mallorca que ofrece educación integral desde Infantil hasta Bachillerato y FP. Destaca por su metodología innovadora NCA y una sólida formación profesional vinculada a valores cristianos y humanos.</p>
                    </div>
                </div>

            </div>
            <div class="container-fluid patrocinadores   row pt-5">
                <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta9">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleJerez.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>La Salle Buen Pastor es un emblemático colegio concertado en el centro de Jerez de la Frontera. Ofrece todas las etapas educativas
                            , destacando por su excelencia académica y su innovador modelo pedagógico NCA. Es un centro combina la formación en valores cristianos con los idiomas y la tecnología.</p>
                    </div>
                </div>
                <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta10">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleJeresSC.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>La Salle Sagrado Corazón es un centro educativo concertado en Jerez de la Frontera con más de un siglo de historia. Ofrece todas las etapas desde Infantil hasta Bachillerato y Ciclos Formativos, destacando por su enfoque en la innovación pedagógica y la formación en valores humanos y cristianos.</p>
                    </div>
                </div>
                <div class=" container-fluid carta col-sm-6 col-md-4 col-lg-2 carta11">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleLaSeu.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>La Salle la Seu d'Urgell somos una escuela centenaria en nuestro municipio. Tenemos como objetivo principal estimular a los alumnos para que adopten una actitud positiva, libre y decidida ante la vida, a través de la promoción de los valores de nuestro Carácter Propio</p>
                    </div>
                </div>
                <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta12">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleManelleu.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>La Salle Manlleu es una escuela concertada de Educación Secundaria Obligatoria , Bachillerato y Ciclos Formativos con mucha historia en la ciudad de Manlleu. Desde 1880 trabajamos con un carácter propio bien definido y con un compromiso por la innovación pedagógica .</p>
                    </div>
                </div>

            </div>
            <div class="container-fluid patrocinadores  row pt-5">
                <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta13">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleMollerusa-removebg-preview.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>La Salle Mollerussa, un centro educativo referente a Mollerussa desde la llegada de los primeros Hermanos en 1905. Actualmente somos una escuela de 3 líneas educativas la ESO, el Bachillerato y la Formación Profesional, dinámica y con una implicación activa en las actividades propias de nuestro entorno más cercano.</p>
                    </div>
                </div>
                <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta14">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleSagradoCor.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>Es un colegio concertado que pertenece a la red de centros educativos La Salle, con un millón de alumnos en 77 países de todo el mundo. Nuestro planteamiento educativo trabaja los valores de responsabilidad, justicia, interioridad, trascendencia, creatividad y convivencia.</p>
                    </div>
                </div>
                <div class="container-fluid carta col-sm-6 col-md-4 col-lg-2 carta15">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleValladolid.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>Fundado hace ya más de 75 años por los Hermanos de las Escuelas Cristianas, con la misión de facilitar la mejor educación para niños y jóvenes, el colegio sigue manteniendo viva la pasión de aquellos Hermanos y sigue desplegando actividades y programas que mejoran año tras año su propuesta didáctica..</p>
                    </div>
                </div>
                <div class=" container-fluid carta col-sm-6 col-md-4 col-lg-2 carta16">
                    <div class="container-fluid log">
                        <img src="./resources/LOGOSCENTROS/LaSalleVirgenDelMar.png" alt="">
                    </div>
                    <div class="pat-text">
                        <p>La Salle Virgen del Mar es un centro educativo en Almería que forma parte de la red mundial La Salle, dedicada a la educación integral. Ofrece una enseñanza basada en valores, innovación pedagógica y acompañamiento personal del alumnado..</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid info">
            <h4>ARCHIVOS INFORMACIÓN</h4>
            <div class="container-fluid archivos row p-0 m-0 pt-3 pb-3">
                <div class="container-fluid archivo col-sm-12 col-md-4 col-lg-4">
                    <a href="./documentacion/Programa de la feria.pdf" download>
                        <h5>Programa Feria <br><span class="bi bi-download descargarIcono"></span></h5>
                    </a>
                </div>
                <div class="container-fluid archivo col-sm-12 col-md-4 col-lg-4">
                    <a href="./documentacion/Bases del Concurso de Spot Publicitario LSBM 2026.pdf" download>
                        <h5>Bases Concurso <br><span class="bi bi-download descargarIcono"></span></h5>
                    </a>
                </div>
                <div class="container-fluid archivo col-sm-12 col-md-4 col-lg-4">
                    <a href="./documentacion/GUÍA DE PARTICIPACIÓN LSBM 2026.pdf" download>
                        <h5>Guía de participación<span class="bi bi-download descargarIcono"></span></h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid">
        <div class="row">
            <div class="footer-caja1 container-fluid col-sm-12 col-md-12 col-lg-4 pt-3">
                <h4>LA SALLE BUSINESS MATCH</h4>
                <p>Feria Virtual de Empresas Simuladas</p>
            </div>
            <div class="footer-caja container-fluid col-sm-12 col-md-4 col-lg-4 pt-3">
                <h5>ENLACES</h5>
                <h6><a href="index.php">INICIO</a></h6>
                <h6><a href="mapa/mapa.php">STANDS</a></h6>
                <h6><a href="empresas/empresas.php">RANKING</a></h6>
                <h6><a href="contacto/contacto.php">NOSOTROS</a></h6>
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
<script src="./JS/main.js"></script>

<script src="https://files.bpcontent.cloud/2025/10/10/16/20251010162421-YDPBONI7.js" defer></script>
<!-- API EmailJS SDK -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<!-- Pasar datos PHP a JavaScript PARA EL CORREO -->
<script>
    window.emailConfig = {
        enviarEmail: <?php echo $enviar_email ? 'true' : 'false'; ?>,
        datosEmail: {
            nombre: "<?php echo isset($datos_email['nombre']) ? htmlspecialchars($datos_email['nombre']) : ''; ?>",
            email: "<?php echo isset($datos_email['email']) ? htmlspecialchars($datos_email['email']) : ''; ?>"
        }
    };
    const btn = document.getElementById('togglePatrocinadores');
    const extra = document.querySelector('.patrocinadores-extra');

    btn.addEventListener('click', () => {
        extra.classList.toggle('show');

        btn.textContent = extra.classList.contains('show') ?
            'Ver menos' :
            'Ver todos los patrocinadores';
    });
</script>

<script src="js-menu.js"></script>
<script src="scrip.js"></script>

</html>