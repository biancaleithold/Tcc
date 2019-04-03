<?php
  require 'config.php';
  include("cabecalho.php");
?>

<!-- Header -->
<header class="w3-container w3-center" style="padding:128px 16px; background-image: url(imagens/fundo1.png);">
	<img class="w3-margin w3-jumbo" src="imagens/logo.png">
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
	<div class="w3-content">
    	<div class="w3-twothird">
    		<h1>Minhas Agenda</h1>
    		<h5 class="w3-padding-32" style="font-size: x-large; font-weight: normal;">Com Minha Agenda você pode conferir seus compromissos durante o progresso do seu evento, como reuniões!</h5>
    	</div>

    	<div class="w3-third w3-center">
    		<img style="width: 90%;" src="imagens/calendario.png">
    	</div>
  	</div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-white w3-padding-64 w3-container">
	<div class="w3-content">
    	<div class="w3-third w3-center">
      		<img src="imagens/caculadora.png">
    	</div>

    	<div class="w3-twothird">
      		<h1>Minhas Despesas</h1>
      		<h5 class="w3-padding-32" style="font-size: x-large; font-weight: normal;">Controle seus gastos com o Minhas Despesas! Verifique seu saldo durante a organização obtendo um planejamento muito melhor!</h5>
    	</div>
  	</div>
</div>

<!-- Third Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
	<div class="w3-content">
    	<div class="w3-twothird">
      		<h1>Fornecedores</h1>
      		<h5 class="w3-padding-32" style="font-size: x-large; font-weight: normal;">Disponibilizamos a lista dos melhores fornecedores da região para tornar seu evento inesquecível!</h5>
    	</div>

    	<div class="w3-third w3-center">
      		<img style="width: 80%;" src="imagens/maleta.png">
    	</div>
  	</div>
</div>

<!-- Fourth Grid -->
<div class="w3-row-padding w3-white w3-padding-64 w3-container">
	<div class="w3-content">
    	<div class="w3-third w3-center">
      		<img style="width: 71%;" src="imagens/convidados.png">
   	 	</div>

    	<div class="w3-twothird">
      		<h1>Convidados</h1>
      		<h5 class="w3-padding-32" style="font-size: x-large; font-weight: normal;">Muitos convidados em mente? Monte sua lista de convidados para uma boa organização!</h5>
    	</div>
  	</div>
</div>

<div class="w3-container w3-center w3-padding-64 w3-light-blue">
	<h1 style="font-weight: normal;" class="w3-margin w3-xlarge">AQUI SUA FESTA ACONTECE!</h1>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center">  
	<div class="w3-xlarge w3-padding-32">
    	<i class="fa fa-facebook-official w3-hover"></i>
    	<i class="fa fa-instagram w3-hover"></i>
    	<i class="fa fa-pinterest-p w3-hover"></i>
 	</div>
 	<p>Bianca - Elizabeth - Karen</p>
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
	var x = document.getElementById("navDemo");
  	if (x.className.indexOf("w3-show") == -1) {
    	x.className += " w3-show";
  	} else { 
    	x.className = x.className.replace(" w3-show", "");
  	}
}
</script>

</body>