<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Admon_Carpinteria/login/login.css">
	<script src="js/jquery-1.12.4-jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

</head>

<body>

	<?php

	require_once './conexion/DBconect.php';

	//@
	session_start();

	if (isset($_SESSION["admin_login"])) {
		header("location: ./admin/admin_portada.php");
	}
	if (isset($_SESSION["operador_login"])) {
		header("location: ./operador/dashboard.php");
	}

	if (isset($_REQUEST['btn_login'])) {
		$email		= $_REQUEST["txt_email"];	//textbox nombre "txt_email"
		$password	= $_REQUEST["txt_password"];	//textbox nombre "txt_password"
		$role		= $_REQUEST["txt_role"];		//select opcion nombre "txt_role"

		if (empty($email)) {

			echo '<div class="alert alert-danger" role="alert">Por favor ingrese Email!</div>';
		} else if (empty($password)) {

			echo '<div class="alert alert-danger" role="alert">Por favor ingrese Password!</div>';

			//Revisar password vacio
		} else if (empty($role)) {
			echo '<div class="alert alert-danger" role="alert">Por favor seleccione rol!</div>';
		} else if ($email and $password and $role) {

			try {

				$select_stmt = $db->prepare("SELECT email,password,role FROM mainlogin
										WHERE email=:uemail AND password=:upassword AND role=:urole");

				$select_stmt->bindParam(":uemail", $email);

				$select_stmt->bindParam(":upassword", $password);

				$select_stmt->bindParam(":urole", $role);

				$select_stmt->execute();	//execute query

				while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
					$dbemail	= $row["email"];
					$dbpassword	= $row["password"];
					$dbrole		= $row["role"];
				}

				if ($email != null and $password != null and $role != null) {
					if ($select_stmt->rowCount() > 0) {
						if ($email == $dbemail and $password == $dbpassword and $role == $dbrole) {
							switch ($dbrole)		//inicio de sesión de usuario base de roles

							{
								case "admin":
									$_SESSION["admin_login"] = $email;
									$loginMsg = "Admin: Inicio sesión con éxito";
									header("refresh:1;./admin/admin_portada.php");
									break;

								case "operador":
									$_SESSION["operador_login"] = $email;
									$loginMsg = "Operador: Inicio sesión con éxito";
									header("refresh:1;./operador/dashboard.php");
									break;

								default:
									echo '<div class="alert alert-danger" role="alert">correo electrónico o contraseña o rol incorrectos!</div>';
							}
						} else {

							echo '<div class="alert alert-danger" role="alert">correo electrónico o contraseña o rol incorrectos!</div>';
						}
					} else {
						echo '<div class="alert alert-danger" role="alert">correo electrónico o contraseña o rol incorrectos!</div>';
					}
				} else {
					echo '<div class="alert alert-danger" role="alert">correo electrónico o contraseña o rol incorrectos!</div>';
				}
			} catch (PDOException $e) {
				echo 'Error en la consulta: ' . $e->getMessage();
				exit();
			}
		} else {

			echo '<div class="alert alert-danger" role="alert">correo electrónico o contraseña o rol incorrectos!</div>';
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
							<strong><?php echo $error; ?></strong>
						</div>

					<?php

					}
				}

				if (isset($loginMsg)) {

					?>
					<div class="alert alert-success" role="alert">
						<strong>ÉXITO ! <?php echo $loginMsg; ?></strong>
					</div>

				<?php

				}

				?>

				<div class="login-form">
					<div class="login-image">
						<img src="img/muebles.jpg" alt="mueble" class="image">
					</div>
					<form method="post" class="form-horizontal">
						<h2>Iniciar sesión</h2>
						<div class="form-group">
							<label class="col-sm-6 text-left ">Correo</label>
							<div class="col-sm-12">
								<input type="text" name="txt_email" class="form-control" placeholder="Ingrese correo" requerid />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-6 text-left">Contraseña</label>
							<div class="col-sm-12">
								<input type="password" name="txt_password" class="form-control pass" placeholder="Ingrese contraseña" requerid />
							</div>
						</div>


						<span class="mostrar">
							<div class="input-mostrar">
								<input type="checkbox" class="show-password">
							</div>
							<label>Mostrar Contraseña</label>
						</span>



						<div class="form-group">
							<label class="col-sm-6 text-left">Seleccionar rol</label>
							<div class="col-sm-12 btn-select">
								<select class="form-control" name="txt_role">
									<option value="" selected="selected">Selecccionar roles</option>
									<option value="admin">Admin</option>
									<option value="operador">Operador</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12 btn_sesion">
								<input type="submit" name="btn_login" value="Iniciar Sesion">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6">
								<button class="btn " type="submit"><a href="registro.php">Crear Cuenta Nueva</a></button>
							</div>
						</div>
					</form>
				</div>
				<!--Cierra div login-->
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