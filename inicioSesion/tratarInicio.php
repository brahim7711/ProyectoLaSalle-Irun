<?php
include '../php/bd.php';
require 'funcionRecoge.php';

$correo = recoge("correo", "");
$contra = recoge("contrasena", "");

if ($correo == "" || $contra == "") {
    header("Location: InicioSesionEmpresa.html?error=1");
    exit;
}

// Buscar en empresas_autorizadas
$sqlAuth = "SELECT id_autorizado FROM empresas_autorizadas WHERE email_autorizado = ?";
$stmtAuth = $conexion->prepare($sqlAuth);
if (!$stmtAuth) {
    die("Error SQL empresas_autorizadas: " . $conexion->error);
}
$stmtAuth->bind_param("s", $correo);
$stmtAuth->execute();
$resultAuth = $stmtAuth->get_result();

if ($resultAuth->num_rows !== 1) {
    header("Location: inicioGeneral.html?error=3"); // Correo no autorizado
    exit;
}

$autorizada = $resultAuth->fetch_assoc();
$idEmpresa = $autorizada['id_autorizado'];

// Ahora buscamos la empresa en la tabla empresas
$sql = "SELECT id, nombre_empresa, contrasena FROM empresas WHERE id_autorizado = ?";
$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error SQL empresas: " . $conexion->error);
}
$stmt->bind_param("i", $idEmpresa);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    header("Location: inicioGeneral.html?error=4"); // Empresa no encontrada
    exit;
}

$usuario = $result->fetch_assoc();

// Verificar contraseña
if (hash("sha256", $contra) !== $usuario['contrasena']) {
    header("Location: inicioGeneral.html?error=2"); // Contraseña incorrecta
    exit;
}

// Crear sesión
session_start();
$_SESSION['idUsuario'] = $usuario['id'];
$_SESSION['nombre'] = $usuario['nombre_empresa'];
$_SESSION['correo'] = $correo;
$_SESSION['tipo'] = "empresa";

// Redirigir
header("Location: ../administrador/panel_admin.php");
exit;
