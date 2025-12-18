<?php


$mensaje = '';
$tipo_mensaje = '';

//OBTENER TODAS LAS EMPRESAS
$query_empresas = "SELECT id, nombre_empresa FROM empresas ORDER BY nombre_empresa ASC";
$result_empresas = $conexion->query($query_empresas);
$empresas = [];
if ($result_empresas) {
    while ($row = $result_empresas->fetch_assoc()) {
        $empresas[] = $row;
    }
}

// OBTENER TODOS LOS STANDS
$query_stands = "SELECT s.stand_id, s.empresa_id, e.nombre_empresa 
                 FROM stands s 
                 LEFT JOIN empresas e ON s.empresa_id = e.id 
                 ORDER BY s.stand_id ASC";
$result_stands = $conexion->query($query_stands);
$stands = [];
if ($result_stands) {
    while ($row = $result_stands->fetch_assoc()) {
        $stands[] = $row;
    }
}

// OBTENER EMPRESAS AUTORIZADAS
$query_autorizadas = "SELECT id_autorizado, email_autorizado FROM empresas_autorizadas ORDER BY email_autorizado ASC";
$result_autorizadas = $conexion->query($query_autorizadas);
$autorizadas = [];
if ($result_autorizadas) {
    while ($row = $result_autorizadas->fetch_assoc()) {
        $autorizadas[] = $row;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // CUANDO SE DA CLICK EN AÑADIR EMPRESA AUTORIZADA
    if (isset($_POST['action']) && $_POST['action'] === 'add_autorizada') {
        $email = trim($_POST['email_autorizado']);
        
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $conexion->prepare("SELECT id_autorizado FROM empresas_autorizadas WHERE email_autorizado = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $mensaje = "Este email ya está autorizado";
                $tipo_mensaje = "error";
            } else {
                $stmt = $conexion->prepare("INSERT INTO empresas_autorizadas (email_autorizado) VALUES (?)");
                $stmt->bind_param('s', $email);
                if ($stmt->execute()) {
                    header("Location: ../../administrador/panel_admin.php?msg=add_success");
                    exit();
                }
            }
        } else {
            $mensaje = "Email no válido";
            $tipo_mensaje = "error";
        }
    }
    
    // CUANDO SE DA CLICK EN ELIMINAR EMPRESA AUTORIZADA
    if (isset($_POST['action']) && $_POST['action'] === 'delete_autorizada') {
        $id = intval($_POST['id_autorizado']);
        
        $stmt = $conexion->prepare("SELECT COUNT(*) as total FROM empresas WHERE id_autorizado = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row['total'] > 0) {
            $mensaje = "No se puede eliminar, hay empresas registradas con este email";
            $tipo_mensaje = "error";
        } else {
            $stmt = $conexion->prepare("DELETE FROM empresas_autorizadas WHERE id_autorizado = ?");
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                header("Location: ../../administrador/panel_admin.php?msg=delete_success");
                exit();
            }
        }
    }
    
    // CUANDO SE DA CLICK EN ASIGNAR STAND
    if (isset($_POST['action']) && $_POST['action'] === 'asignar_stand') {
        $empresa_id = intval($_POST['empresa_id']);
        $stand_id = trim($_POST['stand_id']);
        
        if ($empresa_id > 0 && !empty($stand_id)) {
            // LIBERAR STAND ANTERIOR
            $stmt = $conexion->prepare("UPDATE stands SET empresa_id = NULL WHERE empresa_id = ?");
            $stmt->bind_param('i', $empresa_id);
            $stmt->execute();
            
            $stmt = $conexion->prepare("UPDATE stands SET empresa_id = ? WHERE stand_id = ?");
            $stmt->bind_param('is', $empresa_id, $stand_id);
            if ($stmt->execute()) {
                header("Location: ../../administrador/panel_admin.php?msg=stand_success");
                exit();
            }
        }
    }
    
    // CUANDO SE DA CLICK EN ELIMINAR EMPRESA
    if (isset($_POST['action']) && $_POST['action'] === 'delete_empresa') {
        $id = intval($_POST['empresa_id']);
        
        $stmt = $conexion->prepare("DELETE FROM empresas WHERE id = ?");
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            header("Location: ../../administrador/panel_admin.php?msg=empresa_deleted");
            exit();
        }
    }
    
    // CUANDO SE DA CLICK EN ACTUALIZAR EMPRESA
    if (isset($_POST['action']) && $_POST['action'] === 'update_empresa') {
        $id = intval($_POST['empresa_id']);
        $nombre = trim($_POST['nombre_empresa']);
        $descripcion = !empty($_POST['descripcion']) ? trim($_POST['descripcion']) : null;
        $web_url = !empty($_POST['web_url']) ? trim($_POST['web_url']) : null;
        $logo_url = !empty($_POST['logo_url']) ? trim($_POST['logo_url']) : null;
        $spot_url = !empty($_POST['spot_url']) ? trim($_POST['spot_url']) : null;
        $meet_url = !empty($_POST['meet_url']) ? trim($_POST['meet_url']) : null;
        $contacto = !empty($_POST['contacto_adicional']) ? trim($_POST['contacto_adicional']) : null;
        $horario = !empty($_POST['horario']) ? trim($_POST['horario']) : null;
        
        $stmt = $conexion->prepare("UPDATE empresas SET nombre_empresa=?, descripcion=?, web_url=?, logo_url=?, spot_url=?, meet_url=?, contacto_adicional=?, horario=? WHERE id=?");
        $stmt->bind_param('ssssssssi', $nombre, $descripcion, $web_url, $logo_url, $spot_url, $meet_url, $contacto, $horario, $id);
        if ($stmt->execute()) {
            header("Location: ../../administrador/panel_admin.php?msg=empresa_updated&edit=" . $id);
            exit();
        }
    }
}

// EN TODOS AL ACABAR TODAS LAS ACCIONES BN SE HACE UNA HEADER A LA PAGINA PRINCIPAL MOSTRANDO UN MENSAJE CON LA FUNCUION ?msg= 
// Y AQUI MIRAMOS EL TIPO DE MENSAJE PARA MOSTRARLO EN UN SOLO LUGAR
if (isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 'add_success':
            $mensaje = "Email autorizado añadido correctamente";
            $tipo_mensaje = "success";
            break;
        case 'delete_success':
            $mensaje = "Empresa autorizada eliminada correctamente";
            $tipo_mensaje = "success";
            break;
        case 'stand_success':
            $mensaje = "Stand asignado correctamente";
            $tipo_mensaje = "success";
            break;
        case 'empresa_deleted':
            $mensaje = "Empresa eliminada correctamente";
            $tipo_mensaje = "success";
            break;
        case 'empresa_updated':
            $mensaje = "Empresa actualizada correctamente";
            $tipo_mensaje = "success";
            break;
    }
}

// OBTENER DATOS DE LA EMPRESA A EDITAR Y COLOCARLOS EN EL FORMULARIO LUEGO 
$empresa_edit = null;
if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $stmt = $conexion->prepare("SELECT * FROM empresas WHERE id = ?");
    $stmt->bind_param('i', $edit_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $empresa_edit = $result->fetch_assoc();
    }
}
?>
