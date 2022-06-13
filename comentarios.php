<?php 
session_start();
if(!isset($_GET['idCu'])){
  echo "<script>location.href='index.php?error=1';</script>";  
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Comentarios</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="src/css/splash.css">
</head>
<body>

	<a href="cuentos.php"><i  class="material-icons white-text small">arrow_back</i></a>
	
	<div class="container  ">
		<h4 class="amber-text">Comentarios</h4>
	     <?php if (!isset($_SESSION['idUs'])||!isset($_GET['idCu'])) {
	       echo "<p class='amber-text'><b>Debes iniciar sesion para comentar</b></p>";
	      }else{
	     ?>

	     <div class="row">
	     	<div class="col l2 m2 "></div>
	         <form class="col s12 m8 l8" action="procesos/comentar.php" method="post">
	         	<input name="idUs" type="hidden" value="<?php echo $_SESSION['idUs'] ?>">
	         	<input name="idCu" type="hidden" value="<?php echo $_GET['idCu'] ?>">
	          <div class="row">
	           <div class="input-field col s11">
	             <textarea name="contenido" required id="comentario" class="materialize-textarea white-text"></textarea>
	             <label for="comentario">Escriba su comentario</label>
	           </div>
	           <div class="col s1"><button class="btn-flat com"><i class="material-icons large white-text">send</i></button></div>
	          </div>
	         </form>
	         <div class="col l2 m2 "></div>
	     </div>
	     <?php
	      }
	      $comentarios=array();
	      if(isset($_GET['idCu'])){
	      	include("funciones/funcComentarios.php");
	      	$comentarios = readComs($_GET['idCu']);
	      }
	      
	      if(count($comentarios)==0){
	        echo "<h3  class='white-text center'>No hay comentarios :(</h1>";
	      }else{
	        foreach ($comentarios as $comentario) {
	        	include_once("funciones/funcUsuarios.php");
	        	$autorCom = getUserInfo($comentario['idUs']);
	      ?>
	      		<div class="row">
	      			<div class="col m2 l2"></div>
	      			<div class="f-card black-text col s12 l8 m8  grey darken-4 blue-grey-text text-lighten-5">
	      			 <div class="header">
	      			   <?php  
	      			   if($autorCom['perfil']==NULL){
	      			   ?>
	      			     <img class="co-logo perfil" src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_960_720.png" />
	      			   <?php  
	      			   }else{
	      			   ?>
	      			     <img class="co-logo perfil" src="<?php echo 'data:image/jpeg;base64,'.base64_encode($autorCom['perfil'])?>"/>
	      			   <?php  
	      			   } 
	      			   ?>
	      			   
	      			   <div class="co-name"><a href="#" class="blue-grey-text text-lighten-5"><?php echo $autorCom['nombre']." ".$autorCom['apellido'] ?> </a></div>
	      			   <div class="time"><a href="#"><?php echo $comentario['fechaPub'] ?></a> </div>
	      			 </div>
	      			 <div class="reference">
	      			   <div class="reference-content">
	      			     <div class="reference-subtitle"><?php echo $comentario['contenido'] ?></div>
	      			   </div>

	      			   <?php
	      			   if(isset($_SESSION['idUs'])&&$_SESSION['idUs']==$comentario['idUs']){
	      			   	$idCom = $comentario['idCom'];
	      			   	$idCu = $comentario['idCu'];
	      			   	$contenido = $comentario['contenido'];
	      			   	?>
	      			   	<div class="social">
	      			   	  <div class="social-buttons">
	      			   	  	<div class="row center">
	      			   	  		<div class="col s6">
	      			   	  			<a class="blue-grey-text text-lighten-5" href='procesos/eliminar_comentario.php?idCom=<?php echo $idCom ?>&idCu=<?php echo $idCu ?>'><i class='material-icons blue-grey-text text-lighten-5'>delete</i></a>
	      			   	  		</div>
	      			   	  		<div class="col s6">
	      			   	  			<a onclick="datosModal('<?php echo "$idCom" ?>','<?php echo "$idCu" ?>','<?php echo "$contenido" ?>')" class='modal-trigger blue-grey-text text-lighten-5' href='#modal1'><i class='material-icons blue-grey-text text-lighten-5'>edit</i></a>
	      			   	  		</div>
	      			   	  	</div>
	      			   	  	
	      			   	  	
	      			   	  </div>
	      			   	</div>

	      			    
	      			   <?php 
	      			   	} 
	      			    ?>
	      			   
	      			 </div>
	      			</div>
	      			<div class="col m2 l2"></div>
	      		</div>

	       <?php 
	        }
	      }
	      ?>
	</div>
	<!-- Modal Structure -->
	<div id="modal1" class="modal amber-text">
		<form action="procesos/actualizar_comentario.php" method="post">
			<div class="modal-content">
			  <h4>Editando tu comentario</h4>
			  <input name="idCom" type="hidden" id="idCom">
			  <input name="idCu" type="hidden" id="idCu">
			  <div class="row">
			  	<div class="input-field col s12">
			  		<textarea rows="20" required name="contenido" id="contenido" class="materialize-textarea white-text"></textarea>	
			    </div>
			  </div>
			</div>
			<div class="modal-footer">
			  <input class="btn  light-blue darken-4 " type="submit">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
			</div>
		</form>
	</div>   

	<style type="text/css">
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
      margin-left:8px;
      margin-top: 8px;
      width:40px;
      height:40px;
    }

 

    .content {
      clear:both;
       
      font-size:20px;
      line-height: 1.38;
    }
    .time > a {
      color: #90949c;
      text-decoration:none;
    }

    .time > a:hover, .co-name > a:hover {
      text-decoration:underline;
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

    body,.modal,.modal-footer{
	  	background-color:#143D59 ;
	  }
	</style>
	<script>
		function datosModal(idCom,idCu,contenido) { 
			$("#idCom").val(idCom);
			$("#idCu").val(idCu);
			$("#contenido").html(contenido);
		}
	 
		$(document).ready(function() {
		    M.updateTextFields();
		    $('.modal').modal();
		});
	</script>
	<script src="src/js/splash.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>