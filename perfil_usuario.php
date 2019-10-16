<?php
  session_start();
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

<br><br><br>
  <div class="ui special cards" style="margin: 3%;float: left;">

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
      <h1 class="header">Nome: <?php echo utf8_encode($nome); ?></h1>
      <div class="meta">
        <h4 class="date">Email: <?php echo $email; ?></h4>
      </div>
    </div>
    <div class="extra content">
       <?php
     echo  "<a href=?agir=atualiza&id=".$id_usuario.">";
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
<table class="ui fixed table" style="width: 68%;float:right; margin-right:4%">
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
                           ."<a href=\"perfil_usuario.php?act=del&id=".$rs->id_evento."\"><i onclick='delEvento()' class='trash alternate icon'></i></a></center></td>";
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
function delEvento()
{
var x;
var escolha=confirm("Tem Certeza que deseja excluir o evento? Isso é irreversível");
if (escolha==true)
  { 
    
   <?php
  if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $_REQUEST['id'] != '') {
    try {
        $stmt = $connect->prepare("DELETE FROM eventos WHERE id_evento=:id");
        $stmt->execute(array(
          ':id' => $_REQUEST['id'],
        ));
    }catch (PDOException $erro) {
      echo "Erro: ".$erro->getMessage();
    }
  } 
?>window.confirm('Excluído com sucesso!');
  }
}
</script>
<!-- FIM DO BLOCO EXCLUIR DADOS Eventos -->


  <a href="register_evento.php">
    <button class="ui blue basic button" style="float: right; margin-right: 4%; margin-left: 30%">
      <i class="icon plus"></i>
        Cadastrar Evento
    </button>
  </a> 


<br><br>



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
                <form method="POST" action="?action=save" style="width: 93.8%">
                  <div class="ui form">
                    <div class="two fields">
                      <input type="hidden" name="id" value="<?php echo $rs->id_tarefa ?>"/>
                      <div class="field">
                        <input type="text" name="titulo" value="<?php echo utf8_encode($rs->titulo) ?>"/>
                      </div>
                      <div class="field">
                        <input type="date" name="data" value="<?php echo $rs->data ?>"/>
                      </div>
                      <div class="field">
                        <input type="time" name="horario" value="<?php echo $rs->horario ?>"/>
                      </div>
                      <div class="field">
                        <input type="text" name="descricao" value="<?php echo $rs->descricao ?>"/>
                      </div>
                      <div>
                      <input onClick="window.history.back();" type="button" value="Cancelar" class="ui inverted red button" style="margin-top: 1.5%"/>
                      </div>
                      <div class="field">
                        <input type="submit" name="save" value="Salvar" class="ui inverted green button" />
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
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'save'  && $_REQUEST['id'] != '' ) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $horario = $_POST['horario'];
    $data = $_POST['data'];
    $situacao = $_POST['situacao'];

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
  <h1 class="header" style="margin-top: 8%">Minha Agenda</h1>
    <tr>
        <th>Título</th>
        <th>Data</th>
        <th>Horario</th>
        <th>Descrição</th>
        <th style="float: right;">Concluído</th>
    </tr>

    <?php
    try {
 
    $stmt = $connect->prepare("SELECT id_tarefa,titulo,data,horario,descricao,situacao FROM tarefas WHERE id_usuario = :id");
 
        if ($stmt->execute(array(
          ':id' => $id_usuario))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".utf8_encode($rs->titulo)."</td>
                      <td>".$rs->data."</td><td>".$rs->horario."</td>
                      <td>".utf8_encode($rs->descricao)."</td>
                      <td><a href=\"?action=del&id=".$rs->id_tarefa."\"><input  style='float: right;' id=check type='checkbox' onclick='excluir()' ></a></td>
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
  function excluir() {
    var escolher = confirm('Deseja mesmo confirmar a conclusão da tarefa? Isso é irreversível!')
    if (escolher == true){
      document.getElementById('check').checked = true;
      <?php
          if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "del" && $_REQUEST['id'] != '') {
              try {
                  $stmt = $connect->prepare("DELETE FROM tarefas WHERE id_tarefa=:id");
                  $stmt->execute(array(
                    ':id' => $_REQUEST['id'],
                  ));
              }catch (PDOException $erro) {
                echo "Erro: ".$erro->getMessage();
              }
            } 
      ?> 
    } else {
      document.getElementById('check').checked = false;
    }
  };
</script>
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
                           ."<a href=?apaga=del&id=".$rs->id_empresa."><i onclick='delEmpresa()' class='trash alternate icon'></i></a></center></td>";
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
function delEmpresa()
{
var opcao=confirm("Tem Certeza que deseja excluir a empresa? Isso é irreversível");
if (opcao==true)
  { 
    
   <?php
  if (isset($_REQUEST["apaga"]) && $_REQUEST["apaga"] == "del" && $_REQUEST['id'] != '') {
    try {
        $stmt = $connect->prepare("DELETE FROM empresa WHERE id_empresa=:id");
        $stmt->execute(array(
          ':id' => $_REQUEST['id'],
        ));
    }catch (PDOException $erro) {
      echo "Erro: ".$erro->getMessage();
    }
  } 
?>window.confirm('Excluído com sucesso!');
  }
}
</script>
<!-- FIM DO BLOCO EXCLUIR DADOS Empresa -->
 


<!--INICIO BLOCO ALTERAR E SALVAR Usuario -->
<?php 
if (isset($_REQUEST['agir']) && $_REQUEST['agir'] == 'atualiza'  && $_REQUEST['id'] != '' ) {
  
  $stmt = $connect->prepare("SELECT id_usuario,nome,email,telefone,senha,foto_perfil,cpf FROM usuario WHERE id_usuario=:id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 

   while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                

              ?>
      
              
                <form class="ui form" method="POST" action="?agir=salva" style="width: 22%;margin-left: 4%;">
                <h3>Alterar meus dados</h3>
                    <input type="hidden" name="id" value="<?php echo $rs->id_usuario ?>"/>
                    <td><label>Nome</label><input type="text" name="nome" value="<?php echo $rs->nome ?>"/></td><br>
                    <td><label>Email</label><input type="email" name="email" value="<?php echo $rs->email ?>"/></td><br>
                    <td><label>Telefone</label><input type="text" name="telefone" value="<?php echo $rs->telefone ?>"/></td><br>
                    <td><label>Senha</label><input type="password" name="senha" value="<?php echo $rs->senha ?>"/></td><br>
                    <td><label>Foto de Perfil</label><input type="file" name="foto_perfil" value="<?php echo $rs->foto_perfil ?>"/></td><br>
                    <td><label>CPF</label><input type="text" name="cpf" value="<?php echo $rs->cpf ?>"/></td><br>

                    <div class="actions">
                      <div onClick="window.history.back();" class="ui cancel button">Cancelar</div>
                      <td><input type="submit" name="salva" value="Salvar" class="ui button" /></td></form>
                      </a>
                    </div>
                  </div>
              <?php
             
            }
}
?>

<?php 
if (isset($_REQUEST['agir']) && $_REQUEST['agir'] == 'salva'  && $_REQUEST['id'] != '' ) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $foto_perfil = $_POST['foto_perfil'];
    $cpf = $_POST['cpf'];

    $stmt = $connect->prepare("UPDATE usuario SET nome=:nome, email=:email, telefone=:telefone, senha=:senha, foto_perfil=:foto_perfil, cpf=:cpf WHERE id_usuario=:id");
    $stmt->execute(array(
      ':id' => $_REQUEST['id'],
      ':nome' => $nome,
      ':email' => $email,
      ':telefone' => $telefone,
      ':senha' => $senha,
      ':foto_perfil' => $foto_perfil,
      ':cpf' => $cpf  
      ));

    if(isset($_REQUEST['agir']) && $_REQUEST['agir'] == 'salva') {
        session_start();
        require 'config.php';
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        session_destroy();

       echo "<script type=\"text/javascript\">alert('Alterado com sucesso! Por favor, realize o login novamente para continuar!');</script>";
        header("Refresh: 0; url=login.php");
        exit();
      }
}
?>
<!--FIM BLOCO ALTERAR E SALVAR Usuario -->


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