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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../global.css">
    <title>LSBM</title>
</head>

<body>
    <nav class="container navegador bg-dark">
        <div class="container nav-content">
            <a href="../index.php"><img class="logo" src="../IMAGENES/LOGOlsbm2.png" alt=""></a>
            <button class="btn-nav"><span class="bi bi-list"></span></button>
            <ul class="nav-list">
                <li><button><a href="../index.php#PROGRAMA">PROGRAMA</a></button></li>
                <li><button><a href="mapa.php ">STANDS</a></button></li>
                <li><button><a href="../empresas/empresas.php">RANKING</a></button></li>
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
       <?php include "../php/empresas/ver-empresa.php"?>
       
       <form method="POST" action="../php/empresas/megusta.php" style="display: inline;">
           <input type="hidden" name="empresa_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : (isset($_GET['stand']) ? $empresa['id'] : ''); ?>">
           <button type="submit" class="btn-megusta-flotante" aria-label="Me gusta esta empresa">
               <span>Me Gusta</span>
           </button>
       </form>
       
       <button id="btn-votar" class="btn-votar-flotante" aria-label="Votar por esta empresa">
           <span>Votar</span>
       </button>
       
       <div id="modal-megusta" class="modal-votacion <?php echo isset($_SESSION['mensaje_megusta']) ? 'active' : ''; ?>">
           <div class="modal-votacion-content">
               <button class="modal-votacion-close" id="close-megusta">&times;</button>
               <div class="modal-votacion-header">
                   <h2><?php echo isset($_SESSION['tipo_mensaje_megusta']) && $_SESSION['tipo_mensaje_megusta'] === 'success' ? '¡Gracias!' : 'Atención'; ?></h2>
               </div>
               <div class="mensaje-votacion <?php echo isset($_SESSION['tipo_mensaje_megusta']) ? $_SESSION['tipo_mensaje_megusta'] : ''; ?>" style="display: block; margin-bottom: 15px;">
                   <?php 
                       if (isset($_SESSION['mensaje_megusta'])) {
                           echo $_SESSION['mensaje_megusta'];
                           unset($_SESSION['mensaje_megusta']);
                           unset($_SESSION['tipo_mensaje_megusta']);
                       }
                   ?>
               </div>
               <div class="form-actions" style="justify-content: center; margin-top: 10px;">
                   <button type="button" class="btn-votar-submit" id="btn-cerrar-megusta" style="flex: 0 0 auto; max-width: 200px;">Aceptar</button>
               </div>
           </div>
       </div>
       
       <div id="modal-votacion" class="modal-votacion">
           <div class="modal-votacion-content">
               <button class="modal-votacion-close" id="close-votacion">&times;</button>
               <div class="modal-votacion-header">
                   <h2>Vota por esta empresa</h2>
               </div>
               
               
               
               <form id="form-votacion" class="form-votacion" method="POST" action="../php/empresas/votaciones.php">
                   <input type="hidden" id="empresa-id" name="empresa_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : (isset($_GET['stand']) ? $empresa['id'] : ''); ?>">
                   <div class="form-group">
                       <label for="dni-voto">Correo electrónico <span class="required">*</span></label>
                       <input type="email" id="correo-voto" name="correo" placeholder="ejemplo@correo.com" required>
                       <small class="input-help">Usa el correo con el que te inscribiste</small>
                   </div>
                   <div class="form-actions">
                       <button type="submit" class="btn-votar-submit">Enviar Voto</button>
                       <button type="button" class="btn-votar-cancel" id="cancel-votacion">Cancelar</button>
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
                <h6><a href="../index.php">INICIO</a></h6>
                <h6><a href="../index.php#Patrocinadores">CENTROS</a></h6>
                <h6><a href="mapa.php">MAPA</a></h6>
                <h6><a href="../empresas/empresas.php">EMPRESAS</a></h6>
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

    <script src="../js-menu.js"></script>
    <script src="./scrip.js"></script>
    <script>
        // Manejo del modal de Me Gusta
        const modalMegusta = document.getElementById('modal-megusta');
        const closeMegusta = document.getElementById('close-megusta');
        const btnCerrarMegusta = document.getElementById('btn-cerrar-megusta');
        
        if (closeMegusta) {
            closeMegusta.addEventListener('click', function() {
                modalMegusta.classList.remove('active');
            });
        }
        
        if (btnCerrarMegusta) {
            btnCerrarMegusta.addEventListener('click', function() {
                modalMegusta.classList.remove('active');
            });
        }
        
        if (modalMegusta) {
            modalMegusta.addEventListener('click', function(e) {
                if (e.target === modalMegusta) {
                    modalMegusta.classList.remove('active');
                }
            });
        }
    </script>

</body>

</html>