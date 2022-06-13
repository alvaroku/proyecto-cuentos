<?php 
	//$email =  $_POST['email'];
	//$pass = $_POST['pass'];

if(!isset($_POST['nombre']) || empty($_POST['nombre']) ){
	echo "No se ingresó el nombre";
}else{
	$nombre =  $_POST['nombre'];
}	
if(!isset($_POST['apellido']) || empty($_POST['apellido']) ){
	echo "No se ingresó el apellido";
}else{
	$apellido=  $_POST['apellido'];
}	
if(!isset($_POST['email']) || empty($_POST['email']) ){
	echo "No se ingresó el correo";
}else{
	$email =  $_POST['email'];
}	
if(!isset($_POST['pass']) || empty($_POST['pass']) ){
	echo "No se ingresó la contraseña";
}else{
	$pass = $_POST['pass'];
}
if(!isset($_POST['tel']) || empty($_POST['tel']) ){
	echo "No se ingresó el telefono";
}else{
	$telefono = $_POST['tel'];
}


if (isset($nombre)&&isset($apellido)&&isset($email)&&isset($pass)&&isset($telefono)) {
	//verificar imagen
	$perfil="";
	if(isset($_FILES["image"]["tmp_name"])&&!empty($_FILES["image"]["tmp_name"])){
		$revisar = getimagesize($_FILES["image"]["tmp_name"]);
		if($revisar !== false){
			$image = $_FILES['image']['tmp_name'];
			$perfil = addslashes(file_get_contents($image));
		}
	}
	

	include_once("../funciones/funcUsuarios.php");
	$res = createUsuario($nombre,$apellido,$email,$pass,$telefono,$perfil);
	if($res){
		$res = login($email,$pass);
		if(mysqli_num_rows($res)==0){
			echo "No se pudo inicar sesion";
		}else{
			session_start();
			$_SESSION['idUs'] = $res->fetch_assoc()['idUs'];
			//echo $_SESSION['idUs'];
			//header("location:?view=cuentos");
			echo "<script>location.href='../cuentos.php';</script>";
			//require_once(ROOT_PATH."/controllers/cuentos.php");
			
		}
	}else{
		echo "Error de consulta";
	}
	
}
 ?>