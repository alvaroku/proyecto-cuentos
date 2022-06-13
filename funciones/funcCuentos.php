<?php 
function createCuento($idUs,$autor,$parentesco,$titulo,$contenido,$fechaPub){
	include("../db/db.php");
	$sql ="insert into cuentos(idUs,autor,parentesco,titulo,contenido,fechaPub,likes,dislikes)values('$idUs','$autor','$parentesco','$titulo','$contenido','$fechaPub',0,0)";
	$res = $con->query($sql);
	return $res;
}
function readCuentos(){
	include("db/db.php");
	$cuentos = array();
	$sql = "select*from cuentos";
	$res = $con->query($sql);
	while($fila=$res->fetch_assoc()){
		$cuentos[]=$fila;
	}
	return $cuentos;
}
function updateCuento($idCu,$autor,$parentesco,$titulo,$contenido,$fechaPub){
	include("../db/db.php");
	// code...
	$sql ="update cuentos set autor='$autor', parentesco='$parentesco' ,titulo='$titulo',contenido='$contenido' ,fechaPub='$fechaPub' where idCu='$idCu'";
	$res = $con->query($sql);
	return $res;

}
function deleteCuento($idCu){
	include("../db/db.php");
	// code...
	$sql = "delete from cuentos where idCu='$idCu'";
	$res = $con->query($sql);
	return $res;
}
function getMisCuentos($idUs){
	include("db/db.php");
	// code...
	$cuentos = array();
	$sql = "select*from cuentos where idUs='$idUs'";
	$res = $con->query($sql);
	while($fila=$res->fetch_assoc()){
		$cuentos[]=$fila;
	}
	return $cuentos;
}
function getCuento($idCu){
	include("db/db.php");
	// code...
	$sql = "select*from cuentos where idCu='$idCu'";
	$res = $con->query($sql);
	$cuento = $res->fetch_assoc();
	
	return $cuento;
}
function like($idCu){
	include("../db/db.php");
	//obtener likes
	$sql ="select likes from cuentos where idCu = '$idCu'";
	$res = $con->query($sql);
	$cantLikes = $res->fetch_assoc()['likes'];
	$cantLikes++;
	$sql ="update cuentos set likes = '$cantLikes' where idCu = '$idCu'";
	$res = $con->query($sql);
	return $res;
}
function dislike($idCu){
	include("../db/db.php");
	//obtener likes
	$sql ="select dislikes from cuentos where idCu = '$idCu'";
	$res = $con->query($sql);
	$cantDisLikes = $res->fetch_assoc()['dislikes'];
	$cantDisLikes++;
	$sql ="update cuentos set dislikes = '$cantDisLikes' where idCu = '$idCu'";
	$res = $con->query($sql);
	return $res;
}
?>