<?php
  
  require 'config.php';
  include("cabecalho.php");

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $descricao= $_POST['descricao'];
    $situacao = $_POST['situacao'];

    if($titulo == '')
      $errMsg = 'Insira o titulo da tarefa';
    if($data == '')
      $errMsg = 'Insira a data';
    if($horario == '')
      $errMsg = 'Insira o horario';
    if($descricao == '')
      $errMsg = 'Insira a descricao do evento';
    if($situacao == '')
      $errMsg = 'Insira o situacao do evento';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO tarefas (titulo,  data, horario, descricao, situacao) VALUES (:titulo, :data, :horario, :descricao, :situacao)');
        $stmt->execute(array(
          ':titulo' => $titulo,
          ':data' => $data,
          ':horario' => $horario,
          ':descricao' => $descricao,
          ':situacao' => $situacao
        ));

        header('Location: register_tarefa.php?action=joined');
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
  <h1 style="margin-top: 3%">Cadastro de Tarefa</h1>
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
      <label>Título</label>
      <input type="text" name="titulo" value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo'] ?>" placeholder="Prova" /><br /><br>

      <label>Data</label>
      <input type="date" name="data" value="<?php if(isset($_POST['data'])) echo $_POST['data'] ?>" class="box"/><br /><br />

      <label>Horário</label>
      <input type="time" name="horario" value="<?php if(isset($_POST['horario'])) echo $_POST['horario'] ?>" /><br /><br>      

      <label>Descrição</label>
      <textarea rows="3" name="descricao" value="<?php if(isset($_POST['descricao'])) echo $_POST['descricao'] ?>" placeholder="Prova do vestido!"></textarea><br /><br>

      <label>Situacao</label>
      <input type="number" min="0" max="1" name="situacao" value="<?php if(isset($_POST['situacao'])) echo $_POST['situacao'] ?>" /><br /><br>

    </div>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>  