<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Datos</title>
</head>
<body>
<center><h1 style="color: green">Actualizar Datos de los Vehiculos</h1></center>
</body>
</html>



<?php
$host = "localhost";
$usuario = "root";
$contraseña = "";
$db = "vehiculos";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db", $usuario, $contraseña);

    if (isset($_POST['actualizar'])) {
        // Obtener los datos actualizados del formulario
        $id = $_POST['id'];
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $id_motor = $_POST['id_motor'];
        $color = $_POST['color'];
        $num_asientos = $_POST['num_asientos'];
        $placa = $_POST['placa'];

        // Actualizar los datos del registro
        $sentenciaSQL = $conexion->prepare("UPDATE registro SET modelo = :modelo, marca = :marca, `id del motor` = :id_motor, color = :color, `num de asientos` = :num_asientos, placa = :placa WHERE id = :id");
        $sentenciaSQL->bindParam(':modelo', $modelo);
        $sentenciaSQL->bindParam(':marca', $marca);
        $sentenciaSQL->bindParam(':id_motor', $id_motor);
        $sentenciaSQL->bindParam(':color', $color);
        $sentenciaSQL->bindParam(':num_asientos', $num_asientos);
        $sentenciaSQL->bindParam(':placa', $placa);
        $sentenciaSQL->bindParam(':id', $id);
        $sentenciaSQL->execute();

        echo "Registro actualizado correctamente.";
    }

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
    echo "<th style='border: 3px solid #21333a; padding: 8px;'>Acciones</th>";
    echo "</tr>";
    foreach ($resultados as $fila) {
        echo "<tr style='border: 3px solid #3e8e41;'>";
        echo "<form method='POST'>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'>" . $fila['id'] . "</td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'><input type='text' name='modelo' value='" . $fila['modelo'] . "'></td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'><input type='text' name='marca' value='" . $fila['marca'] . "'></td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'><input type='text' name='id_motor' value='" . $fila['id del motor'] . "'></td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'><input type='text' name='color' value='" . $fila['color'] . "'></td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'><input type='text' name='num_asientos' value='" . $fila['num de asientos'] . "'></td>";
       echo "<td style='border: 3px solid #21333a; padding: 8px;'><input type='text' name='placa' value='" . $fila['placa'] . "'></td>";
        echo "<td style='border: 3px solid #21333a; padding: 8px;'>";
        echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>";
        echo "<input type='submit' name='actualizar' value='Actualizar'>";
        echo "</td>";
        echo "</form>";
        echo "</tr>";
    }
    echo "</table>";
    $conexion = null;

} catch (PDOException $ex) {
    echo "<p style='color:red'>Error al conectar a la base de datos: " . $ex->getMessage() . "</p>";
}
?>
<li><a href="web.html">Menu Principal</a></li>