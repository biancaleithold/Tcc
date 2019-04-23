<?php
	
  require 'config.php';
  include("cabecalho.php");

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpf = $_POST['cpf'];

    if($fullname == '')
      $errMsg = 'Enter your fullname';
    if($email == '')
      $errMsg = 'Enter email';
    if($password == '')
      $errMsg = 'Enter password';
    if($cpf == '')
      $errMsg = 'Enter cpf';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO usuario (fullname,  email, password, cpf) VALUES (:fullname, :email, :password, :cpf)');
        $stmt->execute(array(
          ':fullname' => $fullname,
          ':email' => $email,
          ':password' => $password,
          ':cpf' => $cpf          ));


        //ARRUMAR!! NÃO APARECE MENSAGEM REGISTRADO COM SUCESSO!
        //$host  = $_SERVER['HTTP_HOST'];
            //$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            //echo "<script type='text/javascript'>window.top.location='http://$host$uri/register_usuario.php';</script>";
            //exit;
        header('Location: register_usuario.php?action=joined');
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
  <h1 style="margin-top: 5%">Cadastro de Usuário</h1>
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

      <label>Email</label>
      <input type="Email"  <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" placeholder="celebrate@festas.com">
    </div>

    <div class="field">

      <label>Senha</label>
      <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>"  placeholder="***********" /><br /><br />

      <label>CPF</label>
      <input type="text" name="cpf" value="<?php if(isset($_POST['cpf'])) echo $_POST['cpf'] ?>"  placeholder="000.000.000-00">
    </div>
    <br>
    <br>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>  