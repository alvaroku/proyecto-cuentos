<?php 

function login($email,$pass){
	include("../db/db.php");
	$sql = "select idUs,tipoUs from usuarios where correo='$email' and contra='$pass'";
	$res = $con->query($sql);
	return $res;
}

function createUsuario($nombre,$apellido,$email,$pass,$telefono,$perfil){
	include("../db/db.php");
	$sql = "insert into usuarios(tipoUs,nombre,apellido,correo,contra,telefono,perfil)values(2,'$nombre','$apellido','$email','$pass','$telefono','$perfil')";
	$res = $con->query($sql);
	return $res;
}
function getUserInfo($idUs){
	include("db/db.php");
	$sql = "select*from usuarios where idUs='$idUs'";
	$res = $con->query($sql);
	return $res->fetch_assoc();
}	 
function actualizarFotoPerfil($idUs,$perfil){
	include("../db/db.php");
	$sql = "update usuarios set perfil='$perfil' where idUs='$idUs'";
	$res = $con->query($sql);
	return $res;
}	 
?>