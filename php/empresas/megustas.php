<?php
require_once __DIR__ . '/../bd.php';

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar que haya una sesión activa y que sea de tipo empresa
if (!isset($_SESSION['idUsuario']) || !isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'empresa') {
    header("Location: ../../inicioSesion/inicioGeneral.html");
    exit;
}

$id_autorizado = intval($_SESSION['idUsuario']);

// Obtener el ID de la empresa logueada desde la tabla empresas usando id_autorizado
$sql_empresa_logueada = "SELECT id, nombre_empresa FROM empresas WHERE id_autorizado = ?";
$stmt_empresa_logueada = $conexion->prepare($sql_empresa_logueada);
$stmt_empresa_logueada->bind_param("i", $id_autorizado);
$stmt_empresa_logueada->execute();
$result_empresa_logueada = $stmt_empresa_logueada->get_result();
$empresa_logueada = $result_empresa_logueada->fetch_assoc();
$stmt_empresa_logueada->close();

if (!$empresa_logueada) {
    echo "No se encontró tu empresa";
    exit;
}

$empresa_id_logueada = intval($empresa_logueada['id']);
$nombre_empresa_logueada = htmlspecialchars($empresa_logueada['nombre_empresa']);

// Obtener todos los me gusta que ha recibido esta empresa
$sql_megustas = "
    SELECT 
        e.id,
        e.nombre_empresa
    FROM megusta m
    INNER JOIN empresas e ON m.id_empresa_votante = e.id
    WHERE m.id_empresa_votada = ?
    ORDER BY e.nombre_empresa ASC
";

$stmt_megustas = $conexion->prepare($sql_megustas);
$stmt_megustas->bind_param("i", $empresa_id_logueada);
$stmt_megustas->execute();
$result_megustas = $stmt_megustas->get_result();
$empresas_megusta = [];

while ($row = $result_megustas->fetch_assoc()) {
    $empresas_megusta[] = $row;
}

$stmt_megustas->close();
?>

<?php if (empty($empresas_megusta)): ?>
    <p class="text-muted">Aún no has recibido Me Gusta de ninguna empresa.</p>
<?php else: ?>
    <table class="table table-hover">
        <tbody>
            <?php foreach ($empresas_megusta as $empresa): ?>
                <tr>
                    <td>
                        <strong><?php echo htmlspecialchars($empresa['nombre_empresa']); ?></strong>
                    </td>
                    <td>
                        <a href="../empresas/ver-empresa.php?id=<?php echo intval($empresa['id']); ?>" 
                           class="btn btn-sm btn-primary">
                            <i class="bi bi-eye"></i> Ver
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>