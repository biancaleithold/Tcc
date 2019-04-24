<?php
	include 'cabecalho.php';
?>
<br><br><br>
  <div class="ui special cards" style="margin: 3%">

  <div class="card">
    <div class="blurring dimmable image">
      <div class="ui inverted dimmer">
        
      </div>
      <img src="imagens/perfil.png">
    </div>
    <div class="content">
      <h1 class="header">Nome:</h1>
      <div class="meta">
        <h4 class="date">Email:</h4>
      </div>
    </div>
    <div class="extra content">
      <a href="#">
        <i class="edit icon"></i>
        Editar Perfil
      </a>
    </div>
  </div>
</div>
<button class="ui basic button" style="margin-left: 3%">
  <i class="icon plus"></i>
  <a href="register_fornecedor.php" style="color: black">Cadastrar Fornecedor</a> 
</button>
<button class="ui basic button">
  <i class="icon plus"></i>
  <a href="#" style="color: black">Cadastrar Evento</a> 
</button>

<table class="ui fixed table">
  <h1 class="header">Meus Eventos</h1>
  <thead>
    <tr>
      <th>Nome do Evento</th>
      <th>Data</th>
      <th>Local</th>
      <th>Descrição</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Casamento Juliana</td>
      <td>20/06/2019</td>
      <td>Restaurante Viapiana</td>
      <td>Casamento Juliana e Marcelo, bla bla...</td>
    </tr>
  </tbody>
</table>