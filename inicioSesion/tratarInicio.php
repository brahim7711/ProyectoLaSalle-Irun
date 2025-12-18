<?php
include '../php/bd.php';
require 'funcionRecoge.php';

$correo = recoge("correo", "");
$contra = recoge("contrasena", "");

if ($correo == "" || $contra == "") {
    header("Location: InicioSesionEmpresa.html?error=1");
    exit;
}

$tipo = null;


$sqlAuth = "SELECT id_autorizado FROM empresas_autorizadas WHERE email_autorizado = ?";
$stmtAuth = $conexion->prepare($sqlAuth);
$stmtAuth->bind_param("s", $correo);
$stmtAuth->execute();
$resultAuth = $stmtAuth->get_result();

if ($resultAuth->num_rows === 1) {

    $autorizada = $resultAuth->fetch_assoc();
    $idEmpresa = $autorizada['id_autorizado'];

    $sql = "SELECT id_autorizado, nombre_empresa, contrasena FROM empresas WHERE id_autorizado = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idEmpresa);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        if (hash("sha256", $contra) === $usuario['contrasena']) {
            $tipo = "empresa";

            session_start();
            $_SESSION['idUsuario'] = $usuario['id_autorizado'];
            $_SESSION['nombre'] = $usuario['nombre_empresa'];
            $_SESSION['correo'] = $correo;
            $_SESSION['tipo'] = $tipo;

            header("Location: ../perfilEmpresa/paginaPrivada.php");
            exit;
        }
    }

} else {


    $sqlAdmin = "SELECT id, email, password FROM administradores WHERE email = ?";
    $stmtAdmin = $conexion->prepare($sqlAdmin);
    $stmtAdmin->bind_param("s", $correo);
    $stmtAdmin->execute();
    $resultAdmin = $stmtAdmin->get_result();

    if ($resultAdmin->num_rows === 1) {
        $admin = $resultAdmin->fetch_assoc();

        if (hash("sha256", $contra) === $admin['password']) {
            $tipo = "administrador";

            session_start();
            $_SESSION['idUsuario'] = $admin['id'];
            $_SESSION['nombre'] = $admin['email'];
          
            $_SESSION['tipo'] = $tipo;

            header("Location: ../administrador/panel_admin.php");
            exit;
        }
    }
}



header("Location: inicioGeneral.html?error=2");
exit;
