<?php 
session_start();
if (!isset($_SESSION['idUs'])) {
  // code...
  //header("location:?view=inicio&error=1");
  echo "<script>location.href='index.php?error=1';</script>";  
}else if(!isset($_GET['idCu'])){
  echo "<script>location.href='index.php?error=1';</script>";  
}
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="src/css/splash.css">
</head>
<body>
  <a href="miscuentos.php?idUs=<?php echo $_SESSION['idUs'] ?>"><i  class="material-icons white-text small">arrow_back</i></a>

  <div id="contenedor_carga" class="contenedor_carga">
    <div class="carga"></div>
  </div>
 
  <?php 
  include_once("funciones/funcCuentos.php");
  $cuento = getCuento($_GET['idCu']);
   ?>
  <div class="container">
    <div class="row">
      <div class="col m2 l3"></div>
      <form id="editarcuento" class="col s12 m8 l6 fondo " action="procesos/actualizar_cuento.php" method="post" enctype="multipart/form-data">
        
        <div class="row">
          <input name="idUs" required type="hidden" value="<?php echo $_SESSION['idUs'] ?>">
          <input name="idCu" required type="hidden" value="<?php echo $_GET['idCu'] ?>">
          <p><b>¿Quién te contó la historia? </b></p>
          <div class="input-field col s12">
            <input onkeyup="validarAutor()" name="autor" required id="autor" type="text"  value="<?php echo $cuento['autor'] ?>">
            <label class="black-text" for="autor">Nombre de la persona</label>
            <span class="helper-text" ></span>
          </div>
          <div class="input-field col s12">
            <input onkeyup="validarParentesco()" name="parentesco" id="parentesco" required type="text"  value="<?php echo $cuento['parentesco'] ?>">
            <label class="black-text" for="parentesco">Parentesco(Abuel@, mamá, papá, etc)</label>
            <span class="helper-text" ></span>
          </div>
          <p><b>Datos del cuento o historia</b></p>
          <div class="input-field col s12 ">
            <input onkeyup="validarTitulo()" name="titulo" required id="titulo" type="text"  value="<?php echo $cuento['titulo'] ?>">
            <label class="black-text" for="titulo">Titulo</label>
            <span class="helper-text" ></span>
          </div>
          <div class="input-field col s12 ">
            <textarea onkeyup="validarContenido()" required name="contenido" id="contenido" class="materialize-textarea"><?php echo $cuento['contenido'] ?></textarea>
            <label class="black-text" for="contenido">Redacta aquí</label>
            <span class="helper-text" ></span>
          </div>
        </div>
      
        <div class="row">
          <button class="waves-effect waves-light btn col s12 light-blue darken-4">Enviar</button>
        </div>
      </form>
      <div class="col m2 l3"></div>
    </div> 
  </div>

  <style type="text/css">
    body{
      margin-bottom: -11px;
    }
    .fondo{
      background-color: white;
      box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;

    }
    p{
      margin-left: 10px;
    }
    button{
      margin-bottom: -20px;
    }
    body{
      background-color:#143D59 ;
    }
    
  </style>
  <script>
    var regex = new RegExp("^[a-zA-Záéíóúü ]+$");

    let autorValido = true;
    let parentescoValido = true;
    let tituloValido = true;
    let contenidoValido = true;

    const form = document.getElementById("editarcuento");

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
  <script src="src/js/main.js" type="text/javascript" charset="utf-8" async defer></script> 
  <script src="src/js/splash.js" type="text/javascript" charset="utf-8" async defer></script>    
</body>
</html>