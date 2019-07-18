<?php
  
  require 'config.php';
  include("cabecalho.php");

  $stmt = $connect->query('SELECT id_categoria, nome, descricao FROM categoria_evento WHERE id_categoria=":id"');
  while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id_categoria = $rs['id_categoria']; 
    $nome = $rs['nome'];
    $descricao = $rs['descricao'];
  }

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

<?php
try {
 
    $stmt = $connect->prepare("SELECT id_categoria, nome, descricao FROM categoria_evento WHERE id_categoria=:id");

    if ($stmt->execute(array(
          ':id' => $id_categoria))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<h1 class='titulo_evento' style='margin-top:5%;'>".utf8_encode($rs->nome);
              }
            }
          }catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}
?>


  <!--<h1 class="titulo_evento" style="margin-top: 5%; ">CASAMENTOS</h1>-->
<div id="sol" class="carousel slide" data-ride="carousel" style= "width:60%">
  <ol class="carousel-indicators">
    <li data-target="#casamento1" data-slide-to="0" class="active"></li>
    <li data-target="#casamento2" data-slide-to="1"></li>
    <li data-target="#casamento3" data-slide-to="2"></li>
    <li data-target="#casamento4" data-slide-to="3"></li>
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
<select class="ui search dropdown" style="float: left;margin-left: 20%;margin-top: 2%;">
    <option value="">O que você procura?</option>
    <option value="animacao">Animação</option>
    <option value="barbearia">Barbearia</option>
    <option value="brinquedos">Brinquedos</option>
    <option value="buffet">Buffet</option>
    <option value="cerimonialista">Cerimonialista</option>
    <option value="cia">CIA Viagem</option>
    <option value="confeitaria">Confeitaria</option>
    <option value="convite">Convite</option>
    <option value="decoracao">Decoração</option>
    <option value="filmagem">Filmagem</option>
    <option value="floricultura">Floricultura</option>
    <option value="fotografia">Fotografia</option>
    <option value="garcom">Garçom</option>
    <option value="joalheria">Joalheria</option>
    <option value="lembrancas">Lembranças</option>
    <option value="carro">Locação de Carro</option>
    <option value="trajes">Locação e Compra de Trajes</option>
    <option value="local">Locação do Local</option>
    <option value="musica">Música</option>
    <option value="recepcao">Recepção</option>
    <option value="salao">Salão de Beleza</option>
    <option value="seguranca">Segurança</option>
 </select>


<?php
try {
 
    $stmt = $connect->prepare("SELECT id_categoria, nome, descricao FROM categoria_evento WHERE id_categoria=:id");

    if ($stmt->execute(array(
          ':id' => $id_categoria))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {           
                echo "<div><h4 class='texto_evento' style='margin-top:2%; margin-bottom10%'>".utf8_encode($rs->descricao)."</h4></div>";
              }
            }
          }catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}
?>

<!--<div>
  <h4 class="texto_evento" style="margin-top: 2%;   margin-bottom: 10%;">Nosso objetivo é facilitar a organização de seu evento, ajudando de maneira mais prática na realização deste sonho. Temos a meta de auxiliar o usuário usando recursos como:  uma agenda para anotar seus devidos compromissos como reuniões ou até mesmo a data do evento, o usuário também terá maior controle sobre suas despesas, pois o  sistema será capaz de lhe apresentar os valores com base nos contratos realizados e terá acesso a uma lista de convidados por evento para melhor administrar sua festa.</h4>
</div>-->


<?php
include 'rodape.php';
?>