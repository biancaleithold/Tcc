<?php
  include 'config.php';
  include 'cabecalho.php';

  $consulta = $connect->query('SELECT id_usuario, nome, email, foto_perfil FROM usuario WHERE email="'.$_SESSION['email'].'"');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_usuario = $linha['id_usuario']; 
    $nome = $linha['nome'];
    $email = $linha['email'];
    $foto_perfil = $linha['foto_perfil']; 
  }
?>

  <div class="ui cards" style="margin: 3%;float: left;">

  <div class="card">
    <div class="blurring dimmable image">
      <div class="ui inverted dimmer">
        
      </div>
      <?php
        if (!empty($foto_perfil)) {
      ?>
          <img src="imagens/<?php echo $foto_perfil;?>">
      <?php
        }else{
      ?>
          <img src="imagens/perfil.png">
      <?php
        }
      ?>
    </div>
    <div class="content">
      <h1 class="header" style="color: #424242;">Nome: <?php echo utf8_encode($nome); ?></h1>
      <div class="meta">
        <h4 class="date" style="color: #424242;">Email: <?php echo utf8_encode($email); ?></h4>
      </div>
    </div>
    <div class="extra content" style="color: #424242;">
       <?php
     echo  "<a href=edita_perfil.php?atualiza=usuario&id=".$id_usuario." style=\"color: #424242;\">";
      ?>
        <i class="edit icon"></i>
        Editar Perfil
      </a> 
     
      <br><br>
        <button class="ui basic button test"><i class="trash icon"></i>Excluir Conta</button>
    </div>
  </div>
</div>

<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Excluir Conta
  </div>
  <div class="image content">
    <div class="image">
    <?php
        if (!empty($foto_perfil)) {
      ?>
          <img style="width: 45%;margin-left: 27%;" src="imagens/<?php echo $foto_perfil;?>">
      <?php
        }else{
      ?>
          <img style="width: 45%;margin-left: 27%;" src="imagens/perfil.png">
      <?php
        }
      ?>
    </div>
    <div class="description"  style="width: 100%;margin-top: 9%;">
     <?php echo utf8_encode($nome); ?>, Tem Certeza que deseja excluir sua conta? <br> Isso apagará todos os seus dados.
    </div>
  </div>
  <div class="actions">
    <div class="ui cancel button">Cancelar</div>
     <?php
     echo  "<a href=?agir=apaga&id=".$id_usuario.">";
      ?>
    <div class="ui button">Excluir</div>
    </a>
  </div>
</div>

<!--BLOCO EXCLUIR DADOS Usuário -->
<?php
  if (isset($_REQUEST['agir']) && $_REQUEST['agir'] == 'apaga' && $_REQUEST['id'] != '') {
    try {
        $stmt = $connect->prepare("DELETE FROM usuario WHERE id_usuario=:id");
        $stmt->execute(array(
          ':id' => $_REQUEST['id'],
        ));
      
    }catch (PDOException $erro) {
      echo "Erro: ".$erro->getMessage();
    }

  require 'config.php';
  unset($_SESSION['name']);
  unset($_SESSION['email']);
  session_destroy();
  header('Location: register_usuario.php');
    exit();
  } 
?>
<!-- FIM DO BLOCO EXCLUIR DADOS Usuário -->


<!-- BLOCO MOSTRA DADOS TABELA Eventos-->
<table class="ui fixed table" style="width: 68%;float:right; margin-right:4%;">
  <h1 class="header">Meus Eventos</h1>
    <tr>
        <th>Nome do Evento</th>
        <th>Descriçao</th>
    </tr>

    <?php
    try {
 
    $stmt = $connect->prepare("SELECT id_evento,nome_evento,descricao FROM eventos WHERE id_usuario = :id");
 
        if ($stmt->execute(array(
          ':id' => $id_usuario))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".utf8_encode($rs->nome_evento)."</td><td>".utf8_encode($rs->descricao)."</td><td style=\"float: right; margin-right: 5%;\">
                <a href=\"perfil_evento.php?ver=view&id=".$rs->id_evento."\"><i class='eye alternate icon'></i></a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a><i onclick='delEvento(".$rs->id_evento.")' class='trash alternate icon' style=\"color: #4183c4;\"></i>"."&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."</a></center></td>";
                echo "</tr>";?>
              
  <?php }
        } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
        }
} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}
?>
</table>

<!-- FIM BLOCO MOSTRA DADOS TABELA Eventos -->
 
<!--BLOCO EXCLUIR DADOS Eventos -->
<script>
function delEvento(id_evento){
  if (confirm("Tem certeza que deseja excluir o evento? Isso é irreversível!")) {
    window.open("perfil_usuario.php?acao=del&id_evento=" +id_evento, "_self");  
  }
}
</script>

<?php
    if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "del" && $_REQUEST['id_evento'] != '') {
      try {
        $stmt = $connect->prepare("DELETE FROM eventos WHERE id_evento=:id_evento");
        $stmt->execute(array(
          ':id_evento' => $_REQUEST['id_evento'],
        ));
      }catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
      }         
      echo ('<meta http-equiv="refresh" content="0; url=perfil_usuario.php">');
      echo "<script type=\"text/javascript\">alert('Evento excluído com sucesso!');</script>";
    } 
    ?>
</script>
<!-- FIM DO BLOCO EXCLUIR DADOS Eventos -->


  <a href="register_evento.php">
    <button class="ui blue basic button" style="float: right; margin-right: 4%; margin-left: 30%;">
      <i class="icon plus"></i>
        Cadastrar Evento
    </button>
  </a> 


<br><br><br><br><br>



<!--- BLOCO DE ALTERAR Agenda  -->
<?php 
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'upd'  && $_REQUEST['id'] != '' ) {
  
  $stmt = $connect->prepare("SELECT id_tarefa,titulo,data,horario,descricao,situacao FROM tarefas WHERE id_tarefa = :id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 
?>
  <h2 class="header">Alterar Dados da Agenda</h2>
<?php
  while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                

?>
                <form method="POST" action="?action=save" style="width: 100%;">
                  <div class="ui form" style="margin-left: 28%">
                    <div class="two fields">
                      <input type="hidden" name="id" value="<?php echo $rs->id_tarefa ?>"/>
                      <div class="field">
                        <label>Título</label><input type="text" name="titulo" value="<?php echo utf8_encode($rs->titulo) ?>"/>
                      </div>
                      <div class="field">
                        <label>Data</label><input type="date" name="data" value="<?php echo $rs->data ?>"/>
                      </div>
                      <div class="field">
                        <label>Hora</label><input type="time" name="horario" value="<?php echo $rs->horario ?>"/>
                      </div>
                      <div class="field">
                        <label>Descrição</label><input type="text" name="descricao" value="<?php echo utf8_encode($rs->descricao) ?>"/>
                      </div>
                      <div>
                      <input onClick="window.history.back();" type="button" value="Cancelar" class="ui cancel button" style="margin-top: 23.5%"/>
                      </div>
                      <div class="field">
                        <input type="submit" name="save" value="Salvar" class="ui button" style="margin-top: 12.5%"/>
                      </div>
                    </div>
                  </div>
                </form>
<?php
  }
}
?>                    
<!--- FIM BLOCO DE ALTERAR Agenda -->


<!--- BLOCO DE SALVAR Agenda -->
<?php 
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'save'  && !empty($_REQUEST['id'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $horario = $_POST['horario'];
    $data = $_POST['data'];
    $situacao = 0;

    $stmt = $connect->prepare("UPDATE tarefas SET titulo=:titulo, data=:data, horario=:horario, descricao=:descricao, situacao=:situacao WHERE id_tarefa=:id");
    $stmt->execute(array(
      ':id' => $_REQUEST['id'],
      ':titulo' => $titulo,
      ':data' => $data,
      ':horario' => $horario,
      ':descricao' => $descricao,
      ':situacao' => $situacao
  )); 

     if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'save') {

       echo "<script type=\"text/javascript\">alert('Alterado com sucesso!');</script>";
        header("Refresh: 0");
        exit();
      }
}
?>
<!--- FIM BLOCO DE SALVAR  Agenda-->



<!-- INICIO BLOCO MOSTRA DADOS TABELA Agenda-->
<table class="ui fixed table" style="width: 68%; float:right; margin-right:4%">
  <h1 class="header">Minha Agenda</h1>
    <tr>
        <th>Título</th>
        <th>Data</th>
        <th>Horario</th>
        <th>Descrição</th>
        <th style="float: right;">Concluído</th>
    </tr>

    <?php
    try {
 
    $stmt = $connect->prepare("SELECT id_tarefa,titulo,data,horario,descricao,situacao FROM tarefas WHERE id_usuario = :id and situacao=0");
 
        if ($stmt->execute(array(
          ':id' => $id_usuario))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".utf8_encode($rs->titulo)."</td>
                      <td>".$rs->data."</td><td>".$rs->horario."</td>
                      <td>".utf8_encode($rs->descricao)."</td>
                      <td><a href=\"?action=del&id=".$rs->id_tarefa."\"><input class='ui toggle checkbox' style='float: right;' id=check type='checkbox' onclick='concluirtarefa(".$rs->id_tarefa.")'></a></td>
                      <td style=\"float: right; margin-right: 10%;\"><a href=\"?action=upd&id=".$rs->id_tarefa."\"><i class='pencil alternate icon'></i></a></td>";
                echo "</tr>";
            }
        } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
        }
} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}
?>
</table>
<!-- FIM BLOCO MOSTRA DADOS TABELA Agenda -->


<!--BLOCO CONCLUIR Tarefa -->
<script>
  //MUDAR O CAMPO SITUACAO NA TABELA TAREFA PARA TINYINT(1)!!
  function concluirtarefa(id_tarefa) {
    if (confirm("Tem certeza que deseja concluir esta tarefa? Isso é irreversível!")) {
      window.open("perfil_usuario.php?act=concluir&id_tarefa=" +id_tarefa, "_self");  
    }
  };
</script>

<?php
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "concluir" && $_REQUEST['id_tarefa'] != '') {
  try {
    $stmt = $connect->prepare("UPDATE tarefas SET situacao=1 WHERE id_tarefa=:id_tarefa");
    $stmt->execute(array(
      ':id_tarefa' => $_REQUEST['id_tarefa'],
      ));
  }catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
  } 

  echo ('<meta http-equiv="refresh" content="0; url=perfil_usuario.php">');
  echo "<script type=\"text/javascript\">alert('Tarefa concluída com sucesso!');</script>";
} 
?> 
<!-- http://www.phpi.com.br/textos/262/1/como-validar-checkbox-em-javascript-e-pegar-valores-em-php -->
<!--FIM BLOCO CONCLUIR Tarefa -->


 <a href="register_tarefa.php">     
    <button class="ui blue basic button" style="float: right; margin-right: 4%; margin-left: 30%">
      <i class="icon plus"></i>
        Cadastrar Tarefa
    </button>
  </a> 

<br><br>


<!-- INICIO BLOCO MOSTRA DADOS TABELA Empresas -->
  <table class="ui fixed table" style="width: 68%;float:right; margin-right:4%">
  <h1 class="header" style="margin-left:26%; margin-top: 8%">Minhas Empresas</h1>
    <tr>
        <th>Nome da Empresa</th>
        <th>Descriçao</th>
    </tr>

    <?php
    try {
 
    $stmt = $connect->prepare("SELECT id_empresa, nome, descricao FROM empresa WHERE id_usuario = :id");
 
        if ($stmt->execute(array(
          ':id' => $id_usuario))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".utf8_encode($rs->nome)."</td><td>".utf8_encode($rs->descricao)."</td><td style=\"float: right; margin-right: 5%;\">
                <a href=\"perfil_empresa.php?ver=view&id=".$rs->id_empresa."\"><i class='eye alternate icon'></i></a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a><i onclick='delEmpresa(".$rs->id_empresa.")' class='trash alternate icon' style=\"color: #4183c4;\"></i>"."&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."</a></center></td>";
                echo "</tr>";?>

     <?php  }
        } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
        }
} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}
?>
</table>
<!-- FIM BLOCO MOSTRA DADOS TABELA Empresas -->


<a href="register_empresa.php" >     
      <button class="ui blue basic button" style="float: right;  margin-right: 4%; margin-left: 30%">
        <i class="icon plus"></i>
          Cadastrar Empresa
      </button>
</a> 




<!--BLOCO EXCLUIR DADOS Empresa -->
<script>
function delEmpresa(id_empresa){
  if (confirm("Tem certeza que deseja excluir a empresa? Isso é irreversível!")) {
    window.open("perfil_usuario.php?act=del&id_empresa=" +id_empresa, "_self");  
  }
}
</script>

<?php
    if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $_REQUEST['id_empresa'] != '') {
      try {
        $stmt = $connect->prepare("DELETE FROM empresa WHERE id_empresa=:id_empresa");
        $stmt->execute(array(
          ':id_empresa' => $_REQUEST['id_empresa'],
        ));
      }catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
      }         
      echo ('<meta http-equiv="refresh" content="0; url=perfil_usuario.php">');
      echo "<script type=\"text/javascript\">alert('Empresa excluída com sucesso!');</script>";
    } 
    ?>
</script>
<!-- FIM DO BLOCO EXCLUIR DADOS Empresa -->


<?php
include 'rodape.php';
?>


<!--BLOCO EXCLUIR DADOS Agenda -->
<?php
  // if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "del" && $_REQUEST['id'] != '') {
  //   try {
  //       $stmt = $connect->prepare("DELETE FROM tarefas WHERE id_tarefa=:id");
  //       $stmt->execute(array(
  //         ':id' => $_REQUEST['id'],
  //       ));
  //   }catch (PDOException $erro) {
  //     echo "Erro: ".$erro->getMessage();
  //   }
  // } 
?>
<!-- FIM DO BLOCO EXCLUIR DADOS Agenda -->

<!--https://www.portugal-a-programar.pt/forums/topic/60927-resolvido-manipular-checkbox-em-php-sem-o-submit/-->