<?php 
$idCu = $_GET['idCu'];
$idUs = $_GET['idUs'];

//borrar comentarios para evitar error de la clave foranea
include_once("../funciones/funcComentarios.php");
deleteComByIdCu($idCu);
include_once("../funciones/funcCuentos.php");
$borrado = deleteCuento($idCu);
if($borrado){
	//header("location:?view=miscuentos&idUs=".$idUs);
	echo "<script>location.href='../miscuentos.php?idUs=$idUs';</script>";
}else{
	echo "problema al eliminar";
}
?>
