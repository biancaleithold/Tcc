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
      <h1 class="header">Nome: <?php echo $nome; ?></h1>
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
    <a href="register_empresa.php" >     
      <button class="ui blue basic button" style="float: left;  margin-left: 4%">
        <i class="icon plus"></i>
          Cadastrar Empresa
      </button>
    </a> 
  </div>
</div>

<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Excluir Conta
  </div>
  <div class="image content">
    <div class="image">
      <img style="width: 45%;margin-left: 27%;" src="imagens/<?php echo $foto_perfil;?>">
    </div>
    <div class="description"  style="width: 100%;margin-top: 9%;">
     <?php echo $nome; ?>, Tem Certeza que deseja excluir sua conta? <br> Isso apagará todos os seus dados.
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



<!--BLOCO EXCLUIR DADOS Eventos -->
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
?>
<!-- FIM DO BLOCO EXCLUIR DADOS Eventos -->



<!-- BLOCO MOSTRA DADOS TABELA Eventos-->
<table class="ui fixed table" style="width: 60%;">
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
                <a href=\"perfil_evento.php\"><i class='eye alternate icon'></i></a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a href=\"?act=del&id=".$rs->id_evento."\"><i class='trash alternate icon'></i></a></center></td>";
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
<!-- FIM BLOCO MOSTRA DADOS TABELA Eventos -->
 
  <a href="register_evento.php">
    <button class="ui blue basic button" style="float: right; margin-right: 3%;">
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
                      <div class="field">
                        <input type="submit" name="save" value="Salvar" class="ui blue button" /></td>
                      </div>
                    </div>
                  </div>
                </form>
<?php
  }
}
?>
                      
<!--- FIM BLOCO DE ALTERAR Agenda -->




<!--BLOCO EXCLUIR DADOS Agenda -->
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
<!-- FIM DO BLOCO EXCLUIR DADOS Agenda -->




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
}
?>
<!--- FIM BLOCO DE SALVAR  Agenda-->




<!-- INICIO BLOCO MOSTRA DADOS TABELA Agenda-->
<table class="ui fixed table" style="width: 60%;">
  <h1 class="header">Minha Agenda</h1>
    <tr>
        <th>Título</th>
        <th>Data</th>
        <th>Horario</th>
        <th>Descrição</th>
        <th>Situação</th>
    </tr>

    <?php
    try {
 
    $stmt = $connect->prepare("SELECT id_tarefa,titulo,data,horario,descricao,situacao FROM tarefas WHERE id_usuario = :id");
 
        if ($stmt->execute(array(
          ':id' => $id_usuario))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".utf8_encode($rs->titulo)."</td><td>".$rs->data."</td><td>".$rs->horario."</td><td>".utf8_encode($rs->descricao)."</td><td>".utf8_encode($rs->situacao)."</td><td style=\"float: right; margin-right: 10%;\"><a href=\"?action=upd&id=".$rs->id_tarefa."\"><i class='pencil alternate icon'></i></a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a href=\"?action=del&id=".$rs->id_tarefa."\"><i class='trash alternate icon'></i></a></td>";
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


 <a href="register_tarefa.php">     
    <button class="ui blue basic button" style="float: right; margin-right: 3%;">
      <i class="icon plus"></i>
        Cadastrar Tarefa
    </button>
  </a> 



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
                    <td><input type="submit" name="salva" value="Salvar" /></td></form>
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
      //ARRUMAR - NÃO APARECE A MENSAGEM!!!
       echo "Registrado com sucesso! Por favor, realize o login novamente para continuar!";
        header('Location: login.php');
      }
}
?>
<!--FIM BLOCO ALTERAR E SALVAR Usuario -->


<?php
include 'rodape.php';
?>