<?php 

  //configuracion de la conexion a la base de datos

   include('conexion.php');
   
   session_start();
   
   if(!isset($_POST['peticion']))
   {
	$_POST['peticion'] = "peticion";
   }

   if(!isset($_POST['parametros']))
   {
	$_POST['parametros'] = "parametros";
   }
   
   $peticion = $_POST['peticion'];
   $parametros = $_POST['parametros'];
   
   switch($peticion)
   {
		//Caso para recuperar los edificios de la base de datos
		
			
		case 'borrar_admin':
			{	$gid = $parametros['gid'];
				$sql = "delete from hurtos where gid = '$gid';";
				$query = pg_query($conexion,$sql);
				$row=pg_fetch_row($query);

				echo "borrado";
				break;
			}
		
		
   }
    

?>
