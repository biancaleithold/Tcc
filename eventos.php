<?php
  
  require 'config.php';
  include("cabecalho.php");

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script><-->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
    .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
    .fa-anchor,.fa-coffee {font-size:200px}
  </style>
</head>
<body style="background: #f1f8f9;">
<center>
  <h1 class="titulo_evento" style="margin-top: 5%; ">CASAMENTOS</h1>
<div id="sol" class="carousel slide" data-ride="carousel" style= "width:60%">
  <ol class="carousel-indicators">
    <li data-target="#casamento" data-slide-to="0" class="active"></li>
    <li data-target="#aniversario" data-slide-to="1"></li>
    <li data-target="#infantil" data-slide-to="2"></li>
    <li data-target="#fomatura" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner" >
    <div class="carousel-item active" >
      <img class="d-block w-100" src="imagens/casamento1.jpg" alt="First slide" >
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="imagens/casamento2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="imagens/casamento3.jpg" alt="Third slide" >
    </div>
     <div class="carousel-item" >
      <img class="d-block w-100" src="imagens/casamento4.jpg" alt="Fourth slide" >
    </div>
  </div>
  <a class="carousel-control-prev" href="#sol" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#sol" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="dropdown">
  <button class="dropbtn">O que você procura?</button>
  <div class="dropdown-content">
    <a href="#">Barbearia</a>
    <a href="#">Buffet</a>
    <a href="#">Cerimonialista</a>
    <a href="#">Cia de Viagem</a>
  </div>
</div>
<div>
  <h4 class="texto_evento" style="margin-top: 2%;   margin-bottom: 10%;">Nosso objetivo é facilitar a organização de seu evento, ajudando de maneira mais prática na realização deste sonho. Temos a meta de auxiliar o usuário usando recursos como:  uma agenda para anotar seus devidos compromissos como reuniões ou até mesmo a data do evento, o usuário também terá maior controle sobre suas despesas, pois o  sistema será capaz de lhe apresentar os valores com base nos contratos realizados e terá acesso a uma lista de convidados por evento para melhor administrar sua festa.</h4>
</div>