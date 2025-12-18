<?php
require_once __DIR__ . '/../bd.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Verificar que haya una sesión activa y que sea de tipo empresa
    if (!isset($_SESSION['idUsuario']) || !isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'empresa') {
        $_SESSION['mensaje_megusta'] = 'Debes iniciar sesión como empresa para dar Me Gusta';
        $_SESSION['tipo_mensaje_megusta'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $id_autorizado = intval($_SESSION['idUsuario']);
    $empresa_id_objetivo = isset($_POST['empresa_id']) ? intval($_POST['empresa_id']) : 0;

    // Obtener el ID de la empresa logueada desde la tabla empresas usando id_autorizado
    $sql_empresa_logueada = "SELECT id FROM empresas WHERE id_autorizado = ?";
    $stmt_empresa_logueada = $conexion->prepare($sql_empresa_logueada);
    $stmt_empresa_logueada->bind_param("i", $id_autorizado);
    $stmt_empresa_logueada->execute();
    $result_empresa_logueada = $stmt_empresa_logueada->get_result();
    $empresa_logueada = $result_empresa_logueada->fetch_assoc();
    $stmt_empresa_logueada->close();

    if (!$empresa_logueada) {
        $_SESSION['mensaje_megusta'] = 'No se encontró tu empresa';
        $_SESSION['tipo_mensaje_megusta'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $empresa_id_logueada = intval($empresa_logueada['id']);

    // Validar que el ID de empresa objetivo sea válido
    if ($empresa_id_objetivo <= 0) {
        $_SESSION['mensaje_megusta'] = 'ID de empresa inválido';
        $_SESSION['tipo_mensaje_megusta'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Evitar que una empresa se dé "Me gusta" a sí misma
    if ($empresa_id_logueada === $empresa_id_objetivo) {
        $_SESSION['mensaje_megusta'] = 'No puedes dar Me Gusta a tu propia empresa';
        $_SESSION['tipo_mensaje_megusta'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Verificar que la empresa objetivo existe
    $sql_empresa = "SELECT id, nombre_empresa FROM empresas WHERE id = ?";
    $stmt_empresa = $conexion->prepare($sql_empresa);
    $stmt_empresa->bind_param("i", $empresa_id_objetivo);
    $stmt_empresa->execute();
    $result_empresa = $stmt_empresa->get_result();
    $empresa = $result_empresa->fetch_assoc();
    $stmt_empresa->close();

    if (!$empresa) {
        $_SESSION['mensaje_megusta'] = 'La empresa no existe';
        $_SESSION['tipo_mensaje_megusta'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Verificar si ya existe un "Me gusta" de esta empresa a la otra
    $sql_megusta_existente = "SELECT id FROM megusta WHERE id_empresa_votante = ? AND id_empresa_votada = ?";
    $stmt_megusta_existente = $conexion->prepare($sql_megusta_existente);
    $stmt_megusta_existente->bind_param("ii", $empresa_id_logueada, $empresa_id_objetivo);
    $stmt_megusta_existente->execute();
    $result_megusta_existente = $stmt_megusta_existente->get_result();
    $megusta_existente = $result_megusta_existente->fetch_assoc();
    $stmt_megusta_existente->close();

    if ($megusta_existente) {
        // Si ya existe, mostrar mensaje de error
        $_SESSION['mensaje_megusta'] = 'Ya has dado Me Gusta a esta empresa anteriormente';
        $_SESSION['tipo_mensaje_megusta'] = 'error';
    } else {
        // Si no existe, agregar el "Me gusta"
        $sql_insertar = "INSERT INTO megusta (id_empresa_votante, id_empresa_votada) VALUES (?, ?)";
        $stmt_insertar = $conexion->prepare($sql_insertar);
        $stmt_insertar->bind_param("ii", $empresa_id_logueada, $empresa_id_objetivo);
        
        if ($stmt_insertar->execute()) {
            $stmt_insertar->close();
            $_SESSION['mensaje_megusta'] = '¡Me gusta mandado con exito!';
            $_SESSION['tipo_mensaje_megusta'] = 'success';
        } else {
            $_SESSION['mensaje_megusta'] = 'Error al agregar el Me Gusta';
            $_SESSION['tipo_mensaje_megusta'] = 'error';
        }
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
exit;
?>