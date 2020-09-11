<?php

	//Conectamos a la base de datos
	$enlace = mysqli_connect('localhost', 'oliver', 'clavijero', 'clavijero');

	//Revisamos la conexión
	if (!$enlace) {
		echo "Error de conexión: " . mysqli_connect_error();
	}
// ---------------------FRAGMENTACIÓN HORIZONTAL-------------------------
	$sqla = 'SELECT * FROM estudiante WHERE grupo = "A"';
	$sqlb = 'SELECT * FROM estudiante WHERE grupo = "B"';
	$sqlc = 'SELECT * FROM estudiante WHERE grupo = "C"';

	//ahora la solicitud por cada grupo.
	$horizontala = mysqli_query($enlace, $sqla);
	$horizontalb = mysqli_query($enlace, $sqlb);
	$horizontalc = mysqli_query($enlace, $sqlc);

	$estudiantesa = mysqli_fetch_all($horizontala, MYSQLI_ASSOC);
	$estudiantesb = mysqli_fetch_all($horizontalb, MYSQLI_ASSOC);
	$estudiantesc = mysqli_fetch_all($horizontalc, MYSQLI_ASSOC);


// ---------------------FRAGMENTACIÓN VERTICAL-------------------------	
	$sqlduno = 'SELECT matricula, nombre, dir, grupo FROM estudiante';
	$sqlddos = 'SELECT matricula, promedio, edad, sexo FROM estudiante';

	//Hacemos la solicitido a la BDD por cada fragmentación.
	$verticalduno = mysqli_query($enlace, $sqlduno);
	$verticalddos = mysqli_query($enlace, $sqlddos);

	$esuno = mysqli_fetch_all($verticalduno, MYSQLI_ASSOC);
	$esdos = mysqli_fetch_all($verticalddos, MYSQLI_ASSOC);
	
	mysqli_close($enlace);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<h2 class="text-center">Fragmentación Horizontal</h2>
	</div>	
	<!-- Grupo A -->
	<div class="container">
		<table class="table table-dark">
			<h3>Grupo A</h3>
			<div class="col">
				<thead>
					<th scope="col">Matrícula</th>
					<th scope="col">Nombre</th>
					<th scope="col">Dirección</th>
					<th scope="col">Grupo</th>
					<th scope="col">Promedio</th>
					<th scope="col">Edad</th>
					<th scope="col">Sexo</th>

				</thead>
				<?php foreach ($estudiantesa as $estudiante ) { ?>
					
					<tbody>
						<th scope="row"> <?php echo htmlspecialchars($estudiante['matricula']) ?> </th>
						<td> <?php echo htmlspecialchars($estudiante['nombre']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['dir']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['grupo']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['promedio']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['edad']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['sexo']) ?> </td>				
					</tbody>
				<?php } ?>

			</div>
		</table>
	</div>
	<div class="container">
	</div>	
	<!-- Grupo B -->
	<div class="container">
		<table class="table table-dark">
			<h3>Grupo B</h3>
			<div class="col">
				<thead>
					<th scope="col">Matrícula</th>
					<th scope="col">Nombre</th>
					<th scope="col">Dirección</th>
					<th scope="col">Grupo</th>
					<th scope="col">Promedio</th>
					<th scope="col">Edad</th>
					<th scope="col">Sexo</th>

				</thead>
				<?php foreach ($estudiantesb as $estudiante ) { ?>
					
					<tbody>
						<th scope="row"> <?php echo htmlspecialchars($estudiante['matricula']) ?> </th>
						<td> <?php echo htmlspecialchars($estudiante['nombre']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['dir']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['grupo']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['promedio']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['edad']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['sexo']) ?> </td>				
					</tbody>
				<?php } ?>

			</div>
		</table>
	</div>
	<!-- Grupo C -->
	<div class="container">
		<table class="table table-dark">
			<h3>Grupo C</h3>
			<div class="col">
				<thead>
					<th scope="col">Matrícula</th>
					<th scope="col">Nombre</th>
					<th scope="col">Dirección</th>
					<th scope="col">Grupo</th>
					<th scope="col">Promedio</th>
					<th scope="col">Edad</th>
					<th scope="col">Sexo</th>

				</thead>
				<?php foreach ($estudiantesc as $estudiante ) { ?>
					
					<tbody>
						<th scope="row"> <?php echo htmlspecialchars($estudiante['matricula']) ?> </th>
						<td> <?php echo htmlspecialchars($estudiante['nombre']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['dir']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['grupo']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['promedio']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['edad']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['sexo']) ?> </td>				
					</tbody>
				<?php } ?>

			</div>
		</table>
	</div>
	<br>

<!-- Fragmentación Vertical -->
	<div class="container">
		<h2 class="text-center">Fragmentación Vertical</h2>
	</div>
	<!-- Departamento Dos -->
	<div class="container">
		<table class="table table-dark">
			<h3>Departamento Dos</h3>
			<div class="col">
				<thead>
					<th scope="col">Matrícula</th>
					<th scope="col">Nombre</th>
					<th scope="col">Dirección</th>
					<th scope="col">Grupo</th>
				</thead>
				<?php foreach ($esuno as $estudiante ) { ?>
					
					<tbody>
						<th scope="row"> <?php echo htmlspecialchars($estudiante['matricula']) ?> </th>
						<td> <?php echo htmlspecialchars($estudiante['nombre']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['dir']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['grupo']) ?> </td>
					</tbody>
				<?php } ?>

			</div>
		</table>
	</div>
	<!-- Departamento 2 -->
	<div class="container">
		<table class="table table-dark">
			<h3>Departamento Dos</h3>
			<div class="col">
				<thead>
					<th scope="col">Matrícula</th>
					<th scope="col">Promedio</th>
					<th scope="col">Edad</th>
					<th scope="col">Sexo</th>

				</thead>
				<?php foreach ($esdos as $estudiante ) { ?>
					
					<tbody>
						<th scope="row"> <?php echo htmlspecialchars($estudiante['matricula']) ?> </th>
						<td> <?php echo htmlspecialchars($estudiante['promedio']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['edad']) ?> </td>
						<td> <?php echo htmlspecialchars($estudiante['sexo']) ?> </td>				
					</tbody>
				<?php } ?>

			</div>
		</table>
	</div>
	<br>
</body>
</html>