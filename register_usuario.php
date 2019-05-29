<?php
	
  require 'config.php';
  include("cabecalho.php");

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $foto_perfil = $_POST['foto_perfil'];
    $cpf = $_POST['cpf'];

    if($nome == '')
      $errMsg = 'Insira seu nome';
    if($email == '')
      $errMsg = 'Insira seu email';
    if($telefone == '')
      $errMsg = 'Insira seu telefone';
    if($senha == '')
      $errMsg = 'Insira sua senha';
    if($foto_perfil == '')
<<<<<<< HEAD
      $errMsg = 'Insira sua foto de perfil';
=======
      $errMsg = 'Insira sua foto_perfil';
>>>>>>> 92b00a849309fb55324a787fc5f80bb7149178fb
    if($cpf == '')
      $errMsg = 'Insira seu cpf';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO usuario (nome,  email, telefone, senha, foto_perfil, cpf) VALUES (:nome, :email, :telefone, :senha, :foto_perfil, :cpf)');
        $stmt->execute(array(
          ':nome' => $nome,
          ':email' => $email,
          ':telefone' => $telefone,
          ':senha' => $senha,
          ':foto_perfil' => $foto_perfil,
          ':cpf' => $cpf,
        ));


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
  <h1 style="margin-top: 3%">Cadastro de Usuário</h1>
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
      <input type="text" name="nome" placeholder="Celebrate Festas e Eventos" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'] ?>" autocomplete="off" class="box"/><br /><br />

      <label>Email</label>
      <input type="Email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" placeholder="celebrate@festas.com" /><br /><br>      

      <label>Telefone</label>
      <input type="tel" name="telefone" value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone'] ?>" placeholder="(00) 00000-0000" /><br /><br>

      <label>Senha</label>
      <input type="password" name="senha" value="<?php if(isset($_POST['senha'])) echo $_POST['senha'] ?>" placeholder="********" /><br /><br>

      <label>Foto Perfil</label>
      <input type="file" name="imagem" value="<?php if(isset($_POST['imagem'])) echo $_POST['imagem'] ?>" /><br /><br>

      <label>CPF</label>
      <input type="text" name="cpf" value="<?php if(isset($_POST['cpf'])) echo $_POST['cpf'] ?>"  placeholder="000.000.000-00" /><br /><br>

    </div>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>  