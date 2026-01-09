<?php
require_once __DIR__ . '/../bd.php';

// Iniciar sesión para almacenar mensajes temporales
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['idUsuario'])) {

    $idUsuario = $_SESSION['idUsuario'];
    $nombre = $_SESSION['nombre'];
    $tipo = $_SESSION['tipo'];
}

$mensaje = '';
$tipo_mensaje = '';
$enviar_email = false;
$datos_email = [];

// Verificar si hay mensajes en la sesión
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    $tipo_mensaje = $_SESSION['tipo_mensaje'];
    $enviar_email = $_SESSION['enviar_email'] ?? false;
    $datos_email = $_SESSION['datos_email'] ?? [];
    
    // Limpiar los mensajes de la sesión después de mostrarlos
    unset($_SESSION['mensaje']);
    unset($_SESSION['tipo_mensaje']);
    unset($_SESSION['enviar_email']);
    unset($_SESSION['datos_email']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aceptar']) && !empty($_POST["aceptar"])) {
    
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $correo = trim($_POST['correo']);
    $nombreCompleto = $nombre . ' ' . $apellidos;

    // Validar que el correo no esté ya registrado
    $stmt = $conexion->prepare("SELECT COUNT(*) FROM inscripciones WHERE email = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $_SESSION['mensaje'] = 'El correo electrónico ya están registrados.';
        $_SESSION['tipo_mensaje'] = 'error';
        $_SESSION['enviar_email'] = false;
    } else {
        // Insertar el nuevo inscrito en la base de datos
        $stmt = $conexion->prepare("INSERT INTO inscripciones (nombre, apellidos, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $apellidos, $correo);

        if ($stmt->execute()) {
            $_SESSION['mensaje'] = 'Inscripción realizada con éxito. Te hemos enviado un correo de confirmación.';
            $_SESSION['tipo_mensaje'] = 'success';
            $_SESSION['enviar_email'] = true;
            $_SESSION['datos_email'] = [
                'nombre' => $nombreCompleto,
                'email' => $correo
            ];
        } else {
            $_SESSION['mensaje'] = 'Error al realizar la inscripción. Por favor, inténtalo de nuevo.';
            $_SESSION['tipo_mensaje'] = 'error';
            $_SESSION['enviar_email'] = false;
        }

        $stmt->close();
    }
    
    // Redirigir para evitar reenvío del formulario (patrón POST-REDIRECT-GET)
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>
