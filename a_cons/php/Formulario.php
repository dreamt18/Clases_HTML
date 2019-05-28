
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset= "UTF-8">
	<!--Tamaño de la pantalla-->
	<title>TropicalBar</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
	<link rel="stylesheet" href="../css/letras.css">
	<link rel="stylesheet" href="../css/nav.css">
	<link rel="stylesheet" href="../css/estilo.css">
	
	
	<title> TropicalBar</title>
</head>
<body>
	<header>
		
 
		<nav>
			<ul>
				<li><a href="../index.php">Inicio </a></li>
				<li><a href="../php/Quienes_somos.php">Quienes somos</a></li>
				<li><a href="../php/Telefonos.php">Telefonos</a></li>
				<li><a href="../php/Correos_electronicos.php">Correos electronicos</a></li>
				<li><a href="../php/Formulario.php" >Formulario</a></li>
			</ul>
		</nav>
		</header>
		<!---------------------------------------------------------------------------->
		<?php  
		include('../php_code.php'); 

			if(isset($_GET['edit'])){
				$id = $_GET['edit'];
				$edit_state = true;
				$rec = mysqli_query($db,"SELECT * FROM info WHERE id=$id");
				$record = mysqli_fetch_array($rec);
				$nombre = $record['nombre'];
				$apellido = $record['apellido'];
				$cedula = $record['cedula'];
				$email = $record['email'];
				$interes = $record['interes'];
			}

		?>
		<br>
			<h1>Deje su información</h1>
		<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
		
		<?php if (isset($_SESSION['msg'])): ?>
			<div class="msg">
				<?php 
					echo $_SESSION['msg']; 
					unset($_SESSION['msg']);
				?>
			</div>
		<?php endif ?>
<table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Cedula</th>
			<th>Email</th>
			<th>Interes</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>
						<td><?php echo $row['nombre']; ?></td>
						<td><?php echo $row['apellido']; ?></td>
						<td><?php echo $row['cedula']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['interes']; ?></td>
						
						<td>
						<a href="./Formulario.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Editar</a>
					</td>
					<td>
						<a href="./Formulario.php?del=<?php echo $row['id']; ?>" class="del_btn">Borrar</a>
					</td>	
				</tr>
			
			<?php } ?>
</table>

		</div>
			
		<form method="post" action=" " >
		<input type="hidden" name="id" value="<?php echo $id;?>">
			<div class="input-group">
				<label>Nombre</label>
				<input type="text" name="nombre" value="<?php echo $nombre;?>">
			</div>
			<div class="input-group">
				<label>Apellido</label>
				<input type="text" name="apellido" value="<?php echo $apellido;?>">
			</div>
			<div class="input-group">
				<label>Cedula</label>
				<input type="text" name="cedula" value="<?php echo $cedula;?>">
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="text" name="email" value="<?php echo $email;?>">
			</div>
			<div class="input-group">
				<label>Interes</label>
				<input type="text" name="interes" value="<?php echo $interes;?>">
			</div>
			<div class="input-group">
				<?php if ($edit_state == false): ?>
					<button class="btn" type="submit" name="enviar" >Enviar</button>
			<?php else:?>
				<button class="btn" type="submit" name="update" >Update</button>
			<?php endif; ?>

			</div>
		</form>

		</div>
</body>
</html>