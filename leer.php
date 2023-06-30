<!DOCTYPE html>
<html>
<head>
    <title>Leer Datos</title>
</head>
<body>
<center><h1 style="color: green">Leer Datos de los Vehiculos</h1></center>
</body>
</html>





<?php
$host = "localhost";
$usuario = "root";
$contraseña = "";
$db = "vehiculos";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db", $usuario, $contraseña);

    // Preparar y ejecutar la consulta SELECT
    $sentenciaSQL = $conexion->prepare("SELECT * FROM `registro`");
    $sentenciaSQL->execute();

    // Obtener los resultados de la consulta
    $resultados = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

    // Imprimir los resultados en una tabla HTML con estilos CSS
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background-color: #87ceeb;'>";
    echo "<th style='border: 3px solid #21333a; padding: 8px;'>ID</th>";
    echo "<th style='border: 3px solid #21333a; padding: 8px;'>Modelo</th>";
    echo "<th style='border: 3px solid #21333a; padding: 8px;'>Marca</th>";
    echo "<th style='border: 3px solid #21333a; padding: 8px;'>ID del motor</th>";
    echo "<th style='border: 3px solid #21333a; padding: 8px;'>Color</th>";
    echo "<th style='border: 3px solid #21333a; padding: 8px;'>Número de Asientos</th>";
    echo "<th style='border: 3px solid #21333a; padding: 8px;'>Placa</th>";
    echo "</tr>";
    foreach ($resultados as $fila) {
        echo "<tr style='border: 3px solid #3e8e41;'>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'>" . $fila['id'] . "</td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'>" . $fila['modelo'] . "</td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'>" . $fila['marca'] . "</td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'>" . $fila['id del motor'] . "</td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'>" . $fila['color'] . "</td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'>" . $fila['num de asientos'] . "</td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'>" . $fila['placa'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $conexion = null;

} catch (PDOException $ex) {
    echo "<p style='color:red'>Error al conectar a la base de datos: " . $ex->getMessage() . "</p>";
}
?>
<li><a href="web.html">Menu Principal</a></li>