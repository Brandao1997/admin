<?php

require_once './conexion/DBconect.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$sentencia = $db->prepare("DELETE FROM mainlogin WHERE id = ?;");
$resultado = $sentencia->execute([$id]);

if ($resultado === TRUE) {
    header("location: admin/admin_portada.php");
} else {
    echo "Algo salió mal";
}
