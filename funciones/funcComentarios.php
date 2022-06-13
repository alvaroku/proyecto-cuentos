<?php 
 function createCom($idUs,$idCu,$contenido,$fechaPub){
 	include("../db/db.php");
	$sql ="insert into comentarios(idUs,idCu,contenido,fechaPub)values('$idUs','$idCu','$contenido','$fechaPub')";
	$res = $con->query($sql);
	return $res;
}
 function readComs($idCu){
 	include("db/db.php");
	$comentarios = array();
	$sql = "select*from comentarios where idCu=$idCu";
	$res = $con->query($sql);
	while($fila=$res->fetch_assoc()){
		$comentarios[]=$fila;
	}
	return $comentarios;
}
 function updateCom($idCom,$contenido,$fechaPub){
 	include("../db/db.php");
	$sql ="update comentarios set contenido = '$contenido', fechaPub = '$fechaPub' where idCom = '$idCom'";
	$res = $con->query($sql);
	return $res;
}
 function deleteCom($idCom){
 	include("../db/db.php");
	// code...
	$sql = "delete from comentarios where idCom='$idCom'";
	$res = $con->query($sql);
	return $res;
}
 function deleteComByIdCu($idCu){
 	include("../db/db.php");
	// code...
	$sql = "delete from comentarios where idCu='$idCu'";
	$res = $con->query($sql);
	return $res;
}
 function getCantCom($idCu){
 	include("db/db.php");
	// code...
	$sql = "select count(*) as cantcom from comentarios where idCu='$idCu';";
	$res = $con->query($sql);
	return $res->fetch_assoc()['cantcom'];
}		
?>