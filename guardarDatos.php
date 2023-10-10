<?php
#Salir si alguno de los datos no está presente
if (

	!isset($_POST["username"]) ||

	!isset($_POST["email"]) ||

	!isset($_POST["password"]) ||

	!isset($_POST["role"]) ||

	!isset($_POST["id"])

) exit();



#Si todo va bien, se ejecuta esta parte del código...

include_once "./conexion/DBconect.php";

$id = $_POST["id"];

$username = $_POST["username"];

$email = $_POST["email"];

$password = $_POST["password"];

$role = $_POST["role"];

$sentencia = $db->prepare("UPDATE mainlogin SET username = ?, email = ?, password = ?, role = ? WHERE id = ?;");
$resultado = $sentencia->execute([$username, $email, $password, $role, $id]); # Pasar en el mismo orden de los ?

if ($resultado === TRUE) {
	header("location: admin/admin_portada.php");
} else {
	echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
