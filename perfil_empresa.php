<?php
  session_start();
  include 'config.php';
  include 'cabecalho.php';
  
  $consulta = $connect->query('SELECT id_empresa, cnpj, nome, rua, numero, complemento, bairro, cidade, foto_perfil, descricao, telefone, email_empresa, id_estado, id_usuario FROM empresa WHERE id_usuario="'.$_SESSION['id_usuario'].'"');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_empresa = $linha['id_empresa'];
    $cnpj = $linha['cnpj']; 
    $nome = $linha['nome'];
    $nome = $linha['nome'];
    $rua = $linha['rua'];
    $numero = $linha['numero'];
    $complemento = $linha['complemento'];
    $bairro = $linha['bairro'];
    $cidade = $linha['cidade'];
    $foto_perfil = $linha['foto_perfil'];
    $descricao = $linha['descricao']; 
    $telefone = $linha['telefone']; 
    $email_empresa = $linha['email_empresa'];
    $estado = $linha['id_estado']; 
    $id_usuario = $_SESSION['id_usuario'];
  }

  $consulta = $connect->query('SELECT id_estado, sigla FROM estados WHERE id_estado="'.$estado.'"');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_estado = $linha['id_estado'];
    $sigla = $linha['sigla']; 
  }
  
?>
<br><br><br>
  <div class="ui special cards" style="margin: 3%; float: left;">

  <div class="card">
    <div class="blurring dimmable image">
      <div class="ui inverted dimmer">
        
      </div>
      <img src="imagens/perfil.png">
    </div>
    <div class="content">
      <h1 class="header">Nome: <?php echo $nome; ?></h1>
      <div class="meta">
        <h4 class="date">Email: <?php echo $email_empresa; ?></h4>
      </div><br>
      <div class="meta">
        <h4 class="date">CNPJ: <?php echo $cnpj; ?></h4>
      </div><br>
      <div class="meta">
        <h4 class="date">Telefone: <?php echo $telefone; ?></h4>
      </div><br>
      <div class="meta">
        <h4 class="date">Endereço: <?php echo "Rua "."$rua".", n°"."$numero"." -  "."$bairro".". ".$cidade." - "."$sigla"."<br>Complemento: "."$complemento"."."; ?></h4>
      </div><br>
    </div>
    <div class="extra content">
      <?php
         echo "<a href=register_empresa.php?acao=upd&id=".$id_empresa.">";?>
        <i class="edit icon"></i>
        Editar Perfil
      </a>
    </div>
  </div>
</div>

<h1 class="header">Sobre Nós</h1>
<br><br>
<h5 class="descricao_empresa">
  <?php echo $descricao; ?>
</h5>

<?php
include 'rodape.php';
?>