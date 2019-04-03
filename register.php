<?php
	include("cabecalho.php");
  require 'config.php';

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($fullname == '')
      $errMsg = 'Enter your fullname';
    if($username == '')
      $errMsg = 'Enter username';
    if($password == '')
      $errMsg = 'Enter password';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO user (fullname, username, password) VALUES (:fullname, :username, :password)');
        $stmt->execute(array(
          ':fullname' => $fullname,
          ':username' => $username,
          ':password' => $password          ));
        header('Location: register.php?action=joined');
        exit;
      }
      catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registration successfull. Now you can <a href="login.php">login</a>';
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
          echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>



  <form action="" method="post">
    <div class="field">

    <label>Nome Completo</label>
      <input type="text" name="fullname" placeholder="Celebrate Festas e Eventos" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname'] ?>" autocomplete="off" class="box"/><br /><br />

      <label>Email</label>
      <input type="Email"  <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" placeholder="celebrate@festas.com">
    </div>

    <div class="field">

      <label>Senha</label>
      <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>"  placeholder="***********">
    </div>
    <br>
    <br>
  </form>
  <input type="submit" name='register' class="ui button botao">
</div>


         
        
          
         
       