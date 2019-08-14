<?php

include 'config.php';
include 'cabecalho.php';

if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $idade = $_POST['idade'];
    $nome = $_POST['nome'];
  
    if($idade == '')
      $errMsg = 'Insira sua idade';
    if($nome == '')
      $errMsg = 'Insira o nome do convidado';
    
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO convidados (idade, nome) VALUES (:idade, :nome)');
        $stmt->execute(array(
          ':idade' => $idade,
          ':nome' => $nome
        ));


        //ARRUMAR!! NÃO APARECE MENSAGEM REGISTRADO COM SUCESSO!
        //$host  = $_SERVER['HTTP_HOST'];
            //$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            //echo "<script type='text/javascript'>window.top.location='http://$host$uri/register_usuario.php';</script>";
            //exit;
        header('Location: perfil_usuario.php?action=joined');
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
  <h1 style="margin-top: 3%">Cadastro de Convidado</h1>
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
      <label>Nome do Convidado</label>
      <input type="text" name="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'] ?>" placeholder="Mariana Fernandes" /><br /><br>

      <label>Idade</label>
      <input type="text" name="idade" value="<?php if(isset($_POST['idade'])) echo $_POST['idade'] ?>" placeholder="25" /><br /><br>

    </div>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>  