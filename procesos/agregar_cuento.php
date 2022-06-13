<?php 
if(!isset($_POST['idUs']) || empty($_POST['idUs']) ){
	echo "No se ingresó el id del usuario";
}else{
	$idUs =  $_POST['idUs'];
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

if (isset($idUs)&&isset($autor)&&isset($parentesco)&&isset($titulo)&&isset($contenido)) {
	date_default_timezone_set("America/Mexico_City");
	$fechaPub = date('Y')."-".date('m')."-".date('d');
	include("../funciones/funcCuentos.php");
	$res = createCuento($idUs,$autor,$parentesco,$titulo,$contenido,$fechaPub);

	if($res){
		if(isset($_GET['redamiscuentos'])){
			//header("location:?view=miscuentos&idUs=".$idUs);
			echo "<script>location.href='../miscuentos.php?idUs=$idUs';</script>";
		}else{
			//header("location:?view=cuentos");
			echo "<script>location.href='../cuentos.php';</script>";
		}
		
	}else{
		echo "problema al registrar cuento";
	}
}
 ?>