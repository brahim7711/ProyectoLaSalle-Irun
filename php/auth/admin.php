<?php
require_once __DIR__ . '/../bd.php';

if (!empty($_POST['aceptar'])) {
    if (empty($_POST['username']) and empty($_POST['password'])) {
       echo "Los Campos estas vacios"; 
    } else{
        $usuario = $_POST["username"];
        $contraseña = hash("sha256",$_POST["password"]);

        $stmt = $conexion->prepare("SELECT * FROM administradores WHERE email=? AND password=?");

        $stmt->bind_param('ss', $usuario, $contraseña);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($datos = $result->fetch_object()) {
            session_start();
            //PASAMOS LOS DATOS A LA SESION ASI PODEMOS UTILIZARLOS EN OTRAS PAGINAS Y TAMBIEN PARA VALIDAR SI ESTA LOGEADO
            $_SESSION['admin_logeado'] = true;
            $_SESSION['admin_email'] = $usuario;
            header("Location: ../../administrador/panel_admin.php");
            exit();
        } else {
            echo "<div class='alerta1'>Aceso Denegado</div>";
        }
    }
        
}
?>