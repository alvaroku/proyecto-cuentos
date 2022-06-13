<?php 
	//$email =  $_POST['email'];
	//$pass = $_POST['pass'];
 
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

if (isset($pass)&&isset($email)) {
	include("../funciones/funcUsuarios.php");
	$res = login($email,$pass);

	if ($res) {
		if(mysqli_num_rows($res)==0){
			echo "<script>location.href='../login.php?error=1';</script>";
		}else{
			session_start();
			$res =$res->fetch_assoc();
			$_SESSION['idUs'] = $res['idUs'];
			if($res['tipoUs']==1){
				echo "<script>location.href='../admin/dashboard.php';</script>";	
			}else{
				echo "<script>location.href='../cuentos.php';</script>";
			}	
		}
	}else{
		//eader("location:?view=login&error=2");
		echo "<script>location.href='../login.php?error=2';</script>";
	}
	
	
}
 ?>