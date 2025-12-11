<?php
require_once __DIR__ . '/../bd.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = trim($_POST['dni']);
    $empresa_id = intval($_POST['empresa_id']);

    if (empty($dni)) {
        $_SESSION['mensaje_votacion'] = 'El DNI es obligatorio';
        $_SESSION['tipo_mensaje_votacion'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    if ($empresa_id <= 0) {
        $_SESSION['mensaje_votacion'] = 'ID de empresa inválido';
        $_SESSION['tipo_mensaje_votacion'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    if (!preg_match('/^[0-9]{8}[A-Za-z]{1}$/', $dni)) {
        $_SESSION['mensaje_votacion'] = 'Formato de DNI inválido. Debe ser 8 números seguidos de una letra';
        $_SESSION['tipo_mensaje_votacion'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $sql_inscripcion = "SELECT id FROM inscripciones WHERE dni = ?";
    $stmt_inscripcion = $conexion->prepare($sql_inscripcion);
    $stmt_inscripcion->bind_param("s", $dni);
    $stmt_inscripcion->execute();
    $result_inscripcion = $stmt_inscripcion->get_result();
    $inscripcion = $result_inscripcion->fetch_assoc();
    $stmt_inscripcion->close();

    if (!$inscripcion) {
        $_SESSION['mensaje_votacion'] = 'No estás inscrito en el evento. Solo las personas inscritas pueden votar';
        $_SESSION['tipo_mensaje_votacion'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $inscripcion_id = $inscripcion['id'];

    $sql_empresa = "SELECT id, nombre_empresa FROM empresas WHERE id = ?";
    $stmt_empresa = $conexion->prepare($sql_empresa);
    $stmt_empresa->bind_param("i", $empresa_id);
    $stmt_empresa->execute();
    $result_empresa = $stmt_empresa->get_result();
    $empresa = $result_empresa->fetch_assoc();
    $stmt_empresa->close();

    if (!$empresa) {
        $_SESSION['mensaje_votacion'] = 'La empresa no existe';
        $_SESSION['tipo_mensaje_votacion'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $sql_voto_existente = "SELECT id FROM votaciones WHERE inscripcion_id = ? AND empresa_id = ?";
    $stmt_voto_existente = $conexion->prepare($sql_voto_existente);
    $stmt_voto_existente->bind_param("ii", $inscripcion_id, $empresa_id);
    $stmt_voto_existente->execute();
    $result_voto_existente = $stmt_voto_existente->get_result();
    $stmt_voto_existente->close();

    if ($result_voto_existente->num_rows > 0) {
        $_SESSION['mensaje_votacion'] = 'Ya has votado por esta empresa anteriormente';
        $_SESSION['tipo_mensaje_votacion'] = 'error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $sql_votar = "INSERT INTO votaciones (inscripcion_id, empresa_id) VALUES (?, ?)";
    $stmt_votar = $conexion->prepare($sql_votar);
    $stmt_votar->bind_param("ii", $inscripcion_id, $empresa_id);

    if ($stmt_votar->execute()) {
        $stmt_votar->close();
        
        $_SESSION['mensaje_votacion'] = '¡Voto registrado con éxito!';
        $_SESSION['tipo_mensaje_votacion'] = 'success';
    } else {
        $_SESSION['mensaje_votacion'] = 'Error al registrar el voto. Inténtalo de nuevo';
        $_SESSION['tipo_mensaje_votacion'] = 'error';
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
?>
