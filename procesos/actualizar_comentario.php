<?php
if(isset($_POST['idCom'])&&isset($_POST['idCu'])&&isset($_POST['contenido'])){
	date_default_timezone_set("America/Mexico_City");
	$fechaPub = date('Y')."-".date('m')."-".date('d');
	require_once("../funciones/funcComentarios.php");

	$res = updateCom($_POST['idCom'],$_POST['contenido'],$fechaPub);
	$idCu=$_POST['idCu'];
	//header("location:?view=comentarios&idCu=".$_POST['idCu']);
	echo "<script>location.href='../comentarios.php?idCu=$idCu';</script>";   
} else{
	//header("location:?view=cuentos");
	echo "<script>location.href='../cuentos.php';</script>";  
}	
 ?>