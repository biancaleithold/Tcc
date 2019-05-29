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
<<<<<<< HEAD
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
=======

    if($cnpj == '')
      $errMsg = 'Enter your cnpj';
    if($nome == '')
      $errMsg = 'Enter nome';
     if($rua == '')
      $errMsg = 'Enter rua';
     if($numero == '')
      $errMsg = 'Enter numero';
    if($complemento == '')
      $errMsg = 'Enter complemento';
    if($bairro == '')
      $errMsg = 'Enter bairro';
    if($cidade == '')
      $errMsg = 'Enter cidade';
    if($estado == '')
      $errMsg = 'Enter estado';
    if($foto_perfil == '')
      $errMsg = 'Enter foto_perfil';
    if($descricao == '')
      $errMsg = 'Enter descricao';
    if($telefone == '')
      $errMsg = 'Enter telefone';
    if($email == '')
      $errMsg = 'Enter email';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO fornecedor (cnpj, nome, rua, numero, complemento, bairro, cidade, estado, foto_perfil, descricao, telefone, email) VALUES (:cnpj, :nome, :rua, :numero, :complemento, :bairro, :cidade, :estado, :foto_perfil, :descricao, :telefone, :email)');
>>>>>>> 92b00a849309fb55324a787fc5f80bb7149178fb
        $stmt->execute(array(
          ':cnpj' => $cnpj,
          ':nome' => $nome,
          ':rua' => $rua, 
          ':numero' => $numero,
          ':complemento' => $complemento,
          ':bairro' => $bairro,
          ':cidade' => $cidade,
          ':estado' => $estado,
<<<<<<< HEAD
          ':logo' => $logo,
=======
          ':foto_perfil' => $foto_perfil,
>>>>>>> 92b00a849309fb55324a787fc5f80bb7149178fb
          ':descricao' => $descricao,
          ':telefone' => $telefone,
          ':email' => $email
        ));
        header('Location: register_fornecedor.php?action=joined');
        exit;
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'joined') {
<<<<<<< HEAD
    $errMsg = 'Registrado com sucesso!<br><br>';
=======
    $errMsg = 'Registrado com sucesso! <br> Agora você pode logar. <br><br>';
>>>>>>> 92b00a849309fb55324a787fc5f80bb7149178fb
  }
?>

<br>
<br>
<br>
<br>

<div class="centraliza_img">
<<<<<<< HEAD
  <h1 style="margin-top: 3%; margin-bottom: 3%">Cadastro de Empresa</h1>
=======
  <h1 style="margin-top: 3%">Cadastro de Empresa</h1>
>>>>>>> 92b00a849309fb55324a787fc5f80bb7149178fb
</div>

<!--<div class="ui form login">

      Parte do Prof -->
      <?php
        if(isset($errMsg)){
          echo '<div style="color:green;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>

<<<<<<< HEAD
  <form class="ui form" style="max-width:65%; margin-left: 18%">
  <div class="field"> 
    <div class="two fields">
      <div class="field">
      	<label>CNPJ</label>
        <input type="text" name="cnpj" placeholder="00.000.000/0000-00">
      </div>
      <div class="field">
    	<label>Nome</label>
        <input type="text" name="nome" placeholder="Celebrate Festas e Eventos">
=======


<!--  <form action="" method="post">

      <section style="float: left;">

        <label>CNPJ</label>
        <input type="text" name="cnpj" value="<?php //if(isset($_POST['cnpj'])) echo $_POST['cnpj'] ?>"  placeholder="00.000.000/0000-00"/><br /><br / >

        <label>Nome da Empresa</label>
        <input type="text" name="nome" placeholder="Celebrate Festas e Eventos" value="<?php //if(isset($_POST['nome'])) echo $_POST['nome'] ?>" autocomplete="off" class="box"/><br /><br />

        <label>Rua</label>
        <input type="text" name="rua" placeholder="Juscelino Kubitschek" value="<?php //if(isset($_POST['rua'])) echo $_POST['rua'] ?>"/><br /><br />

        <label>Número</label>
        <input type="text" name="numero" placeholder="165" value="<?php //if(isset($_POST['numero'])) echo $_POST['numero'] ?>"/><br /><br />

        <label>Complemento</label>
        <input type="text" name="complemento" value="<?php //if(isset($_POST['complemento'])) echo $_POST['complemento'] ?>" placeholder="apartamento 4306" /><br /><br />

        <label>Bairro</label>
        <input type="text" name="bairro" value="<?php //if(isset($_POST['bairro'])) echo $_POST['bairro'] ?>" placeholder="Bucarein" /><br /><br />

      </section>  

      <section style="float: right;">

        <label>Cidade</label>
        <input type="text" name="cidade" value="<?php //if(isset($_POST['cidade'])) echo $_POST['cidade'] ?>" placeholder="Joinville" /><br /><br />

        <label>Estado</label>
        <input type="text" name="estado" value="<?php //if(isset($_POST['estado'])) echo $_POST['estado'] ?>" placeholder="Santa Catarina" /><br /><br />

        <label>Logotipo</label>
        <input type="file" name="logo" value="<?php //if(isset($_POST['logo'])) echo $_POST['logo'] ?>" /><br /><br />

        <label>Descrição</label>
        <input type="text" name="descricao" value="<?php //if(isset($_POST['descricao'])) echo $_POST['descricao'] ?>" placeholder="Trabalhamos neste ramo desde 1998" /><br /><br />

        <label>Telefone</label>
        <input type="text" name="telefone" value="<?php //if(isset($_POST['telefone'])) echo $_POST['telefone'] ?>" placeholder="(47)3489-6894" /><br /><br />

        <label>Email</label>
        <input type="text" name="email" value="<?php //if(isset($_POST['email'])) echo $_POST['email'] ?>" placeholder="celebrate.festaseeventos@gmail.com" /><br /><br />

      </section>
    <input type="submit" name='register' class="ui button botao"><br /><br />
  </form>
  <-->

  <form class="ui form">
  <h4 class="ui dividing header">Shipping Information</h4>
  <div class="field">
    <label>Name</label>
    <div class="two fields">
      <div class="field">
        <input type="text" name="shipping[first-name]" placeholder="First Name">
      </div>
      <div class="field">
        <input type="text" name="shipping[last-name]" placeholder="Last Name">
>>>>>>> 92b00a849309fb55324a787fc5f80bb7149178fb
      </div>
    </div>
  </div>
  <div class="field">
<<<<<<< HEAD
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
=======
    <label>Billing Address</label>
    <div class="fields">
      <div class="twelve wide field">
        <input type="text" name="shipping[address]" placeholder="Street Address">
      </div>
      <div class="four wide field">
        <input type="text" name="shipping[address-2]" placeholder="Apt #">
>>>>>>> 92b00a849309fb55324a787fc5f80bb7149178fb
      </div>
    </div>
  </div>
  <div class="two fields">
    <div class="field">
<<<<<<< HEAD
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
    <div style="float: right;" class="ui button" tabindex="0">Cadastrar</div>
=======
      <label>State</label>
      <select class="ui fluid dropdown">
        <option value="">State</option>
        <option value="AL">Alabama</option>
        <option value="AK">Alaska</option>
      </select>
    </div>
    <h4 class="ui dividing header">Billing Information</h4>
    <div class="field">
    <label>Card Type</label>
    <div class="ui selection dropdown">
      <input type="hidden" name="card[type]">
      <div class="default text">Type</div>
      <i class="dropdown icon"></i>
      <div class="menu">
        <div class="item" data-value="visa">
          <i class="visa icon"></i>
          Visa
        </div>
        <div class="item" data-value="amex">
          <i class="amex icon"></i>
          American Express
        </div>
        <div class="item" data-value="discover">
          <i class="discover icon"></i>
          Discover
        </div>
      </div>
    </div>
  </div>
  <div class="fields">
    <div class="seven wide field">
      <label>Card Number</label>
      <input type="text" name="card[number]" maxlength="16" placeholder="Card #">
    </div>
    <div class="three wide field">
      <label>CVC</label>
      <input type="text" name="card[cvc]" maxlength="3" placeholder="CVC">
    </div>
  </div>
    <div class="ui button" tabindex="0">Submit Order</div>
>>>>>>> 92b00a849309fb55324a787fc5f80bb7149178fb
</form>
<!--</div>
