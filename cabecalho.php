<?php
  require 'config.php';
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
    	<a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-light-blue">  <i class="home alternate icon"></i></a>
    
      <select class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue" onchange="location = this.value;">
        <option value="eventos.php">Aniversários</option>
        <option value="eventos.php">15 Anos</option>
        <option value="eventos.php">Festa Infantil</a></option>
      </select>
    	<a href="eventos.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Casamento</a>
   		<a href="eventos.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Corporativo</a>
    	<a href="eventos.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Formatura</a>
    	<a href="sobre.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Sobre Nós</a>


			<?php 
				if (isset($_SESSION['email'])) {	
          echo '<a href="perfil_usuario.php" class="w3-bar-item w3-button w3-padding-large">Meu Perfil</a>';				
					echo '<a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Logout</a>';
				} else {
					echo '<a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue">Login</a>';
				}
    	?>

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
    	<a href="sobre.php" class="w3-bar-item w3-button w3-padding-large">Sobre Nós</a>
			<?php 
				if ( isset($_SESSION['email']) ) {
          echo '<a href="perfil_usuario.php" class="w3-bar-item w3-button w3-padding-large">Meu Perfil</a>';
					echo '<a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>';
				} else {
					echo '<a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>';
				}
    	?>
  	</div>
</div>

<!--
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  .modal-header, h4, .close {
    background-color: #5cb85c;
    color:white !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-footer {
    background-color: #f9f9f9;
  }
  </style>
</head>
<body>

<div class="container">
  <h2>Modal Login Example</h2>-->
  <!-- Trigger the modal with a button -->
  <!--<button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>-->

  <!-- Modal -->
  <!--<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">-->
    
      <!-- Modal content-->
      <!--<div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
</script>

</body>
</html>
-->