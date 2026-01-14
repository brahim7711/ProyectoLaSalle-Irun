<?php
require_once __DIR__ . '/../bd.php';

$directorio_subida = "../../resources/logos-empresas/";
$auth_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['confirmar'])) {


    $correo_decodificado = urldecode($_GET['correo']);
    // COMPROBAR SI YA ESTÁ REGISTRADA LA EMPRESA MEDIANTE EL EMAIL AUTORIZADO
    $stmt = $conexion->prepare("SELECT id_autorizado FROM empresas_autorizadas WHERE email_autorizado=? LIMIT 1");
    $stmt->bind_param('s', $correo_decodificado);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Obtener el id_autorizado
        $row = $result->fetch_assoc();
        $id_autorizado = $row['id_autorizado'];
        $stmt->close();

        // VERIFICAR SI LA EMPRESA YA ESTÁ REGISTRADA (existencia simple)
        $stmt = $conexion->prepare("SELECT 1 FROM empresas WHERE id_autorizado=? LIMIT 1");
        $stmt->bind_param('s', $id_autorizado);
        $stmt->execute();
        $result_check = $stmt->get_result();

        if ($result_check->num_rows > 0) {
            $auth_message = "<p class='error-message'>Error: Esta empresa ya está registrada.</p>";
            $stmt->close();
        } else {
            $stmt->close();

            $extension = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));

            $carpetaDestino = "../../resources/logos-empresas/";
            if (!file_exists($carpetaDestino)) {
                mkdir($carpetaDestino, 0777, true);
            }

            $nombreUnico = uniqid("img_", true) . "." . $extension;
            $rutaFinal = $carpetaDestino . $nombreUnico;

            if (!move_uploaded_file($_FILES['logo']['tmp_name'], $rutaFinal)) {
                $nombreUnico = null;
            }

            //Hash de la contraseña
            $password = hash("sha256", $_POST['contrasena_empresa']);

            //Pasar el link del meet de watch?v= a embed/
            $url = $_POST['spot_url'];
            if (strpos($url, "youtube.com/watch?v=") !== false) {
                $videoID = explode("&", explode("v=", $url)[1])[0];
                $link = "https://www.youtube.com/embed/" . $videoID;
            } elseif (strpos($url, "youtu.be/") !== false) {
                $videoID = explode("?", explode("youtu.be/", $url)[1])[0];
                $link = "https://www.youtube.com/embed/" . $videoID;
            }


            // SI ESTÁ AUTORIZADA, HACER EL INSERT EN LA TABLA empresas
            $stmt = $conexion->prepare("INSERT INTO empresas (id_autorizado, nombre_empresa, descripcion, logo_url, contrasena, web_url, spot_url, contacto_adicional, horario, meet_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                'ssssssssss',
                $id_autorizado,
                $_POST['nombre_empresa'],
                $_POST['descripcion'],
                $rutaFinal,
                $password,
                $_POST['web_url'],
                $link,
                $_POST['contacto_adicional'],
                $_POST['horario'],
                $_POST['meet_url']
            );

            if (!$stmt->execute()) {
                $auth_message = "<p class='error-message'>Error al registrar la empresa, intentelo mas tarde</p>";
                $stmt->close();
            } else {

                $id_empresa = $stmt->insert_id; // Obtener el ID de la empresa insertada
                $stmt->close();

                // OBTENER STANDS YA OCUPADOS
                // La columna que indica un stand ocupado es `empresa_id` (NULL si está vacío)
                $stmt = $conexion->prepare("SELECT stand_id FROM stands WHERE empresa_id IS NOT NULL");
                $stmt->execute();
                $result_stands = $stmt->get_result();
                $stands_ocupados = array();
                while ($row = $result_stands->fetch_assoc()) {
                    $stands_ocupados[] = $row['stand_id'];
                }
                $stmt->close();

                // GENERAR TODOS LOS STANDS POSIBLES Y BUSCAR UNO DISPONIBLE
                $STAD = null;
                $LetraStand = array('A', 'B', 'C', 'D', 'E', 'F');
                while ($STAD == null) {
                    $numero_aleatorio = rand(0, 5);
                    $numero_aleatorio2 = rand(1, 8);
                    for ($j = 1; $j <= 8; $j++) {
                        $stand_actual = $LetraStand[$numero_aleatorio] . $numero_aleatorio2;
                        if (!in_array($stand_actual, $stands_ocupados)) {
                            $STAD = $stand_actual;
                            break;
                        }
                    }
                }

                // VERIFICAR SI SE ENCONTRÓ UN STAND DISPONIBLE
                if ($STAD === null) {
                    $auth_message = "<p class='error-message'>Error: No hay stands disponibles en este momento.</p>";
                } else {
                    // ASIGNAR EL STAND EN LA FILA EXISTENTE: actualizar empresa_id para el stand seleccionado
                    $stmt = $conexion->prepare("UPDATE stands SET empresa_id = ? WHERE stand_id = ?");
                    $stmt->bind_param('is', $id_empresa, $STAD);

                    if ($stmt->execute()) {
                        $auth_message = "<p class='success-message'>¡Registro completado con éxito! Stand asignado: " . $STAD . "</p>";
                        sleep(seconds: 4);
                        header("Location: ../../index.php");
                    }
                    $stmt->close();
                }
            }
        }
    } else {
        $stmt->close();
        $auth_message = "<p class='error-message'>Error: La empresa no está autorizada para registrarse. Contacte con la administración.</p>";
    }
}
