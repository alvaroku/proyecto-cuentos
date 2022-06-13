<?php 
   
  if(isset($_GET['error'])&&!empty($_GET['error'])){
    $error = $_GET['error'];
    switch ($error) {
      case 1:
        $mensaje = "<script>Swal.fire({
          icon: 'error',
            text: 'No tienes acceso',
          })</script>";
        break;  
      default:
        break;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/splash.css">

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="color">
  <?php
  if(isset($mensaje)){
    echo  $mensaje;
  } 
   ?>
  <div class="navbar-fixed"> 
    <nav class="color ">
      <div class="nav-wrapper">
        <div class="material-icons amber-text">mood</div>
        <a href="#!" class="brand-logo amber-text ">Bienvenidos</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down ">
          <li><a href="login.php" class=" amber-text">Iniciar sesión</a></li>
          <li><a href="registro.php"  class=" amber-text">Registrarse</a></li>
          <li><a href="cuentos.php" class=" amber-text">Cuentos</a></li>
        </ul>
      </div>
    </nav> 
  </div>

  <!-- menu lateral-->
  <ul class="sidenav color " id="mobile-demo">
    <li><a href="login.php" class=" amber-text">Iniciar sesión</a></li>
    <li><a href="registro.php"  class=" amber-text">Registrarse</a></li>
    <li><a href="cuentos.php" class=" amber-text">Cuentos</a></li>
  </ul>

  <div id="contenedor_carga" class="contenedor_carga">
    <div class="carga"></div>
  </div>
 

  <div class="fondo row">
    <h2 class="name col s12">Story time</h2>
    <div class="col s12 bordes center"> 
      <h3 class="amber-text oblique">
			  Bienvenido, aquí podrás ver y contarnos todas las historias que alguna vez tus abuelitos o familiares te han contado.</h3>
	  </div>	
	</div>

  <footer class="page-footer tamaño color">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="amber-text">Desarrolladores</h5>
          <ul>
            <li><a class="amber-text" href="#!">Alvaro Ku</a></li>
            <li><a class="amber-text " href="#!">Ezequiel Tun</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container amber-text">
        © <?php echo date('Y'); ?> Copyright
      </div>
    </div>
  </footer>

  <script src="src/js/main.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="src/js/splash.js" type="text/javascript" charset="utf-8" async defer></script>

</body>
</html>