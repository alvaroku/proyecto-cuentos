<?php 
	 
	if(isset($_GET['error'])&&!empty($_GET['error'])){
		$error = $_GET['error'];
		switch ($error) {
			case 1:
				$mensaje = "<script>Swal.fire({
					icon: 'error',
					title: 'Oops...',
	  				text: 'Usuario o contraseña incorrecto',
					})</script>";
				break;
			case 2:
				$mensaje = "<script>Swal.fire({
					icon: 'error',
					title: 'Oops...',
	  				text: 'Ocurrió un error al iniciar sesion',
					})</script>";
				break;
			
			default:
				break;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio de sesion</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="src/css/splash.css">

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
	<?php
	if(isset($mensaje)){
		echo  $mensaje;
	} 
	 ?>
	 
	<a href="index.php"><i  class="material-icons white-text small">arrow_back</i></a>
	<div id="contenedor_carga" class="contenedor_carga">
    	<div class="carga"></div>
    </div>
	<div class="container  ">
	  <div class="row se"></div>
	  <div class="row">
	    <div class="col m2 l3"></div>
	    <form id="login" class="col s12 m8 l6 fondo " action="procesos/login.php" method="post">
	        <div class="input-field">
	          <i class="material-icons prefix light-blue-text text-darken-4 ">account_circle</i>
	          <input onkeyup="validarCorreo()" name="email" required id="email" type="email" class="">
	          <label class="black-text" for="email">Email</label>
	          <span class="helper-text"></span>
	        </div>
	        <div class="input-field">
	          <i class="material-icons prefix light-blue-text text-darken-4 ">account_circle</i>
	          <input onkeyup="validarContra()" name="pass" required id="contraseña" type="password">
	          <label class="black-text" for="contraseña">Contraseña</label>
	          <span class="helper-text"></span>
	        </div>
	      <div class="row">
	      	<button class="waves-effect waves-light btn col s12 light-blue darken-4">Enviar</button>
	      </div>
	    </form>
	    <div class="col m2 l3"></div>
	  </div> 
	  <div class="se"></div>
	</div>

	<style type="text/css">
	  .se{
	    min-height: 24vh;
	  }
	  .fondo{
	    background-color: white;
	    box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
	  }
	  button{
	  	margin-bottom: -20px;
	  }
	  body{
	  	background-color:#143D59 ;
	  }
	</style>
	<script>
		let expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 
		let correoValido = false;
		let contraValido = false;

		const form = document.getElementById("login");

		let inputCorreo = form.elements["email"];
		let inputContra = form.elements["pass"];

		form.addEventListener('submit',(event)=>{
		  event.preventDefault();

		  if(correoValido&&contraValido){
		    form.submit();
		  }
		});

		function validarCorreo() {
		  
		  let resp;
		  resp = inputCorreo.value.trim();
		  let mensaje = "";

		  if(resp==""){
		    correoValido=false;
		    inputCorreo.classList.remove("valid");
		    inputCorreo.classList.add("invalid");
		    mensaje = "Por favor ingrese un dato";
		  }else if (!expr.test(resp)) {
		    inputCorreo.classList.remove("valid");
		    inputCorreo.classList.add("invalid");
		    correoValido=false;
		    mensaje = "Correo no válido";
		  }else{
		    correoValido=true;
		    inputCorreo.classList.remove("invalid");
		    inputCorreo.classList.add("valid");
		    mensaje = "Bien!!";
		  }

		  inputCorreo.parentNode.querySelector("span").innerHTML=mensaje;
		}
		function validarContra() {
		  let resp;
		  resp = inputContra.value.trim();
		  let mensaje = "";

		  if(resp==""){
		    contraValido=false;
		    inputContra.classList.remove("valid");
		    inputContra.classList.add("invalid");
		    mensaje = "La contraseña no debe estar vacía";
		  }else if (resp.indexOf(" ")!=-1) {
		    inputContra.classList.remove("valid");
		    inputContra.classList.add("invalid");
		    contraValido=false;
		    mensaje = "La contraseña no debe contener espacios";  
		  }else if(resp.length<=8){
		    inputContra.classList.remove("valid");
		    inputContra.classList.add("invalid");
		    contraValido=false;
		    mensaje = "La contraseña debe ser mayor a 8 caracteres";
		  }else{
		    contraValido=true;
		    inputContra.classList.remove("invalid");
		    inputContra.classList.add("valid");
		    mensaje = "Bien!!";
		  }

		  inputContra.parentNode.querySelector("span").innerHTML=mensaje;
		}
		$(document).ready(function() {
		    M.updateTextFields();
		});
	</script>
	<script src="src/js/splash.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>