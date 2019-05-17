<?php
	
  require 'config.php';
  include("cabecalho.php");

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $fullname = $_POST['fullname'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($fullname == '')
      $errMsg = 'Enter your fullname';
    if($cnpj == '')
      $errMsg = 'Enter cnpj';
     if($endereco == '')
      $errMsg = 'Enter endereco';
     if($telefone == '')
      $errMsg = 'Enter telefone';
    if($email == '')
      $errMsg = 'Enter email';
    if($password == '')
      $errMsg = 'Enter password';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO fornecedor (fullname, cnpj, endereco, telefone, email, password) VALUES (:fullname, :cnpj, :endereco, :telefone, :email, :password)');
        $stmt->execute(array(
          ':fullname' => $fullname,
          ':cnpj' => $cnpj,
          ':endereco' => $endereco, 
          ':telefone' => $telefone,
          ':email' => $email,
          ':password' => $password
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
    $errMsg = 'Registrado com sucesso! <br> Agora você pode logar. <br><br>';
  }
?>

<br>
<br>
<br>
<br>

<div class="centraliza_img">
  <h1 style="margin-top: 3%">Cadastro de Empresa</h1>
</div>

<div class="ui form login">

      <!-- Parte do Prof -->
      <?php
        if(isset($errMsg)){
          echo '<div style="color:green;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>



  <form action="" method="post">
    <div class="field">

      <label>CNPJ</label>
      <input type="text" name="cnpj" value="<?php if(isset($_POST['cnpj'])) echo $_POST['cnpj'] ?>"  placeholder="00.000.000/0000-00"/><br /><br / >

      <label>Nome da Empresa</label>
      <input type="text" name="nome" placeholder="Celebrate Festas e Eventos" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'] ?>" autocomplete="off" class="box"/><br /><br />

      <label>Rua</label>
      <input type="text" name="rua" placeholder="Juscelino Kubitschek" value="<?php if(isset($_POST['rua'])) echo $_POST['rua'] ?>"/><br /><br />

      <label>Número</label>
      <input type="text" name="numero" placeholder="165" value="<?php if(isset($_POST['numero'])) echo $_POST['numero'] ?>"/><br /><br />

      <label>Complemento</label>
      <input type="text" name="complemento" value="<?php if(isset($_POST['complemento'])) echo $_POST['complemento'] ?>" placeholder="apartamento 4306" /><br /><br />

      <div style="float: left;"></div>

      <label>Bairro</label>
      <input type="text" name="bairro" value="<?php if(isset($_POST['bairro'])) echo $_POST['bairro'] ?>" placeholder="Bucarein" /><br /><br />

      <label>Cidade</label>
      <input type="text" name="cidade" value="<?php if(isset($_POST['cidade'])) echo $_POST['cidade'] ?>" placeholder="Joinville" /><br /><br />

      <label>Estado</label>
      <input type="text" name="estado" value="<?php if(isset($_POST['estado'])) echo $_POST['estado'] ?>" placeholder="Santa Catarina" /><br /><br />

      <label>Logotipo</label>
      <input type="file" name="logo" value="<?php if(isset($_POST['logo'])) echo $_POST['logo'] ?>" /><br /><br />

      <label>Descrição</label>
      <input type="text" name="descricao" value="<?php if(isset($_POST['descricao'])) echo $_POST['descricao'] ?>" placeholder="Trabalhamos neste ramo desde 1998" /><br /><br />
    </div>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>
