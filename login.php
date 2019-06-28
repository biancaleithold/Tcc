<?php
  session_start();
  require 'config.php';

  include("cabecalho.php");
  if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $email = $_POST['email'];
    $password = $_POST['senha'];

    if($email == '')
      $errMsg = 'Enter email';
    if($password == '')
      $errMsg = 'Enter senha';

    if($errMsg == '') {
      try {
        $stmt = $connect->prepare('SELECT email, senha FROM usuario WHERE email = :email');
        $stmt->execute(array(
          ':email' => $email
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "Email $email não encontrado.";
        }
        else {
          if($password == $data['senha']) {
            $_SESSION['email'] = $data['email'];
            $errMsg = 'Usuário autenticado com sucesso!';
            header("Location: index.php");
            exit();
            //$host  = $_SERVER['HTTP_HOST'];
            //$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            //echo "<script type='text/javascript'>window.top.location='http://$host$uri/index.php';</script>";
            //exit;
            
          }
          else
            $errMsg = 'Senha incorreta! Tente novamente.';
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
      <input type="password" name="senha" value="<?php if(isset($_POST['senha'])) echo $_POST['senha'] ?>" placeholder="***********">
    </div>
    <a href="">Esqueci minha senha!</a>
    <br>
    <br>
    <a href="register_usuario.php">Ainda não tem cadastro? Cadastre-se!</a>
    <br>
    <br>
    <input type="submit" name='login' value="Login" class="ui button botao">
  </form>
</div>


</body>
</html>