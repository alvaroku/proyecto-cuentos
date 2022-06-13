<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="src/css/splash.css">
</head>
<body>
  <a href="index.php"><i  class="material-icons white-text small">arrow_back</i></a>

  <div id="contenedor_carga" class="contenedor_carga">
    <div class="carga"></div>
  </div>
 
  
  <div class="container">
     
    <div class="row ">
      <div class="col m2 l3"></div>
      <form class="col s12 m8 l6 fondo " id="registro" action="procesos/registro_usuario.php" method="post" enctype="multipart/form-data">
        
        <div class="row">
           <div class="input-field col s12">
            <i class="material-icons prefix light-blue-text text-darken-4 ">account_circle</i>
            <input onkeyup="validarNombre()" name="nombre" required id="nombre" type="text" class="">
            <label class="black-text" for="nombre">Nombre</label>
            <span class="helper-text"> </span>
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix light-blue-text text-darken-4 ">account_circle</i>
            <input onkeyup="validarApellido()" name="apellido" required id="apellido" type="text" class="">
            <label class="black-text" for="apellido">Apellido</label>
            <span class="helper-text"> </span>
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix light-blue-text text-darken-4 ">mail</i>
            <input onkeyup="validarCorreo()" name="email" required id="email" type="email" class="">
            <label class="black-text" for="email">Email</label>
            <span class="helper-text"> </span>
          </div>
          <div class="input-field col s12 ">
            <i class="material-icons prefix light-blue-text text-darken-4 ">block</i>
            <input onkeyup="validarContra()" name="pass" required id="contraseña" type="password" class="">
            <label class="black-text" for="contraseña">Contraseña</label>
            <span class="helper-text"> </span>
          </div>
          <div class="input-field col s12 ">
            <i class="material-icons prefix light-blue-text text-darken-4 ">phone</i>
            <input onkeyup="validarTel()" name="tel" required id="telefono" type="tel" class="">
            <label class="black-text" for="telefono">Telefono</label>
            <span class="helper-text"> </span>
          </div>
          <div class="file-field input-field col s12">
            <div class="btn light-blue darken-4">
              <span>Imagen</span>
              <input name="image" id="image" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate black-text" type="text" placeholder="Sube una foto de perfil">
            </div>
          </div>
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
    
    body{
      margin-bottom: -11px;
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
    var regex = new RegExp("^[a-zA-Záéíóúü ]+$");
    let expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var regNum = new RegExp("^[0-9]+$");

    let nombreValido = false;
    let correoValido = false;
    let contraValido = false;
    let telValido = false;

    const form = document.getElementById("registro");

    let inputNombre = form.elements['nombre'];
    let inputApellido = form.elements['apellido'];
    let inputCorreo = form.elements["email"];
    let inputContra = form.elements["pass"];
    let inputTel = form.elements["telefono"];

    form.addEventListener('submit',(event)=>{
      event.preventDefault();

      if(nombreValido&&correoValido&&contraValido&&telValido){
        form.submit();
      }
    });

    function validarNombre() {
      let resp;
      resp = inputNombre.value.trim();
      let mensaje = "";

      if(resp==""){
        nombreValido=false;
        inputNombre.classList.remove("valid");
        inputNombre.classList.add("invalid");
        mensaje = "Por favor ingrese un dato";
      }else if (!regex.test(resp)) {
        nombreValido=false;
        inputNombre.classList.remove("valid");
        inputNombre.classList.add("invalid");
        mensaje = "Por favor ingrese solo letras"
      }else{
        inputNombre.classList.remove("invalid");
        inputNombre.classList.add("valid");
        nombreValido=true;
        mensaje = "Bien!";
        ;
      }

      inputNombre.parentNode.querySelector("span").innerHTML=mensaje;
    }
    function validarApellido() {
      let resp;
      resp = inputApellido.value.trim();
      let mensaje = "";

      if(resp==""){
        apellidoValido=false;
        inputApellido.classList.remove("valid");
        inputApellido.classList.add("invalid");
        mensaje = "Por favor ingrese un dato";
      }else if (!regex.test(resp)) {
        apellidoValido=false;
        inputApellido.classList.remove("valid");
        inputApellido.classList.add("invalid");
        mensaje = "Por favor ingrese solo letras";
      }else{
        inputApellido.classList.remove("invalid");
        inputApellido.classList.add("valid");
        apellidoValido=true;
        mensaje = "Bien!";
        
      }

      inputApellido.parentNode.querySelector("span").innerHTML=mensaje;
    }
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
    function validarTel() {
      let resp;
      resp = inputTel.value.trim();
      let mensaje = "";

      if(resp==""){
        telValido=false;
        inputTel.classList.remove("valid");
        inputTel.classList.add("invalid");
        mensaje = "Ingrese su telefono";
      }else if (!regNum.test(resp)) {
        inputTel.classList.remove("valid");
        inputTel.classList.add("invalid");
        telValido=false;
        mensaje = "Ingrese solo números";  
      }else if(resp.length!=10){
        inputTel.classList.remove("valid");
        inputTel.classList.add("invalid");
        telValido=false;
        mensaje = "Debe ingresar 10 dígitos";
      }else{
        telValido=true;
        inputTel.classList.remove("invalid");
        inputTel.classList.add("valid");
        mensaje = "Bien!!";
      }

      inputTel.parentNode.querySelector("span").innerHTML=mensaje;
    }
  </script>
  <script src="src/js/main.js" type="text/javascript" charset="utf-8" async defer></script> 
  <script src="src/js/splash.js" type="text/javascript" charset="utf-8" async defer></script>    
</body>
</html>