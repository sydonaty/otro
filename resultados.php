<?php
include('modelos/Conexion.php');
session_start();

$conexion = Conexion::conectar(); // Asumiendo que esta línea establece la conexión
if (!$conexion) {
    die("La conexión a la base de datos falló");
}
$conn = new mysqli('servidor', 'nombre_de_usuario', 'contraseña', 'tecnocell');

// Verificar si hay algún error en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener las respuestas del formulario almacenadas en la sesión
$precio_venta = $_SESSION['precio_venta'];
$Procesador = $_SESSION['Procesador'];
$RAM = $_SESSION['RAM'];
$Almacenamiento = $_SESSION['Almacenamiento'];
$Camara = $_SESSION['Camara'];
$Pantalla = $_SESSION['Pantalla'];

// Construir la consulta SQL
$sql = "SELECT * FROM Productos WHERE 1";

if ($precio_venta != '') {
    $sql .= " AND Precio <= '$precio_venta'";
}

if (!empty($Procesador)) {
    $sql .= " AND Procesador IN ('" . implode("', '", $Procesador) . "')";
}

if (!empty($RAM)) {
    $sql .= " AND RAM IN ('" . implode("', '", $RAM) . "')";
}

if (!empty($Almacenamiento)) {
    $sql .= " AND Almacenamiento IN ('" . implode("', '", $Almacenamiento) . "')";
}

if (!empty($Camara)) {
    $sql .= " AND Camara IN ('" . implode("', '", $Camara) . "')";
}

if (!empty($Pantalla)) {
    $sql .= " AND Pantalla IN ('" . implode("', '", $Pantalla) . "')";
}

/// Ejecuta la consulta SQL
$query = mysqli_query($conn, $sql);


// Verifica si hubo algún error en la consulta
if (!$query) {
    die("Error en la consulta: " . mysqli_error($conn));
}

// Mostrar los resultados
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["ID"] . " - Nombre: " . $fila["Nombre"] . "<br>";
    }
} else {
    echo "No se encontraron resultados";
}

// Cerrar la conexión
$conexion->close();
?>