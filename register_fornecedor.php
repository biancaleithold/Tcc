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
  <h1 style="margin-top: 5%">Cadastro de Fornecedor</h1>
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

      <label>Nome Completo</label>
      <input type="text" name="fullname" placeholder="Celebrate Festas e Eventos" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname'] ?>" autocomplete="off" class="box"/><br /><br />

      <label>CNPJ</label>
      <input type="text" name="cnpj" value="<?php if(isset($_POST['cnpj'])) echo $_POST['cnpj'] ?>"  placeholder="00.000.000/0000-00"/><br /><br / >

      <label>Endereço</label>
      <input type="text" name="endereco" placeholder="Rua Xxxxx, n°000" value="<?php if(isset($_POST['endereco'])) echo $_POST['endereco'] ?>" autocomplete="off" class="box"/><br /><br />

      <label>Telefone</label>
      <input type="text" name="telefone" placeholder="(00)00000000" value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone'] ?>" autocomplete="off" class="box"/><br /><br />

      <label>Email</label>
      <input type="Email"  <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" placeholder="celebrate@festas.com">
    </div>

    <div class="field">

      <label>Senha</label>
      <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>"  placeholder="***********">

    </div>
    <br>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>
