<?php
	
  require 'config.php';
  include("cabecalho.php");

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $nome_evento = $_POST['nome_evento'];
    $hora = $_POST['hora'];
    $descricao_evento = $_POST['descricao_evento'];
    $data = $_POST['data'];
    $local_evento = $_POST['local_evento'];

    if($nome_evento == '')
      $errMsg = 'Insira o nome do evento';
    if($hora == '')
      $errMsg = 'Insira seu hora';
    if($descricao_evento == '')
      $errMsg = 'Insira a descricao de seu evento';
    if($data == '')
      $errMsg = 'Insira a data do evento';
    if($local_evento == '')
      $errMsg = 'Insira o local do evento';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO usuario (nome_evento,  hora, descricao_evento, data, local_evento) VALUES (:nome_evento, :hora, :descricao_evento, :data, :local_evento)');
        $stmt->execute(array(
          ':nome_evento' => $nome_evento,
          ':hora' => $hora,
          ':descricao_evento' => $descricao_evento,
          ':data' => $data,
          ':local_evento' => $local_evento
        ));


        //ARRUMAR!! NÃO APARECE MENSAGEM REGISTRADO COM SUCESSO!
        //$host  = $_SERVER['HTTP_HOST'];
            //$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            //echo "<script type='text/javascript'>window.top.location='http://$host$uri/register_usuario.php';</script>";
            //exit;
        header('Location: register_evento.php?action=joined');
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
      <textarea rows="3" name="descricao_evento" value="<?php if(isset($_POST['descricao_evento'])) echo $_POST['descricao_evento'] ?>" placeholder="Aniversário Joana e Cleber com o tema Halloween!"></textarea><br /><br>      

      <label>Data</label>
      <input type="date" name="data" value="<?php if(isset($_POST['data'])) echo $_POST['data'] ?>"/><br /><br>

      <label>Local</label>
      <input type="text" name="local_evento" value="<?php if(isset($_POST['local_evento'])) echo $_POST['local_evento'] ?>" placeholder="Toffanos" /><br /><br>

    </div>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>  