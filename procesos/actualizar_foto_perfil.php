<?php
//verificar imagen
$perfil="";
if(isset($_FILES["image"]["tmp_name"])&&!empty($_FILES["image"]["tmp_name"])){
	$revisar = getimagesize($_FILES["image"]["tmp_name"]);
	if($revisar !== false){
		$image = $_FILES['image']['tmp_name'];
		$perfil = addslashes(file_get_contents($image));
	}
	
	include_once("../funciones/funcUsuarios.php");
	actualizarFotoPerfil($_POST['idUs'],$perfil);
	if (isset($_GET['redamiscuentos'])) {
		// code...
		echo "<script>location.href='../miscuentos.php';</script>";
	}else{
		echo "<script>location.href='../cuentos.php';</script>";
	}
}else{
	if (isset($_GET['redamiscuentos'])) {
		// code...
		echo "<script>location.href='../miscuentos.php';</script>";
	}else{
		echo "<script>location.href='../cuentos.php';</script>";
	}

	
}
	
 ?>