<?php 
if(isset($_GET['idCu'])&&!empty($_GET['idCu'])){
	$idCu = $_GET['idCu'];
	include("../funciones/funcCuentos.php");
	dislike($idCu);
	echo "<script>location.href='../cuentos.php';</script>";  
}
 ?>
