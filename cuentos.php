<?php session_start() ?>
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
</head>
<body class="color">
  <?php
  if(!isset( $_SESSION['idUs']) && empty( $_SESSION['idUs'])){
  ?>
  <div class="navbar-fixed"> 
    <nav class="color ">
      <div class="nav-wrapper">
        <div class="material-icons amber-text">mood</div>
        <a href="index.php" class="brand-logo amber-text ">Cuentos</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down ">
          <li><a href="login.php" class=" amber-text">Iniciar sesión</a></li>
          <li><a href="registro.php" class=" amber-text">Registrarse</a></li>
        </ul>
      </div>
    </nav> 
  </div>

  <!-- menu lateral-->
  <ul class="sidenav color " id="mobile-demo">
    <li><a href="login.php" class=" amber-text">Iniciar sesión</a></li>
    <li><a href="registro.php" class=" amber-text">Registrarse</a></li>
  </ul>
  <?php
  }else{
    $idUs = $_SESSION['idUs'];
    include_once("funciones/funcUsuarios.php");
    $datos = getUserInfo($idUs);
  ?>
  <div class="navbar-fixed"> 
    <nav class="color ">
      <div class="nav-wrapper">
        <div class="material-icons amber-text">mood</div>
        <a href="index.php" class="brand-logo amber-text ">Cuentos</a>
        <!-- menu lateral Trigger -->
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down ">
          <li><a href="miscuentos.php" class=" amber-text">Mis Cuentos</a></li>
          <!-- modal Trigger -->
          <li><a href="#modal1" class="modal-trigger amber-text">Agregar Cuento</a></li>
          <!-- modal Trigger -->
          <li><a href="#modal2" class="modal-trigger amber-text">Cambiar foto de perfil</a></li>
          <!-- Dropdown Trigger -->
          <li><a class="dropdown-trigger amber-text" href="#!" data-target="dropdown1"><?php echo $datos['nombre']." ".$datos['apellido'] ?><i class="material-icons right">arrow_drop_down</i></a></li>
          <?php  
          if($datos['perfil']==NULL){
          ?>
            <img class="left perfil" src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_960_720.png"/>
          <?php  
          }else{
          ?>
            <img class="left perfil" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($datos['perfil'])?>"/>
          <?php  
          } 
          ?>
        </ul>
      </div>
    </nav> 
  </div>
   <!-- Modal Structure agregar cuento -->
  <div id="modal1" class="modal ">
    <form  id="registrocuento" action="procesos/agregar_cuento.php" method="post" class="col s12">
      <div class="modal-content">
        <h4 class="amber-text">Cuéntanos...</h4>
        <div class="row">
          <input name="idUs" required type="hidden" value="<?php echo $datos['idUs'] ?>">
          <p class="white-text"><b>¿Quién te contó la historia?</b></p>
          <div class="input-field col s12">
            <input onkeyup="validarAutor()" name="autor" required id="autor" type="text" class=" white-text">
            <label class="white-text" for="autor">Nombre de la persona</label>
            <span class="helper-text white-text"></span>
          </div>
          <div class="input-field col s12 white-text">
            <input onkeyup="validarParentesco()" name="parentesco" id="parentesco" required type="text" class=" white-text">
            <label class="white-text" for="parentesco">Parentesco(Abuel@, mamá, papá, etc)</label>
            <span class="helper-text white-text"></span>
          </div>
          <p class=" white-text"><b>Datos del cuento o historia</b></p>
          <div class="input-field col s12 ">
            <input onkeyup="validarTitulo()" name="titulo" required id="titulo" type="text" class=" white-text">
            <label class=" white-text" for="titulo">Titulo</label>
            <span class="helper-text white-text"></span>
          </div>
          <div class="input-field col s12 ">
            <textarea onkeyup="validarContenido()" required name="contenido" id="contenido" class="materialize-textarea white-text"></textarea>
            <label class="white-text" for="contenido">Redacta aquí</label>
            <span class="helper-text white-text"></span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input class="btn  light-blue darken-4 " type="submit">
        <input type="reset" class="modal-close waves-effect waves-green btn-flat" value="Cancelar" name="">
      </div>
    </form>
  </div>
   <!-- Modal Structure cambiar perfil -->
  <div id="modal2" class="modal ">
    <form enctype="multipart/form-data" id="registrocuento" action="procesos/actualizar_foto_perfil.php" method="post" class="col s12">
      <input type="hidden" name="idUs" value="<?php echo $_SESSION['idUs'] ?>">
      <div class="modal-content">
        <h4 class="amber-text">Foto de perfil</h4>
        <div class="row">
          <div class="file-field input-field col s12">
            <div class="btn light-blue darken-4">
              <span>Imagen</span>
              <input name="image" id="image" type="file">
            </div>
            <div class="file-path-wrapper">
              <input required class="file-path validate black-text" type="text" placeholder="Selecciona una foto de perfil">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input class="btn  light-blue darken-4 " type="submit">
        <input type="reset" class="modal-close waves-effect waves-green btn-flat" value="Cancelar" name="">
      </div>
    </form>
  </div>
  <!-- Dropdown Structure -->
  <ul id="dropdown1" class="dropdown-content">
    <!--<li><a href="#!">Mi perfil</a></li> -->
    <li><a href="procesos/logout.php">Cerrar sesión</a></li>
  </ul>
  <!-- menu lateral-->
  <ul id="slide-out" class="sidenav">
      <li><div class="user-view">
        <div class="background">
          <img src="https://img.freepik.com/foto-gratis/viejo-fondo-ne…-pared-habitacion_1258-28313.jpg?size=626&ext=jpg">
        </div>
        <a href="#user">
          <?php  
          if($datos['perfil']==NULL){
          ?>
            <img class="circle" src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_960_720.png"/>
          <?php  
          }else{
          ?>
            <img class="circle" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($datos['perfil'])?>"/>
          <?php  
          } 
          ?>
        </a>

        <a href="#name"><span class="white-text name"><?php echo $datos['nombre']." ".$datos['apellido'] ?></span></a>
        <a href="#email"><span class="white-text email"><?php echo $datos['correo'] ?></span></a>
      </div></li>
      <li><a href="miscuentos.php" class="">Mis Cuentos</a></li>
      <!-- modal Trigger -->
      <li><a href="#modal1" class="modal-trigger">Agregar Cuento</a></li>
      <li><div class="divider"></div></li>
      <li><a class="subheader">Perfil</a></li>
      <!-- modal Trigger -->
      <li><a href="#modal2" class="modal-trigger">Cambiar foto de perfil</a></li>
      <!--<li><a href="#" class="waves-effect" href="#!">Mi Perfil</a></li> -->
      <li><a href="procesos/logout.php" class="waves-effect" href="#!">Cerrar Sesión</a></li>
  </ul>
  <?php
  } 
  ?>
  
  <div id="contenedor_carga" class="contenedor_carga">
    <div class="carga"></div>
  </div>

  <div class="section"></div>

   
    <?php 
    include_once("funciones/funcCuentos.php");
    $cuentos = readCuentos();
    if(count($cuentos)==0){
      echo "<h3  class='white-text center'>No hay cuentos :(</h1>";
    }else{
      foreach ($cuentos as $cuento) {
      //obtener datos del usuario de la publicacion
        include_once("funciones/funcUsuarios.php");
        $idAutorPub = $cuento["idUs"];
        //require_once(ROOT_PATH."models/user_model.php");
     
        $AutorPub = getUserInfo($idAutorPub); 

    ?>
        <div class="row">
          <div class="col  m2 l3"></div>
          <div class="f-card black-text col s12 m8 l6 grey darken-4 blue-grey-text text-lighten-5">
            <div class="section"></div>
            <div class="row">
              <div class="col  m1 "></div>
              <div class="col s12">
                <div class="header">
                  <?php  
                  if($AutorPub['perfil']==NULL){
                  ?>
                    <img class="co-logo perfil" src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_960_720.png" />
                  <?php  
                  }else{
                  ?>
                    <img class="co-logo perfil" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($AutorPub['perfil'])?>"/>
                  <?php  
                  } 
                  ?>
                  
                  <div class="co-name"><a href="#" class="blue-grey-text text-lighten-5"><?php echo $AutorPub['nombre']." ".$AutorPub['apellido'] ?></a></div>
                  <div class="time"><a href="#"><?php echo $cuento['fechaPub'] ?></a> </div>
                </div>
                <div class="content">
                  <p>Historia relatada por mi  <?php echo $cuento['parentesco']." ".$cuento['autor'] ?></p>
                </div>
                <div class="reference">
                  <div class="reference-content">
                    <div class="reference-title"><?php echo $cuento['titulo'] ?></div>
                    <div class="reference-subtitle"><?php echo $cuento['contenido'] ?></div>
                  </div>
                </div>
                <div class="social">
                  <div class="social-buttons">
                    <div class="row center">
                      <div class="col s4">
                        <a href="procesos/like.php?idCu=<?php echo $cuento['idCu'] ?>" class="blue-grey-text text-lighten-5"><i class="material-icons blue-grey-text text-lighten-5">thumb_up</i>Like(<?php echo $cuento['likes'] ?>)</a>
                      </div>
                      <div class="col s4 ">
                        <a href="procesos/dislike.php?idCu=<?php echo $cuento['idCu'] ?>" class="blue-grey-text text-lighten-5"><i class="material-icons blue-grey-text text-lighten-5">thumb_down</i>Dislike(<?php echo $cuento['dislikes'] ?>)</a>
                      </div>
                      <div class="col s4">
                        <?php
                        include_once("funciones/funcComentarios.php");
                      
                        $cantCom = getCantCom($cuento['idCu']); 
                         ?>
                        <a class='modal-trigger blue-grey-text text-lighten-5' href='comentarios.php?idCu=<?php echo $cuento['idCu'] ?>'><i class='material-icons blue-grey-text text-lighten-5'>comment</i>Comentarios(<?php echo $cantCom ?>)</a>
                    </div>
                    </div>                  
                  </div>
                </div>
                <div class="col m1"></div>
              </div>
          </div> 
          <div class="col  m2 l3 "></div>  
        </div>
      </div>
    <?php 
      }
    }
      ?>
  

  <script>
    $(document).ready(function(){
      $(".dropdown-trigger").dropdown();
    });
  </script>
  <script src="src/js/splash.js" type="text/javascript" charset="utf-8" async defer></script> 
  <script src="src/js/main.js" type="text/javascript" charset="utf-8" async defer></script>   
  <style>
    body,.modal,.modal-footer{
      background-color:#143D59 ;
    }
    .com{
      margin-top: 25px;
      margin-left: -25px;
    }
    .perfil{
      border-radius: 50%;
      width: 60px;
      height: 60px;
    }

    .f-card {
      border-radius:20px;
      box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
    }

    .co-logo {
      /*display:block;*/
      float:left;
      margin-right:8px;
      width:40px;
      height:40px;
    }

    .co-name > a {
       
      font-size:24px;
      font-weight: bold;
      line-height: 1.38;
      text-decoration:none;
      margin-bottom:2px;
    }
    .time > a {
      color: #90949c;
      text-decoration:none;
    }

    .time > a:hover, .co-name > a:hover {
      text-decoration:underline;
    }

    .content {
      clear:both;
       
      font-size:20px;
      line-height: 1.38;
    }

    .reference-content {
      border: 2px solid black;
      border: 2px solid rgba(0, 0, 0, .1);
      padding: 10px 12px 10px 12px;
    }

    .reference-title {
      font-size: 25px;
      font-weight: 500;
      margin-bottom:5px;
    }

    .reference-subtitle {
       
      font-size:14px;
      line-height: 26px; 
    }
    .social{
      margin-bottom: -20px;
    }

    
    .social-buttons {
      color: #7f7f7f;
      font-family: Helvetica;
      font-size: 13px; 
      border-top:1px solid #e5e5e5;
      padding-top:10px;
    }

     

    .social-buttons a:hover {
      text-decoration:underline;
      cursor:pointer;
    }   
  </style> 
  <script>
    var regex = new RegExp("^[a-zA-Záéíóúü ]+$");

   let autorValido = false;
   let parentescoValido = false;
   let tituloValido = false;
   let contenidoValido = false;

   const form = document.getElementById("registrocuento");

   let inputAutor = form.elements['autor'];
   let inputParentesco = form.elements['parentesco'];
   let inputTitulo = form.elements["titulo"];
   let inputContenido = form.elements["contenido"];

   form.addEventListener('submit',(event)=>{
     event.preventDefault();

     if(autorValido&&parentescoValido&&tituloValido&&contenidoValido){
       form.submit();
     }
   });

   function validarAutor() {
     let resp;
     resp = inputAutor.value.trim();
     let mensaje = "";

     if(resp==""){
       autorValido=false;
       inputAutor.classList.remove("valid");
       inputAutor.classList.add("invalid");
       mensaje = "Por favor ingrese un dato";
     }else if(resp.length<3){
      autorValido=false;
       inputAutor.classList.remove("valid");
       inputAutor.classList.add("invalid");
       mensaje = "Dato demasiado corto";
     }else if (!regex.test(resp)) {
       autorValido=false;
       inputAutor.classList.remove("valid");
       inputAutor.classList.add("invalid");
       mensaje = "Por favor ingrese solo letras"
     }else{
       inputAutor.classList.remove("invalid");
       inputAutor.classList.add("valid");
       autorValido=true;
       mensaje = "Bien!";
       ;
     }

     inputAutor.parentNode.querySelector("span").innerHTML=mensaje;
   }
   function validarParentesco() {
     let resp;
     resp = inputParentesco.value.trim();
     let mensaje = "";

     if(resp==""){
       parentescoValido=false;
       inputParentesco.classList.remove("valid");
       inputParentesco.classList.add("invalid");
       mensaje = "Por favor ingrese un dato";
     }else if(resp.length<3){
       parentescoValido=false;
       inputParentesco.classList.remove("valid");
       inputParentesco.classList.add("invalid");
       mensaje = "Dato demasiado corto";

     }else if (!regex.test(resp)) {
       parentescoValido=false;
       inputParentesco.classList.remove("valid");
       inputParentesco.classList.add("invalid");
       mensaje = "Por favor ingrese solo letras";
     }else{
       inputParentesco.classList.remove("invalid");
       inputParentesco.classList.add("valid");
       parentescoValido=true;
       mensaje = "Bien!";
       
     }

     inputParentesco.parentNode.querySelector("span").innerHTML=mensaje;
   }
   function validarTitulo() {
     let resp;
     resp = inputTitulo.value.trim();
     let mensaje = "";

     if(resp==""){
       tituloValido=false;
       inputTitulo.classList.remove("valid");
       inputTitulo.classList.add("invalid");
       mensaje = "Por favor ingrese un dato";
     }else if(resp.length<3){
       tituloValido=false;
       inputTitulo.classList.remove("valid");
       inputTitulo.classList.add("invalid");
       mensaje = "Dato demasiado corto";

     }else{
       inputTitulo.classList.remove("invalid");
       inputTitulo.classList.add("valid");
       tituloValido=true;
       mensaje = "Bien!";
       
     }

     inputTitulo.parentNode.querySelector("span").innerHTML=mensaje;
   }
   function validarContenido() {
     let resp;
     resp = inputContenido.value.trim();
     let mensaje = "";

     if(resp==""){
       contenidoValido=false;
       inputContenido.classList.remove("valid");
       inputContenido.classList.add("invalid");
       mensaje = "Por favor ingrese un dato";
     }else if(resp.length<20){
       contenidoValido=false;
       inputContenido.classList.remove("valid");
       inputContenido.classList.add("invalid");
       mensaje = "Dato demasiado corto";

     }else{
       inputContenido.classList.remove("invalid");
       inputContenido.classList.add("valid");
       contenidoValido=true;
       mensaje = "Bien!";
       
     }

     inputContenido.parentNode.querySelector("span").innerHTML=mensaje;
   }
  
    
  </script>  
</body>
</html>