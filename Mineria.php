<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Encuesta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .producto {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .producto img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php
require('modelos/Conexion.php');

// Comprobar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexion = Conexion::conectar();
    if (!$conexion) {
        die("La conexión a la base de datos falló");
    }

    // Obtén respuestas del formulario
    $precio_venta = $_POST["precio_venta"];
    $Procesador = isset($_POST["Procesador"]) ? $_POST["Procesador"] : [];
    $RAM = isset($_POST["RAM"]) ? $_POST["RAM"] : [];
    $Almacenamiento = isset($_POST["Almacenamiento"]) ? $_POST["Almacenamiento"] : [];
    $Camara = isset($_POST["Camara"]) ? $_POST["Camara"] : [];
    $Pantalla = isset($_POST["Pantalla"]) ? $_POST["Pantalla"] : [];

    $sql = "SELECT * FROM productos";

    // Agrega condiciones adicionales según las respuestas de los checkboxes
    $conditions = [];

    if (!empty($Procesador)) {
        $conditions[] = "Procesador = :Procesador";
    }

    if (!empty($RAM)) {
        $conditions[] = "RAM = :RAM";
    }

    if (!empty($Almacenamiento)) {
        $conditions[] = "Almacenamiento = :Almacenamiento";
    }

    if (!empty($Camara)) {
        $conditions[] = "Camara = :Camara";
    }

    if (!empty($Pantalla)) {
        $conditions[] = "Pantalla = :Pantalla";
    }

    // Combina las condiciones usando AND
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    // Preparar la consulta
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros según las condiciones
    if (!empty($Procesador)) {
        $stmt->bindParam(':Procesador', $Procesador[0]);
    }

    if (!empty($RAM)) {
        $stmt->bindParam(':RAM', $RAM[0]);
    }

    if (!empty($Almacenamiento)) {
        $stmt->bindParam(':Almacenamiento', $Almacenamiento[0]);
    }

    if (!empty($Camara)) {
        $stmt->bindParam(':Camara', $Camara[0]);
    }

    if (!empty($Pantalla)) {
        $stmt->bindParam(':Pantalla', $Pantalla[0]);
    }

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener todos los resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $rowCount = $stmt->rowCount(); // Obtener el número de filas

     if ($rowCount > 0) {
        // Mostrar los detalles de los productos encontrados
        echo "<h1>Tecnocell te recomienda:</h1>";

        foreach ($resultados as $producto) {
            echo "<div class='producto'>";
            echo "<h3>" . $producto['descripcion'] . "</h3>";
            echo "<img src='" . $producto['imagen'] . "' alt='Producto'>";
            // Aquí puedes agregar más detalles si los necesitas
            echo "</div>";
        }
    } else {
        echo "<h1>No se encontraron productos</h1>";
        echo "<p>Lo siento, no se encontraron productos que coincidan con tus preferencias.</p>";
    }
}
    ?>
</body>
</html>
