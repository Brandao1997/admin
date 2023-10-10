<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Registrarse</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Admon_Carpinteria/login/login.css">
	<script src="js/jquery-1.12.4-jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

	<?php

	require_once "./conexion/DBconect.php";

	if (isset($_REQUEST['btn_register'])) //comprueba el nombre del botón "btn_register" 

	{

		$username	= $_REQUEST['txt_username'];	//input nombre "txt_username"

		$email		= $_REQUEST['txt_email'];	//input nombre "txt_email"

		$password	= $_REQUEST['txt_password'];	//input nombre "txt_password"

		$role		= $_REQUEST['txt_role'];	//seleccion nombre "txt_role"



		if (empty($username)) {
			echo '<div class="alert alert-danger" role="alert">Ingrese su usuario!</div>';	//Comprueba input nombre de usuario no vacío

		} else if (empty($email)) {

			echo '<div class="alert alert-danger" role="alert">Ingrese su correo!</div>';		//Revisar email input no vacio

		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			echo '<div class="alert alert-danger" role="alert">Ingrese email valido!</div>';
		} else if (empty($password)) {
			echo '<div class="alert alert-danger" role="alert">Ingrese password!</div>';
			//Revisar password vacio o nulo

		} else if (strlen($password) < 6) {
			echo '<div class="alert alert-danger" role="alert">Password minimo 6 caracteres!</div>';
			//Revisar password 6 caracteres

		} else if (empty($role)) {
			echo '<div class="alert alert-danger" role="alert">Seleccione rol!</div>';
			//Revisar etiqueta select vacio
		} else {

			try {

				$select_stmt = $db->prepare("SELECT username, email FROM mainlogin 

										WHERE username=:uname OR email=:uemail"); // consulta sql

				$select_stmt->bindParam(":uname", $username);

				$select_stmt->bindParam(":uemail", $email);      //parámetros de enlace

				$select_stmt->execute();

				$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

				if ($row["username"] == $username) {

					$errorMsg[] = "Usuario ya existe";	//Verificar usuario existente

				} else if ($row["email"] == $email) {

					$errorMsg[] = "Email ya existe";	//Verificar email existente

				} else if (!isset($errorMsg)) {

					$insert_stmt = $db->prepare("INSERT INTO mainlogin(username,email,password,role) VALUES(:uname,:uemail,:upassword,:urole)"); //Consulta sql de insertar			

					$insert_stmt->bindParam(":uname", $username);

					$insert_stmt->bindParam(":uemail", $email);	  		//parámetros de enlace 

					$insert_stmt->bindParam(":upassword", $password);

					$insert_stmt->bindParam(":urole", $role);
					if ($insert_stmt->execute()) {

						$registerMsg = "Registro exitoso: Esperar página de inicio de sesión"; //Ejecuta consultas 
						header("refresh:1;index.php"); //Actualizar despues de 1 segundo a la portada
					}
				}
			} catch (PDOException $e) {

				echo $e->getMessage();
			}
		}
	}

	?>

	<div class="wrapper">
		<div class="container">
			<div class="col-lg-12">

				<?php

				if (isset($errorMsg)) {
					foreach ($errorMsg as $error) {
				?>
						<div class="alert alert-danger">
							<strong>INCORRECTO ! <?php echo $error; ?></strong>
						</div>

					<?php
					}
				}

				if (isset($registerMsg)) {
					?>
					<div class="alert alert-success">
						<strong>EXITO ! <?php echo $registerMsg; ?></strong>
					</div>
				<?php

				}
				?>

				<div class="login-form">
					<div class="login-image">
						<img src="img/muebles.jpg" alt="mueble" class="image">
					</div>

					<form method="post" class="form-horizontal">
						<center>
							<h2>Registrar</h2>
						</center>
						<div class="form-group">
							<label class="col-sm-9 text-left">Usuario</label>
							<div class="col-sm-12">
								<input type="text" name="txt_username" class="form-control" placeholder="Ingrese usuario" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-9 text-left">Correo</label>
							<div class="col-sm-12">
								<input type="text" name="txt_email" class="form-control" placeholder="Ingrese email" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-9 text-left">Contraseña</label>
							<div class="col-sm-12">
								<input type="password" name="txt_password" class="form-control pass" placeholder="Ingrese password" />
							</div>
						</div>

						<span class="mostrar">
							<div class="input-mostrar">
								<input type="checkbox" class="show-password">
							</div>
							<label>Mostrar Contraseña</label>
						</span>

						<div class="form-group">
							<label class="col-sm-9 text-left">Seleccione tipo</label>
							<div class="col-sm-12 btn-select">
								<select class="form-control" name="txt_role">
									<option value="" selected="selected">Seleccione rol</option>
									<option value="admin">Admin</option>
									<option value="operador">Operador</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12 btn_sesion">
								<input type="submit" name="btn_register" class="btn" value="Registro">
								<!--<a href="index.php" class="btn btn-danger">Cancel</a>-->
							</div>
						</div>

						<div class="form-group ">
							<div class="col-sm-6">
								<button class="btn" type="submit"><a href="index.php">Regresar</a></button>
							</div>
						</div>
					</form>
				</div><!--Cierra div login-->
			</div>
		</div>
	</div>
	<div class="fecha">
		<span>© <?php echo date("Y"); ?>, Derechos Reservados</span>
		<span>Privacidad | Terminos<span>
	</div>
	<script src="./login/login.js"></script>
</body>

</html>