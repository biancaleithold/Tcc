<?php
  
  require 'config.php';
  include("cabecalho.php");

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $nome_evento = $_POST['nome_evento'];
    $hora = $_POST['hora'];
    $descricao = $_POST['descricao'];
    $dia = $_POST['dia'];
    $local = $_POST['local'];
    $valor_max_pagar = $_POST['valor_max_pagar'];

    if($nome_evento == '')
      $errMsg = 'Insira o nome do evento';
    if($hora == '')
      $errMsg = 'Insira seu hora';
    if($descricao == '')
      $errMsg = 'Insira a descricao de seu evento';
    if($dia == '')
      $errMsg = 'Insira a data do evento';
    if($local == '')
      $errMsg = 'Insira o local do evento';
    if($valor_max_pagar == '')
      $errMsg = 'Insira o valor máximo que deseja gastar no evento';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO eventos (nome_evento,  hora, descricao, dia, local) VALUES (:nome_evento, :hora, :descricao, :dia, :local, :valor_max_pagar)');
        $stmt->execute(array(
          ':nome_evento' => $nome_evento,
          ':hora' => $hora,
          ':descricao' => $descricao,
          ':dia' => $dia,
          ':local' => $local,
          ':valor_max_pagar' => $valor_max_pagar
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
  <h1 style="margin-top: 3%">Cadastro de Evento</h1>
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
      <label>Nome do Evento</label>
      <input type="text" name="nome_evento" value="<?php if(isset($_POST['nome_evento'])) echo $_POST['nome_evento'] ?>" placeholder="Aniversário Gêmeos" /><br /><br>

      <label>Horário do Evento</label>
      <input type="time" name="hora" value="<?php if(isset($_POST['hora'])) echo $_POST['hora'] ?>" class="box"/><br /><br />

      <label>Descrição</label>
      <textarea rows="3" name="descricao" value="<?php if(isset($_POST['descricao'])) echo $_POST['descricao'] ?>" placeholder="Aniversário Joana e Cleber com o tema Halloween!"></textarea><br /><br>      

      <label>Data</label>
      <input type="date" name="dia" value="<?php if(isset($_POST['dia'])) echo $_POST['dia'] ?>"/><br /><br>

      <label>Local</label>
      <input type="text" name="local" value="<?php if(isset($_POST['local'])) echo $_POST['local'] ?>" placeholder="Toffanos" /><br /><br>

      <label>Valor Máximo que Deseja Gastar</label>
      <input type="text" name="valor_max_pagar" value="<?php if(isset($_POST['valor_max_pagar'])) echo $_POST['valor_max_pagar'] ?>" placeholder="R$3000,00" /><br /><br>

    </div>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>  