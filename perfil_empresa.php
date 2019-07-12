<?php
  session_start();
  include 'config.php';
  include 'cabecalho.php';
  
  $consulta = $connect->query('SELECT id_empresa, cnpj, nome, rua, numero, complemento, bairro, cidade, estado, foto_perfil, descricao, telefone, email_empresa FROM empresa, usuario WHERE empresa.id_usuario = usuario.id_usuario AND usuario.id_usuario = 1"');
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
    $estado = $linha['estado']; 
    $foto_perfil = $linha['foto_perfil'];
    $descricao = $linha['descricao']; 
    $telefone = $linha['telefone']; 
    $email_empresa = $linha['email_empresa'];
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
      </div>
      <div class="meta">
        <h4 class="date">CNPJ: <?php echo $cnpj; ?></h4>
      </div>
      <div class="meta">
        <h4 class="date">Telefone: <?php echo $telefone; ?></h4>
      </div>
      <div class="meta">
        <h4 class="date">Endereço: <?php echo "$rua".-"$numero"."$complemento"."$bairro"."$cidade"."$estado"; ?></h4>
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

<h1 class="header">Sobre Nós</h1>
<br><br>
<h5 class="descricao_empresa">
  lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</h5>

<?php
include 'rodape.php';
?>