<?php
	include("cabecalho.php");
  require 'config.php';

  if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == '')
      $errMsg = 'Enter email';
    if($password == '')
      $errMsg = 'Enter password';

    if($errMsg == '') {
      try {
        $stmt = $connect->prepare('SELECT email, password FROM usuario WHERE email = :email');
        $stmt->execute(array(
          ':email' => $email
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "User $email not found.";
        }
        else {
          if($password == $data['password']) {
            $_SESSION['name'] = $data['fullname'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['password'] = $data['password'];
            header('Location: index.php');
            exit;
          }
          else
            $errMsg = 'Password not match.';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }
?>
<br>
<br>
<br>
<br>

<div class="centraliza_img">
  <img src="imagens/perfil.png" class="perfil_login">
  <h1 style="margin-top: 3%">Login</h1>
</div>

<div class="ui form login">

    <!-- Parte do Prof -->
      <?php
        if(isset($errMsg)){
          echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>


  <form action="login.php" method="post">
    <div class="field">
      <label>Email</label>
      <input type="Email" placeholder="celebrate@festas.com" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?> ">
    </div>
    <div class="field">
      <label>Senha</label>
      <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" placeholder="***********">
    </div>
    <a href="">Esqueci minha senha!</a>
    <br>
    <br>
    <input type="submit" name='login' value="Login" class="ui button botao">
  </form>
</div>

         
          