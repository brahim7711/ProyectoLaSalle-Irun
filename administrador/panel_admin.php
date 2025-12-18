
<?php
session_start();
if (isset($_SESSION['idUsuario'])) {

    $idUsuario = $_SESSION['idUsuario'];
    $nombre = $_SESSION['nombre'];
    $tipo = $_SESSION['tipo'];
}
if($tipo!="administrador"){
    header("Location: ../index.php");
            exit;
        
}

include('../php/bd.php');
include('../php/administrador/procesar_admin.php');
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
                        }
                        elseif ($tipo == 'administrador') {
                            echo '<a href="panel_admin.php">ADMIN</a>';
                        }  
                        ?>
                </button></li>
            </ul>
        </div>
    </nav>
    <main>
        <div class="admin-container">
            <h1 class="admin-title">Panel de Administración</h1>

            <?php if (!empty($mensaje)): ?>
                <div class="mensaje <?php echo $tipo_mensaje; ?>">
                    <?php echo htmlspecialchars($mensaje); ?>
                </div>
            <?php endif; ?>
            <div class="admin-section">
                <h2 class="section-title">Editar Empresa</h2>
                <div class="form-container">
                    <?php if (!$empresa_edit): ?>
                        <form method="GET" action="panel_admin.php">
                            <div class="form-group">
                                <label for="edit_empresa">Seleccionar Empresa a Editar:</label>
                                <select id="edit_empresa" name="edit" class="form-control" onchange="this.form.submit()">
                                    <option value="">-- Seleccione una empresa --</option>
                                    <?php foreach ($empresas as $emp): ?>
                                        <option value="<?php echo $emp['id']; ?>">
                                            <?php echo htmlspecialchars($emp['nombre_empresa']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </form>

                    <?php else: ?>
                        <form method="POST" action="panel_admin.php" class="edit-form">
                            <input type="hidden" name="action" value="update_empresa">
                            <input type="hidden" name="empresa_id" value="<?php echo $empresa_edit['id']; ?>">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nombre_empresa">Nombre de la Empresa:</label>
                                    <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control"
                                        value="<?php echo htmlspecialchars($empresa_edit['nombre_empresa']); ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" class="form-control"
                                    rows="4"><?php echo htmlspecialchars($empresa_edit['descripcion'] ?? ''); ?></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="web_url">URL Web:</label>
                                    <input type="url" id="web_url" name="web_url" class="form-control"
                                        value="<?php echo htmlspecialchars($empresa_edit['web_url'] ?? ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="logo_url">URL Logo:</label>
                                    <input type="text" id="logo_url" name="logo_url" class="form-control"
                                        value="<?php echo htmlspecialchars($empresa_edit['logo_url'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="spot_url">URL Spot:</label>
                                    <input type="text" id="spot_url" name="spot_url" class="form-control"
                                        value="<?php echo htmlspecialchars($empresa_edit['spot_url'] ?? ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="meet_url">URL Meet:</label>
                                    <input type="url" id="meet_url" name="meet_url" class="form-control"
                                        value="<?php echo htmlspecialchars($empresa_edit['meet_url'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="contacto_adicional">Contacto Adicional:</label>
                                    <input type="text" id="contacto_adicional" name="contacto_adicional"
                                        class="form-control"
                                        value="<?php echo htmlspecialchars($empresa_edit['contacto_adicional'] ?? ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="horario">Horario:</label>
                                    <input type="text" id="horario" name="horario" class="form-control"
                                        value="<?php echo htmlspecialchars($empresa_edit['horario'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                <a href="panel_admin.php" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

            <div class="admin-section">
                <h2 class="section-title">Eliminar Empresa</h2>
                <div class="delete-container">
                    <form method="POST" action="panel_admin.php"
                        onsubmit="return confirm('¿Está seguro de eliminar esta empresa? Esta acción no se puede deshacer.');">
                        <input type="hidden" name="action" value="delete_empresa">
                        <div class="form-group">
                            <label for="empresa_delete">Seleccionar Empresa a Eliminar:</label>
                            <select id="empresa_delete" name="empresa_id" class="form-control" required>
                                <option value="">-- Seleccione una empresa --</option>
                                <?php foreach ($empresas as $emp): ?>
                                    <option value="<?php echo $emp['id']; ?>">
                                        <?php echo htmlspecialchars($emp['nombre_empresa']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-danger">Eliminar Empresa</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="admin-section">
                <h2 class="section-title">Asignar Stand a Empresa</h2>
                <div class="stand-container">
                    <form method="POST" action="panel_admin.php">
                        <input type="hidden" name="action" value="asignar_stand">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="empresa_stand">Seleccionar Empresa:</label>
                                <select id="empresa_stand" name="empresa_id" class="form-control" required>
                                    <option value="">-- Seleccione una empresa --</option>
                                    <?php foreach ($empresas as $emp): ?>
                                        <option value="<?php echo $emp['id']; ?>">
                                            <?php echo htmlspecialchars($emp['nombre_empresa']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stand_id">Seleccionar Stand:</label>
                                <select id="stand_id" name="stand_id" class="form-control" required>
                                    <option value="">-- Seleccione un stand --</option>
                                    <?php foreach ($stands as $stand): ?>
                                        <option value="<?php echo $stand['stand_id']; ?>">
                                            <?php
                                            echo $stand['stand_id'] . ' - ';
                                            echo $stand['nombre_empresa'] ? htmlspecialchars($stand['nombre_empresa']) : 'Disponible';
                                            ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Asignar Stand</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="admin-section">
                <h2 class="section-title">Gestionar Empresas Autorizadas</h2>
                <div class="autorizadas-container">
                    <div class="sub-section">
                        <h3 class="sub-title">Añadir Email Autorizado</h3>
                        <form method="POST" action="panel_admin.php">
                            <input type="hidden" name="action" value="add_autorizada">
                            <div class="form-group">
                                <label for="email_autorizado">Email Autorizado:</label>
                                <input type="email" id="email_autorizado" name="email_autorizado" class="form-control"
                                    required placeholder="email@empresa.com">
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Añadir Autorizada</button>
                            </div>
                        </form>
                    </div>

                    <div class="sub-section">
                        <h3 class="sub-title">Eliminar Empresa Autorizada</h3>
                        <form method="POST" action="panel_admin.php"
                            onsubmit="return confirm('¿Está seguro de eliminar esta empresa autorizada?');">
                            <input type="hidden" name="action" value="delete_autorizada">
                            <div class="form-group">
                                <label for="id_autorizado">Seleccionar Empresa Autorizada:</label>
                                <select id="id_autorizado" name="id_autorizado" class="form-control" required>
                                    <option value="">-- Seleccione una empresa autorizada --</option>
                                    <?php foreach ($autorizadas as $aut): ?>
                                        <option value="<?php echo $aut['id_autorizado']; ?>">
                                            <?php echo htmlspecialchars($aut['email_autorizado']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-danger">Eliminar Autorizada</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a href="cerrarSesion.php" class="btn btn-danger">Cerrar Sesión</a>

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
                <h6><a href="../mapa/mapa.php">STANDS</a></h6>
                <h6><a href="../empresas/empresas.php">RANKING</a></h6>
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
    <script src="script.js"></script>
    <script src="../JS/menu.js"></script>

</body>

</html>