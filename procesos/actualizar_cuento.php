<?php 
if(!isset($_POST['idUs']) || empty($_POST['idUs']) ){
	echo "No se ingresó el id del usuario";
}else{
	$idUs =  $_POST['idUs'];
}
if(!isset($_POST['idCu']) || empty($_POST['idCu']) ){
	echo "No se ingresó el id del cuento";
}else{
	$idCu =  $_POST['idCu'];
}		
if(!isset($_POST['autor']) || empty($_POST['autor']) ){
	echo "No se ingresó el nombre del autor";
}else{
	$autor =  $_POST['autor'];
}
if(!isset($_POST['parentesco']) || empty($_POST['parentesco']) ){
	echo "No se ingresó el parentesco";
}else{
	$parentesco=  $_POST['parentesco'];
}	
if(!isset($_POST['titulo']) || empty($_POST['titulo']) ){
	echo "No se ingresó el titulo";
}else{
	$titulo =  $_POST['titulo'];
}	
if(!isset($_POST['contenido']) || empty($_POST['contenido']) ){
	echo "No se ingresó la contenido";
}else{
	$contenido = $_POST['contenido'];
}

if (isset($idUs)&&isset($idCu)&&isset($autor)&&isset($parentesco)&&isset($titulo)&&isset($contenido)) {
	date_default_timezone_set("America/Mexico_City");
	$fechaPub = date('Y')."-".date('m')."-".date('d');
	include_once("../funciones/funcCuentos.php");
	$res = updateCuento($idCu,$autor,$parentesco,$titulo,$contenido,$fechaPub);

	if($res){
		//header("location:?view=miscuentos&idUs=".$idUs);
		echo "<script>location.href='../miscuentos.php?idUs=$idUs';</script>";
	}else{
		echo "problema al actualizar";
	}
}
 ?>