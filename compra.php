 <?php include("../header/header.php"); ?>
 <main>
     <div class="container bootstrap snippets bootdey mt-5">
         <div class="row">

             <form class="form-control-sm" method="post" action="agregar_compra.php">
                 <div class="form-group">
                     <label for="id">Id_compra</label>
                     <input type="text" class="form-control" name="no_id" id="id" aria-describedby="emailHelp" placeholder="id_compra">
                 </div>

                 <div class="form-group">
                     <select>
                         <option value="0">Seleccione:</option>
                         <?php
                            // Realizamos la consulta para extraer los datos
                            $query = $mysqli->query("SELECT * FROM proveedor");
                            while ($valores = mysqli_fetch_array($query)) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                echo '<option value="' . $valores[Id_proveedor] . '">' . $valores[Nombre] . '</option>';
                            }
                            ?>
                     </select>
                 </div>


                 <div class="form-group">
                     <label for="proveedor">Id_Proveedor</label>
                     <input type="text" class="form-control" name="no_idproveedor" id="proveedor" placeholder="Id_Proveedor">
                 </div>

                 <div class="form-group">
                     <label for="producto">Id_Producto</label>
                     <input type="text" class="form-control" name="no_idproducto" id="producto" placeholder="Id_Producto">
                 </div>

                 <div class="form-group">
                     <label for="cantidad">Cantidad</label>
                     <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="cantidad">
                 </div>

                 <button type="submit" name="btn_compra" class="btn btn-success mt-3">Agregar Compra</button>
             </form>

         </div>

 </main>
 <?php include("../footer/footer.php"); ?>