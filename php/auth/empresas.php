<?php
require_once __DIR__ . '/../bd.php';

$auth_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['check_email'])) {
    if (empty($_POST['correo'])) {
        $auth_message = "<p class='error-message'>El campo de correo está vacío</p>";
    } else {
        $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL); //filter_var para sanear el email
        $stmt = $conexion->prepare("SELECT * FROM empresas_autorizadas WHERE email_autorizado=?");
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;
        $empresa_autorizada = $result->fetch_assoc();
        $stmt->close();

        $count2 = 0;
        if ($empresa_autorizada) {
            $stmt = $conexion->prepare("SELECT * FROM empresas WHERE id_autorizado=? LIMIT 1");
            $stmt->bind_param('i', $empresa_autorizada['id_autorizado']);
            $stmt->execute();
            $result = $stmt->get_result();
            $count2 = $result->num_rows;
            $stmt->close();
        }

        if ($count2 > 0) {
            $auth_message = "<p class='error-message'>El correo electrónico ya está registrado.</p>";
        } else{
            if ($count > 0) {
                $auth_message = "<p class='success-message'>El correo electrónico está autorizado. Puede proceder con el registro.</p>";
                header("Location: ./registro_empresas.php?correo=" . urlencode($correo));
                exit();
            } else {
                $auth_message = "<p class='error-message'>El correo electrónico no está autorizado.</p>";
            }
        }
    }
}
?>