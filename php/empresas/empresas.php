<?php
include_once __DIR__ . '/../bd.php';
$sql = "SELECT nombre_empresa, id, logo_url FROM empresas";
$result = $conexion->query($sql);
if ($result && $result->num_rows > 0) {
    echo '<div class="empresas-grid">';
    while ($row = $result->fetch_assoc()) {
        $empresaNombre = htmlspecialchars($row['nombre_empresa'], ENT_QUOTES, 'UTF-8');
        $empresaId = (int) $row['id'];
        // Limpiar la ruta y ajustarla para que sea relativa a la página que incluye este archivo
        $logoUrl = trim($row['logo_url'], '"');
        // Si la ruta empieza con ../../ (relativa desde php/empresas/), la ajustamos a ../
        $logoUrl = str_replace('../../', '../', $logoUrl);
        echo '<div class="empresa-card" onclick="window.location.href=\'../empresas/ver-empresa.php?id=' . $empresaId . '\'" style="background-image: url(\'' . htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8') . '\');">
                                <div class="empresa-overlay">
                                    <h3 class="empresa-nombre">' . $empresaNombre . '</h3>
                                </div>
                              </div>';
    }
    echo '</div>';
    $result->free();
}
?>