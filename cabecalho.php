<?php
  require_once 'config.php';
  mb_internal_encoding("UTF-8"); 
  mb_http_output( "iso-8859-1" );  
  ob_start("mb_output_handler");   
  header("Content-Type: text/html; charset=ISO-8859-1",true);
?>


<!DOCTYPE html>
  <html lang="en">
	<link rel="icon" type="image/jpg" href="imagens/logo.png">
	<title>Celebrate | Festas e Eventos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css"> -->
	<link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.css">
	<link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/estilo.css">
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link href="css/style.css" rel="stylesheet"> -->
  

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

	<style>
		body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
		.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
		.fa-anchor,.fa-coffee {font-size:200px}
	</style>

<body>



<!-- Navbar -->
<div class="w3-top">
	<div class="w3-bar w3-card w3-left-align w3-white w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-light-blue w3-large w3-black" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <!-- Parte do Prof -->
    <?php
      if(isset($errMsg)){
        echo '<div style="color:#FF0000;text-align:center;font-size:18px;">'.$errMsg.'</div>';
      }
    ?>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-light-blue">  <i class="home alternate icon"></i></a>
    

    <select class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue" onchange="location = this.value;">
      <option value="eventos.php?acao=aniversario&id=6">Aniversários</option>
      <option value="eventos.php?acao=aniversario&id=6">Geral</option>
      <option value="eventos.php?acao=debutante&id=1">15 Anos</option>
      <option value="eventos.php?acao=infantil&id=5">Infantil</option>
    </select>


   
    <a href="eventos.php?acao=casamento&id=2" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Casamento</a>
   	<a href="eventos.php?acao=corporativo&id=3" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Corporativo</a>
    <a href="eventos.php?acao=formatura&id=4" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Formatura</a>
    <a href="sobre.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Sobre Nós</a>


		<?php 
			if (isset($_SESSION['email'])) {	
        echo '<a href="perfil_usuario.php" class="w3-bar-item w3-button w3-padding-large w3-hover-light-blue">Meu Perfil</a>';				
				echo '<a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Logout</a>';
			} else {
				echo '<a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Login</a>';
			}
    ?>		

    <div class="ui mini icon input"  style="float: right; margin-top: 3px; margin-right: 2%;">
      <form method="POST" action="pesquisar.php" class="ui search">
        <input class="prompt" type="text" name="pesquisar" placeholder="Pesquisar...">
        <i class="search icon"></i>
      </form>
    </div>
  </div>

   

  <!-- Navbar on small screens -->
	<div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <select class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue" onchange="location = this.value;">
      <option value="eventos.php?acao=aniversario&id=6">Aniversários</option>
      <option value="eventos.php?acao=debutante&id=1">15 Anos</option>
      <option value="eventos.php?acao=infantil&id=5">Festa Infantil</option>
    </select>
    
    <a href="eventos.php?acao=casamento&id=2" class="w3-bar-item w3-button w3-padding-large">Casamentos</a>
    <a href="eventos.php?acao=corporativo&id=3" class="w3-bar-item w3-button w3-padding-large">Corporativo</a>
    <a href="eventos.php?acao=formatura&id=4" class="w3-bar-item w3-button w3-padding-large">Formatura</a>
    <a href="sobre.php" class="w3-bar-item w3-button w3-padding-large">Sobre Nós</a>
			
    <?php 
			if ( isset($_SESSION['id_usuario']) ) {
        echo '<a href="perfil_usuario.php" class="w3-bar-item w3-button w3-padding-large">Meu Perfil</a>';
				echo '<a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>';
			} else {
				echo '<a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>';
			}
    ?>

    <div class="ui search" style="float: right;">
      <div class="ui icon input">
        <form method="POST" action="pesquisar.php">
          <input class="prompt" type="text" name="pesquisar" placeholder="Pesquisar...">
          <i class="search icon"></i>
        </form>
      </div>
    </div>
  </div>
</div>

<div>
  <br><br><br>
    
</div>