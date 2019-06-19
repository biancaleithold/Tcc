<?php
  
  require 'config.php';
  include("cabecalho.php");

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $logo = $_POST['logo'];
    $descricao = $_POST['descricao'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    if($cnpj == '')
      $errMsg = 'Insira seu cnpj';
    if($nome == '')
      $errMsg = 'Insira seu nome';
     if($rua == '')
      $errMsg = 'Insira sua rua';
     if($numero == '')
      $errMsg = 'Insira o número do estabelecimento';
    if($complemento == '')
      $errMsg = 'Insira o complemento';
    if($bairro == '')
      $errMsg = 'Insira o bairro';
    if($cidade == '')
      $errMsg = 'Insira a cidade';
    if($estado == '')
      $errMsg = 'Insira o estado';
    if($logo == '')
      $errMsg = 'Insira sua logomarca';
    if($descricao == '')
      $errMsg = 'Insira a descricao';
    if($telefone == '')
      $errMsg = 'Insira seu telefone';
    if($email == '')
      $errMsg = 'Insira seu email';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO fornecedor (cnpj, nome, rua, numero, complemento, bairro, cidade, estado, logo, descricao, telefone, email) VALUES (:cnpj, :nome, :rua, :numero, :complemento, :bairro, :cidade, :estado, :logo, :descricao, :telefone, :email)');
        $stmt->execute(array(
          ':cnpj' => $cnpj,
          ':nome' => $nome,
          ':rua' => $rua, 
          ':numero' => $numero,
          ':complemento' => $complemento,
          ':bairro' => $bairro,
          ':cidade' => $cidade,
          ':estado' => $estado,
          ':logo' => $logo,
          ':descricao' => $descricao,
          ':telefone' => $telefone,
          ':email' => $email
        ));
        header('Location: register_empresa.php?action=joined');
        exit;
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registrado com sucesso!<br><br>';
  }
?>

<br>
<br>
<br>
<br>

<div class="centraliza_img">
  <h1 style="margin-top: 1.5%">Cadastro de Empresa</h1>
</div>

<!--<div class="ui form login">

      Parte do Prof -->
      <?php
        if(isset($errMsg)){
          echo '<div style="color:green;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>

  <form class="ui form" style="max-width:65%; margin-left: 18%; margin-top: 2%">
  <div class="field"> 
    <div class="two fields">
      <div class="field">
        <label>CNPJ</label>
        <input type="text" name="cnpj" placeholder="00.000.000/0000-00">
      </div>
      <div class="field">
      <label>Nome</label>
        <input type="text" name="nome" placeholder="Celebrate Festas e Eventos">
      </div>
    </div>
  </div>
  <div class="field">
    <div class="fields">
      <div class="twelve wide field">
      <label>Rua</label>
        <input type="text" name="rua" placeholder="Juscelino Kubitschek">
      </div>
      <div class="four wide field">
        <label>Número</label>
        <input type="text" name="numero" placeholder="198">
      </div>
      <div class="four wide field">
        <label>Complemento</label>
        <input type="text" name="complemento" placeholder="Apartamento 4987">
      </div>
    </div>
  </div>
  <div class="two fields">
    <div class="field">
      <label>Bairro</label>
       <input type="text" name="bairro" placeholder="Bucarein">
    </div>
    <div class="field">
      <label>Cidade</label>
        <input type="text" name="cidade" placeholder="Joinville">
    </div>
  </div>
  <div class="two fields">
      <div class="field">
        <label>Estado</label>
        <input type="text" name="estado" placeholder="SC">
      </div>
      <div class="field">
      <label>Logo</label>
        <input type="file" name="logo">
      </div>
      </div>
    </div>
  <div class="field">
    <label>Descrição</label>
    <textarea rows="2" placeholder="Estamos no mercado desde 1998!"></textarea>
  </div>
  <div class="two fields">
      <div class="field">
        <label>Telefone</label>
        <input type="text" name="telefone" placeholder="(47)99841-6593">
      </div>
      <div class="field">
      <label>E-mail</label>
        <input type="text" name="email" placeholder="celebrate.festas@gmail.com">
      </div>
  </div>
  <div class="ui form field">
    <label>Qual sua especialização?</label>
  <div class="inline fields">
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Decoração</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Fotografia</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Once a day</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Twice a day</label>
      </div>
    </div>
  </div>
  </div>
    <div style="float: right;" class="ui button" tabindex="0">Cadastrar</div>
</form>
<!--</div>
