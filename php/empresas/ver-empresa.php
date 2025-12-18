<?php
include_once __DIR__ . '/../bd.php';


if (isset($_GET['id'])) {
    $sql = "SELECT * FROM empresas WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $_GET['id']);
} else if (isset($_GET['stand'])) {
    $sql = "SELECT e.* FROM empresas e JOIN stands s ON s.empresa_id = e.id WHERE s.stand_id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $_GET['stand']);
}
$stmt->execute();
$result = $stmt->get_result();
$empresa = $result->fetch_assoc();
$stmt->close();

if ($empresa) {
    // Limpiar la ruta y ajustarla para que sea relativa a la página que incluye este archivo
    $logoUrl = trim($empresa['logo_url'], '"');
    // Si la ruta empieza con ../../ (relativa desde php/empresas/), la ajustamos a ../
    $logoUrl = str_replace('../../', '../', $logoUrl);
    
    // Convertir URL de YouTube al formato embed
    $spotUrl = $empresa['spot_url'];
    if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $spotUrl, $id)) {
        $spotUrl = 'https://www.youtube.com/embed/' . $id[1];
    } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $spotUrl, $id)) {
        $spotUrl = 'https://www.youtube.com/embed/' . $id[1];
    }
    
    echo '<section class="primero" 
    style="
    background-image: url(\'' . htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8') . '\');
    background-size=50%;
    
    ">
            <h1>' . htmlspecialchars($empresa['nombre_empresa'], ENT_QUOTES, 'UTF-8') . '</h1>
          </section>
          
          <section class="segundo">
            <h2>Descripción</h2>
            <p>' . htmlspecialchars($empresa['descripcion'], ENT_QUOTES, 'UTF-8') . '</p>
          
            <div class="caja-datos-empresa">
              <div class="dato-empresas1">
                <h1>Video Spot</h1>
                <iframe src="' . htmlspecialchars($spotUrl, ENT_QUOTES, 'UTF-8') . '" 
                        title="Spot de ' . htmlspecialchars($empresa['nombre_empresa'], ENT_QUOTES, 'UTF-8') . '" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        referrerpolicy="strict-origin-when-cross-origin" 
                        allowfullscreen>
                </iframe>
                <h1>Datos de contacto</h1>
                <p>' . htmlspecialchars($empresa['contacto_adicional'], ENT_QUOTES, 'UTF-8') . '</p>
                <p>Web: <a href="' . htmlspecialchars($empresa['web_url'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($empresa['web_url'], ENT_QUOTES, 'UTF-8') . '</a></p>
              </div>
              <div class="dato-empresas2">
                <h1>Horario</h1>
                <p>' . htmlspecialchars($empresa['horario'], ENT_QUOTES, 'UTF-8') . '</p>
                <h3>Enlace Meet:</h3>
                <p><a href="' . htmlspecialchars($empresa['meet_url'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($empresa['meet_url'], ENT_QUOTES, 'UTF-8') . '</a></p>
              </div>
            </div>
          </section>';
} else {
    echo '<section class="primero">
            <h1>Empresa no encontrada</h1>
          </section>';
}





?>