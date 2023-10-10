<?php

	require_once "./conexion/DBconect.php";

	if(isset($_REQUEST['btn_compra'])) //compruebe el nombre del botón "btn_producto" y configúrelo
	{

		$id	        = (int)$_REQUEST['no_id'];	
		$proveedor    = (int)$_REQUEST['no_idproveedor'];
		$producto  = (int)$_REQUEST['no_idproducto'];	
		$cantidad    = (int)$_REQUEST['no_idproducto'];	
		$fecha =(date)$_REQUEST['fecha'];
		
	
		// VERIFICACION PARA EVITAR REGISTROS DOBLES //
    $checkemail=mysql_query("SELECT * FROM productos WHERE id_producto='$id'");
    $check_mail=mysql_num_rows($checkemail);
    if($check_mail>0){
        $query= " UPDATE productos SET existencia=(existencia + ($cantidad)) WHERE id_producto='$id' ";

// SE IMRPIME MENSAJE DE EXITO //
        echo ' <script language="javascript">alert("Inventario registrado con éxito");</script> ';
			header("refresh:1;compra.php");
 

    }
	}

	?>