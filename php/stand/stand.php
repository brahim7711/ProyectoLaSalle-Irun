<div class="mapa-stands">

            <?php
            include_once __DIR__ . '/../bd.php';
            ?>

            <?php
            // Consulta para obtener los stands ocupados (tabla stands, columna stand_id)
            $ocupados = [];
            $sql = "SELECT stand_id FROM stands WHERE empresa_id IS NOT NULL";
            $result = $conexion->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $ocupados[] = $row['stand_id'];
                }
                $result->free();
            } else {
                error_log('Error al consultar stands ocupados: ' . $conexion->error);
            }

            // Renderizar la fila A (manteniendo la estructura original)
            for ($i = 1; $i <= 8; $i++) {
                $stand = "A" . $i;
                if (in_array($stand, $ocupados)) {
                    $sql="SELECT e.logo_url FROM stands s INNER JOIN empresas e ON s.empresa_id = e.id WHERE s.stand_id='$stand' LIMIT 1";
                    $resultadologo=$conexion->query($sql);
                    if ($resultadologo && $row = $resultadologo->fetch_assoc()) {
                        $logoUrl = trim($row['logo_url'], '"');
                        $logoUrl = str_replace('../../', '../', $logoUrl);
                        echo '<div class="stand ocupado" data-stand="' . $stand . '" onclick="irAEmpresa(\'' . $stand . '\')" style="background-image: url(\'' . htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8') . '\');"></div>';
                    } else {
                        echo '<div class="stand ocupado" data-stand="' . $stand . '" onclick="irAEmpresa(\'' . $stand . '\')">' . $stand . '</div>';
                    }
                } else {
                    echo '<div class="stand vacio" data-stand="' . $stand . '">' . $stand . '</div>';
                }
            }
            ?>
            
            <!-- Pasillo horizontal -->
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            
            <?php

            // Consulta para obtener los stands ocupados (tabla stands, columna stand_id)
            $ocupados = [];
            $sql = "SELECT stand_id FROM stands WHERE empresa_id IS NOT NULL";
            $result = $conexion->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $ocupados[] = $row['stand_id'];
                }
                $result->free();
            } else {
                error_log('Error al consultar stands ocupados: ' . $conexion->error);
            }

            // Renderizar la fila B (manteniendo la estructura original)
             for ($i = 1; $i <= 8; $i++) {
                $stand = "B" . $i;
                if (in_array($stand, $ocupados)) {
                    $sql="SELECT e.logo_url FROM stands s INNER JOIN empresas e ON s.empresa_id = e.id WHERE s.stand_id='$stand' LIMIT 1";
                    $resultadologo=$conexion->query($sql);
                    if ($resultadologo && $row = $resultadologo->fetch_assoc()) {
                        $logoUrl = trim($row['logo_url'], '"');
                        $logoUrl = str_replace('../../', '../', $logoUrl);
                        echo '<div class="stand ocupado" data-stand="' . $stand . '" onclick="irAEmpresa(\'' . $stand . '\')" style="background-image: url(\'' . htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8') . '\');"></div>';
                    } else {
                        echo '<div class="stand ocupado" data-stand="' . $stand . '" onclick="irAEmpresa(\'' . $stand . '\')">' . $stand . '</div>';
                    }
                } else {
                    echo '<div class="stand vacio" data-stand="' . $stand . '">' . $stand . '</div>';
                }
            }
            ?>
            
            <!-- Pasillo vertical central -->
            <div class="pasillo vertical"></div>
            <div class="pasillo vertical"></div>
            <div class="pasillo vertical"></div>
            <div class="pasillo vertical"></div>
            <div class="pasillo vertical"></div>
            <div class="pasillo vertical"></div>
            <div class="pasillo vertical"></div>
            <div class="pasillo vertical"></div>
            
            <?php

            // Consulta para obtener los stands ocupados (tabla stands, columna stand_id)
            $ocupados = [];
            $sql = "SELECT stand_id FROM stands WHERE empresa_id IS NOT NULL";
            $result = $conexion->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $ocupados[] = $row['stand_id'];
                }
                $result->free();
            } else {
                error_log('Error al consultar stands ocupados: ' . $conexion->error);
            }

            // Renderizar la fila C (manteniendo la estructura original)
            for ($i = 1; $i <= 8; $i++) {
                $stand = "C" . $i;
                if (in_array($stand, $ocupados)) {
                    $sql="SELECT e.logo_url FROM stands s INNER JOIN empresas e ON s.empresa_id = e.id WHERE s.stand_id='$stand' LIMIT 1";
                    $resultadologo=$conexion->query($sql);
                    if ($resultadologo && $row = $resultadologo->fetch_assoc()) {
                        $logoUrl = trim($row['logo_url'], '"');
                        $logoUrl = str_replace('../../', '../', $logoUrl);
                        echo '<div class="stand ocupado" data-stand="' . $stand . '" onclick="irAEmpresa(\'' . $stand . '\')" style="background-image: url(\'' . htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8') . '\');"></div>';
                    } else {
                        echo '<div class="stand ocupado" data-stand="' . $stand . '" onclick="irAEmpresa(\'' . $stand . '\')">' . $stand . '</div>';
                    }
                } else {
                    echo '<div class="stand vacio" data-stand="' . $stand . '">' . $stand . '</div>';
                }
            }
            ?>

            <!-- Pasillo horizontal -->
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>
            <div class="pasillo horizontal"></div>

            <?php
            // Consulta para obtener los stands ocupados (tabla stands, columna stand_id)
            $ocupados = [];
            $sql = "SELECT stand_id FROM stands WHERE empresa_id IS NOT NULL";
            $result = $conexion->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $ocupados[] = $row['stand_id'];
                }
                $result->free();
            } else {
                error_log('Error al consultar stands ocupados: ' . $conexion->error);
            }

            // Renderizar la fila D (manteniendo la estructura original)
             for ($i = 1; $i <= 8; $i++) {
                $stand = "D" . $i;
                if (in_array($stand, $ocupados)) {
                    $sql="SELECT e.logo_url FROM stands s INNER JOIN empresas e ON s.empresa_id = e.id WHERE s.stand_id='$stand' LIMIT 1";
                    $resultadologo=$conexion->query($sql);
                    if ($resultadologo && $row = $resultadologo->fetch_assoc()) {
                        $logoUrl = trim($row['logo_url'], '"');
                        $logoUrl = str_replace('../../', '../', $logoUrl);
                        echo '<div class="stand ocupado" data-stand="' . $stand . '" onclick="irAEmpresa(\'' . $stand . '\')" style="background-image: url(\'' . htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8') . '\');"></div>';
                    } else {
                        echo '<div class="stand ocupado" data-stand="' . $stand . '" onclick="irAEmpresa(\'' . $stand . '\')">' . $stand . '</div>';
                    }
                } else {
                    echo '<div class="stand vacio" data-stand="' . $stand . '">' . $stand . '</div>';
                }
            }
            ?>
        </div>
        