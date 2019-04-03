<<!DOCTYPE html>
  <html lang="en">
	<link rel="icon" type="image/jpg" href="imagens/logo.png">
	<title>Celebrate | Festas e Eventos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="semantic/dist/semantic.min.js"></script>
	<script type="text/javascript" src="Semantic-UI-CSS-master/package.js"></script>
	<script type="text/javascript" src="Semantic-UI-CSS-master/semantic.js"></script>
	<script type="text/javascript" src="Semantic-UI-CSS-master/semantic.min.js"></script>
	<script type="text/javascript" src="Semantic-UI-CSS-master/package.json"></script>
	<link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.css">
	<link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
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

    	<a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-light-blue">Home</a>
    	<select class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">
  			<option value="aniversarios"><a href="#">Aniversários</a></option>
  			<option value="15anos"><a href="#">15 Anos</a></option>
  			<option value="festa_infantil"><a href="#">Festa Infantil</a></option>
		</select>
    	<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Casamento</a>
   		<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Corporativo</a>
    	<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Formatura</a>
    	<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Sobre Nós</a>
      <a href="register.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Cadastre-se</a>
    	<a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Login</a>

  		<div class="ui inverted left icon input" style="float: right;">
    		<input type="text" placeholder="Pesquisar...">
    		<i class="search icon"></i>
  		</div>
  	</div>

  <!-- Navbar on small screens -->
	<div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    	<a href="index.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
    	<select class="w3-bar-item w3-button w3-padding-large">
    		<option value="aniversarios"><a href="#">Aniversários</a></option>
  			<option value="15anos"><a href="#">15 Anos</a></option>
  			<option value="festa_infantil"><a href="#">Festa Infantil</a></option>
    	</select>
    	<a href="#" class="w3-bar-item w3-button w3-padding-large">Casamentos</a>
    	<a href="#" class="w3-bar-item w3-button w3-padding-large">Corporativo</a>
    	<a href="#" class="w3-bar-item w3-button w3-padding-large">Formatura</a>
    	<a href="#" class="w3-bar-item w3-button w3-padding-large">Sobre Nós</a>
      <a href="register.php" class="w3-bar-item w3-button w3-padding-large">Cadastre-se</a>
    	<a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
  	</div>
</div>