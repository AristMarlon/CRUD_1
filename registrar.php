<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sitio Web</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f0f0;
		}

		h1 {
			text-align: center;
		}

		label {
			display: block;
			margin-bottom: 10px;
		}

		input[type="text"],
		input[type="number"] {
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			width: 100%;
			margin-bottom: 20px;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			width: 100%;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body> 
	<form method="post" action="">
		<center><h1 style="color: green">Registre los Datos de los Vehiculos</h1></center>

		<center><label for="modelo">Modelo del Vehículo:</label></center>
		<input type="text" id="modelo" name="modelo" placeholder="Ingrese el modelo del Vehiculo" required>

		<center><label for="marca">Marca:</label></center>
		<input type="text" id="marca" name="marca" placeholder="Ingrese la marca del vehículo" required>

		<center><label for="idmotor">ID del Motor:</label></center>
		<input type="text" id="idmotor" name="idmotor" placeholder="Ingrese el ID del motor" required>

		<center><label for="color">Color:</label></center>
		<input type="text" id="color" name="color" placeholder="Ingrese el color del vehículo" required>

		<center><label for="num_asientos">Número de Asientos:</label></center>
		<input type="number" id="num_asientos" name="num_asientos" placeholder="Ingrese el número de asientos" required>

		<center><label for="placa">Placa:</label></center>
		<input type="text" id="placa" name="placa" placeholder="Ingrese la Placa" required>

		<input type="submit" value="Guardar" name="enviado">
	</form>

	<?php
	
	if (isset($_POST['enviado'])) {

		// Sanitize and validate the input values
		$modelo = filter_var($_POST["modelo"], FILTER_SANITIZE_STRING);
		$marca = filter_var($_POST["marca"], FILTER_SANITIZE_STRING);
		$idmotor = filter_var($_POST["idmotor"], FILTER_SANITIZE_STRING);
		$color = filter_var($_POST["color"], FILTER_SANITIZE_STRING);
		$num_asientos = filter_var($_POST["num_asientos"], FILTER_VALIDATE_INT);
		$placa = filter_var($_POST["placa"], FILTER_SANITIZE_STRING);

		
		if (!empty($modelo) && !empty($marca) && !empty($idmotor) && !empty($color) && !empty($num_asientos) && !empty($placa)) {

			
			$host = "localhost";
			$usuario = "root";
			$contraseña = "";
			$db = "vehiculos";

			try {
				$conexion = new PDO("mysql:host=$host;dbname=$db", $usuario, $contraseña);

				
				$sentenciaSQL = $conexion->prepare("INSERT INTO `registro` (`id`, `modelo`, `marca`, `id del motor`, `color`, `num de asientos`, `placa`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");
				$sentenciaSQL->execute([$modelo, $marca, $idmotor, $color, $num_asientos, $placa]);

				
				$conexion = null;

				echo "<p style='color:green'>Sincronizando con la base de datos.</p>";

			} catch (PDOException $ex) {
				echo "<p style='color:red'>Error al conectar a la base de datos: " . $ex->getMessage() . "</p>";
			}

		} else {
			
			echo "<p style='color:red'>Por favor, ingrese todos los datos requeridos.</p>";
		}

	}
	?>
	<li><a href="web.html">Menu Principal</a></li>
</body>
</html>