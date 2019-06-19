<?php
  include("cabecalho.php");
?>

<html>
<head>

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
  <h1 style="margin-top: 5%; margin-bottom: 2%;">Celebrate Festas e Eventos</h1>
<div id="sol" class="carousel slide" data-ride="carousel" style= "width:60%">
  <ol class="carousel-indicators">
    <li data-target="#casamento" data-slide-to="0" class="active"></li>
    <li data-target="#aniversario" data-slide-to="1"></li>
    <li data-target="#infantil" data-slide-to="2"></li>
    <li data-target="#fomatura" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner" >
    <div class="carousel-item active" >
      <img class="d-block w-100" src="imagens/casamento.jpg" alt="First slide" >
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="imagens/aniversario.jpg" alt="Second slide">
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="imagens/infantil.jpg" alt="Third slide" >
    </div>
     <div class="carousel-item" >
      <img class="d-block w-100" src="imagens/fomatura.jpg" alt="Fourth slide" >
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
<div class="sobre">
  <h4>Nosso objetivo é facilitar a organização de seu evento, ajudando de maneira mais prática na realização deste sonho. Temos a meta de auxiliar o usuário usando recursos como:  uma agenda para anotar seus devidos compromissos como reuniões ou até mesmo a data do evento, o usuário também terá maior controle sobre suas despesas, pois o  sistema será capaz de lhe apresentar os valores com base nos contratos realizados e terá acesso a uma lista de convidados por evento para melhor administrar sua festa. Além de todos esses ótimos recursos, caso você usuário tenha alguma empresa que se relaciona a festas como decoração, dj, entre outros, poderá cadastrar sua empresa para que se torne um de nossos fornecedores segundo o ramo em que você trabalha, tendo então seu trabalho divulgado. Este sistema para web foi desenvolvido como projeto final do curso Ensino Médio Integrado ao Técnico em Informática do Instituto Federal Catarinense Campus Araquari. </h4>
</div>
  <br><br><br><br>
  <h1>Nossas Desenvolvedoras</h1>
<div style="margin-top: 4%; margin-left: 19%" class="ui four cards">
  <a class="red card">
    <div class="image">
      <img src="imagens/bianca">
      <h5>Bianca Leithold</h5>
    </div>
  </a>
  <a class="orange card">
    <div class="image">
      <img src="imagens/beth">
      <h5>Elizabeth Antunes</h5>
    </div>
  </a>
  <a class="yellow card">
    <div class="image">
      <img src="imagens/karen.jpg">
      <h5>Karen Fernandes</h5>
    </div>
  </a>
</body>
</html>
