<?php
include_once __DIR__ . '/../bd.php';

$sql = "SELECT e.id, e.nombre_empresa, e.logo_url, COUNT(v.id) as total_votos 
        FROM empresas e 
        LEFT JOIN votaciones v ON e.id = v.empresa_id 
        GROUP BY e.id, e.nombre_empresa, e.logo_url 
        ORDER BY total_votos DESC, e.nombre_empresa ASC
        LIMIT 10";
$result = $conexion->query($sql);

if ($result && $result->num_rows > 0) {
    echo '<h2 class="ranking-title">Empresas Más Votadas</h2>';
    echo '<div class="ranking-container">';
    
    $posicion = 1;
    while ($row = $result->fetch_assoc()) {
        
        $logoUrl = trim($row['logo_url'], '"');
        $logoUrl = str_replace('../../', '../', $logoUrl);
        
        // Clase según posición
        $claseRanking = '';
        if ($posicion == 1) {
            $claseRanking = 'ranking-oro';
        } elseif ($posicion == 2) {
            $claseRanking = 'ranking-plata';
        } else {
            $claseRanking = 'ranking-bronce';
        }
        
        if($posicion > 3){
            $claseRanking = 'ranking-normal';
        }

                echo '<div class="ranking-card ' . $claseRanking . '" onclick="window.location.href=\'ver-empresa.php?id=' . $row['id'] . '\'">'
                                . '<div class="ranking-position">' . $posicion . '</div>'
                                . '<div class="ranking-logo" style="background-image: url(\'' . htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8') . '\');"></div>'
                                . '<div class="ranking-info">'
                                        . '<h3 class="ranking-empresa">' . htmlspecialchars($row['nombre_empresa'], ENT_QUOTES, 'UTF-8') . '</h3>'
                                        . '<p class="ranking-votos">' . $row['total_votos'] . ' ' . ($row['total_votos'] == 1 ? 'voto' : 'votos') . '</p>'
                                . '</div>'
                            . '</div>';
        
        $posicion++;
        
    }
    
    echo '</div>';
    $result->free();
} else {
    echo '<p style="text-align: center; color: #666; font-size: 1.1rem;">No hay empresas registradas para mostrar el ranking.</p>';
}
?>
