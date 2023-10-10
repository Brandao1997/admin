<?php

if (!isset($_GET["id"])) exit();

$id = $_GET["id"];

include_once "./conexion/DBconect.php";

$sentencia = $db->prepare("SELECT * FROM mainlogin WHERE id = ?;");

$sentencia->execute([$id]);

$persona = $sentencia->fetch(PDO::FETCH_OBJ);

if ($persona === FALSE) {

  #No existe

  echo "¡No existe alguna persona con ese ID!";

  exit();
}

#Si la persona existe, se ejecuta esta parte del código

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Actualizar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    body {
      width: 100%;
      background-color: beige;
    }
  </style>

</head>

<body>
  <div class="container" style="margin-top:250px;">
    <h1>
      <center>Actualizar Roles</center>
    </h1>
    <form method="post" action="guardarDatos.php">
      <div class="form-group col-md-6">
        <input type="hidden" name="id" value="<?php echo $persona->id; ?>">
      </div>

      <div class="form-group col-md-16">
        <label for="inputEmail4">Username</label>
        <input value="<?php echo $persona->username ?>" name="username" type="text" class="form-control" id="username" placeholder="Username" required>
      </div>

      <div class="form-group col-md-16">
        <label for="inputEmail4">Email</label>
        <input value="<?php echo $persona->email ?>" name="email" type="email" class="form-control" id="email" placeholder="Email" required>
      </div>

      <div class="form-group col-md-16">
        <label for="inputPassword4">Password</label>
        <input value="<?php echo $persona->password ?>" name="password" type="password" class="form-control" id="password" placeholder="Password" required>
      </div>

      <div class="form-group col-md-16">
        <label for="role">Rol</label>
        <select class="form-control" required name="role" id="role">
          <option value="">--Selecciona--</option>
          <option <?php echo $persona->role === 'admin' ? "selected='selected'" : "" ?> value="admin">admin</option>
          <option <?php echo $persona->role === 'operador' ? "selected='selected'" : "" ?> value="operador">operador</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <input type="submit" value="Guardar cambios" class="btn btn-primary">
      </div>

    </form>
  </div>
</body>

</html>