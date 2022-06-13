<?php 

 
if(!isset($_POST['idUs']) || empty($_POST['idUs']) ){
	echo "No se ingresó el id del usuario";
}else{
	$idUs =  $_POST['idUs'];
}	

if(!isset($_POST['idCu']) || empty($_POST['idCu']) ){
	echo "No se ingresó el id del cuento";
}else{
	$idCu = $_POST['idCu'];
}

if(!isset($_POST['contenido']) || empty($_POST['contenido']) ){
	echo "No se ingresó el comentario";
}else{
	$contenido = $_POST['contenido'];
}


if (isset($idUs)&&isset($idCu)&&isset($contenido)) {
	date_default_timezone_set("America/Mexico_City");
	$fechaPub = date('Y')."-".date('m')."-".date('d');
	include_once("../funciones/funcComentarios.php");
	$res = createCom($idUs,$idCu,$contenido,$fechaPub);
	//header("location:?view=comentarios&idCu=".$idCu);
	echo "<script>location.href='../comentarios.php?idCu=$idCu';</script>";  
	
}
 ?>