<?php
if(isset($_GET['idCom'])&&isset($_GET['idCu'])){
	include_once("../funciones/funcComentarios.php");
	$res = deleteCom($_GET['idCom']);
	//header("location:?view=comentarios&idCu=".$_GET['idCu']);
	$idCu = $_GET['idCu'];
	echo "<script>location.href='../comentarios.php?idCu=$idCu';</script>";
} else{
	//header("location:?view=cuentos");
	echo "<script>location.href='../cuentos.php';</script>";
}	
 ?>