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
      <img src="imagens/<?php echo $foto_perfil;?>">
    </div>
    <div class="description">
     <?php echo $nome; ?>, Tem Certeza que deseja excluir sua conta? Isso apagará todos os seus dados.
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
    exit();
  } 
?>
<!-- FIM DO BLOCO EXCLUIR DADOS Usuário -->


<!--- BLOCO DE ALTERAR Eventos  -->
<?php 
if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'upd'  && $_REQUEST['id'] != '' ) {
  
  $stmt = $connect->prepare("SELECT id_evento,nome_evento,dia,hora,local,descricao FROM eventos WHERE id_evento=:id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 
?>
  <table class="ui fixed table" style="width: 71%">
  <h2 class="header">Alterar Meus Dados</h2>
  <tr>
        <th>Nome do Evento</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Local</th>
        <th>Descriçao</th>
    </tr>   
<?php
   while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                

                echo "<tr>";?>
                <form method="POST" action="?act=save">
                    <input type="hidden" name="id" value="<?php echo $rs->id_evento ?>"/>
                    <td><input type="text" name="nome_evento" value="<?php echo $rs->nome_evento ?>"/></td>
                    <td><input type="date" name="dia" value="<?php echo $rs->dia ?>"/></td>
                    <td><input type="time" name="hora" value="<?php echo $rs->hora ?>"/></td>
                    <td><input type="text" name="local" value="<?php echo $rs->local ?>"/></td>
                    <td><input type="text" name="descricao" value="<?php echo $rs->descricao ?>"/></td>
                    <td><input type="submit" name="save" value="Salvar" /></td><center>
                      <?php
                echo "</tr>";
            }
}
?>
</table>
<!--- FIM BLOCO DE ALTERAR Eventos -->





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




<!--- BLOCO DE SALVAR Eventos -->
<?php 
if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'save'  && $_REQUEST['id'] != '' ) {
    $nome_evento = $_POST['nome_evento'];
    $hora = $_POST['hora'];
    $descricao = $_POST['descricao'];
    $dia = $_POST['dia'];
    $local = $_POST['local'];

    $stmt = $connect->prepare("UPDATE eventos SET nome_evento=:nome_evento, dia=:dia, hora=:hora, local=:local, descricao=:descricao  WHERE id_evento=:id");
    $stmt->execute(array(
      ':id' => $_REQUEST['id'],
      ':nome_evento' => $nome_evento,
      ':hora' => $hora,
      ':descricao' => $descricao,
      ':local' => $local,
      ':dia' => $dia
  )); 
}
?>
<!--- FIM BLOCO DE SALVAR  Eventos-->




<!-- BLOCO MOSTRA DADOS TABELA Eventos-->
<table class="ui fixed table" style="width: 71%;">
  <h1 class="header">Meus Eventos</h1>
    <tr>
        <th>Nome do Evento</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Local</th>
        <th>Descriçao</th>
        <th>Convidados</th>
    </tr>

    <?php
    try {
 
    $stmt = $connect->prepare("SELECT id_evento,nome_evento,dia,hora,local,descricao FROM eventos WHERE id_usuario = :id");
 
        if ($stmt->execute(array(
          ':id' => $id_usuario))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".utf8_encode($rs->nome_evento)."</td><td>".$rs->dia."</td><td>".$rs->hora."</td><td>".utf8_encode($rs->local)."</td><td>".utf8_encode($rs->descricao)."</td><td><center>
                <a href=\"?act=conv&id=".$rs->id_evento."\"><i class='eye alternate icon'></i></a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".
                    "<a href=\"?act=upd&id=".$rs->id_evento."\"><i class='pencil alternate icon'></i></a>"
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


<!--BLOCO EXCLUIR DADOS Convidados -->
<?php
  if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "del" && $_REQUEST['id'] != '') {
    try {
        $stmt = $connect->prepare("DELETE FROM convidados WHERE id_convidado=:id");
        $stmt->execute(array(
          ':id' => $_REQUEST['id'],
        ));
    }catch (PDOException $erro) {
      echo "Erro: ".$erro->getMessage();
    }
  } 
?>
<!-- FIM DO BLOCO EXCLUIR DADOS Convidados -->


<!--INICIO BLOCO ALTERAR E SALVAR Convidados -->
<?php 
if (isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'upd'  && $_REQUEST['id'] != '' ) {
  
  $stmt = $connect->prepare("SELECT id_convidado,nome, idade FROM convidados WHERE id_convidado=:id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 

   while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                

                echo "<tr>";
                echo "<td>";?>
                <br><br><br>
                <h2>Alterar meus dados</h2>
                <form method="POST" action="?acao=save">
                    <input type="hidden" name="id" value="<?php echo $rs->id_convidado ?>"/>
                    <td><input type="text" name="nome" value="<?php echo $rs->nome ?>"/></td>
                    <td><input type="text" name="idade" value="<?php echo $rs->idade ?>"/></td>
                    <td><input type="submit" name="save" value="Salvar" /></td><center>
                      <?php
                echo "</td>";
                echo "</tr>";
            }
}
?>

<?php 
if (isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'save'  && $_REQUEST['id'] != '' ) {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    $stmt = $connect->prepare("UPDATE convidados SET nome=:nome, idade=:idade WHERE id_convidado=:id");
    $stmt->execute(array(
      ':id' => $_REQUEST['id'],
      ':nome' => $nome,
      ':idade' => $idade
  )); 
}
?>
<!--FIM BLOCO ALTERAR E SALVAR Convidados -->





<!-- INICIO BLOCO INSERE Convidados - ARRUMAR PARA INSERIR JA NA LISTA DO PROPRIO EVENTO!!!
<?php
//if (isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'ins'  && $_REQUEST['id'] != '' ) {
            
                //echo "<tr>";
                //echo "<td>";?>
                <br><br><br>
                <h2>Adicionar Convidado</h2>
                <form method="POST" action="?acao=ins">
                    <td><label>Nome do Convidado</label><input type="text" name="nome"/></td>
                    <td><label>Idade</label><input type="text" name="idade"/></td>
                    <td><input type="submit" name="ins" value="Adicionar" /></td><center>
                      <?php
                //echo "</td>";
                //echo "</tr>";
           // }

      //try{
  //$stmt = $connect->prepare('INSERT INTO  convidados (idade, nome) VALUES (:idade , :nome)');
  //$stmt->execute(array(
    //':idade' => $_POST[$idade],
    //':nome' => $_POST[$nome]
  //)); 
  //}catch (PDOException $erro) {
    //echo "Erro: ".$erro->getMessage();
//}

?>
FIM BLOCO INSERE Convidados -->




<!--INICIO BLOCO MOSTRA DADOS Convidados -->

<?php 
if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'conv'  && $_REQUEST['id'] != '' ) {?>
  
  <table class="ui fixed table" style="width: 71%;">
  <h1 class="header">Convidados</h1>
    <tr>
        <th>Nome</th>
        <th>Idade</th>
    </tr>
    <a href='register_convidado.php'><i class='plus alternate icon'></i></a>
    
<?php
    try {
 
    $stmt = $connect->prepare("SELECT id_convidado,nome, idade FROM convidados WHERE id_evento = :id");
 
        if ($stmt->execute(array(
          ':id' => $_REQUEST['id']))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".utf8_encode($rs->nome)."</td><td>".$rs->idade."<a href=\"?acao=upd&id=".$rs->id_convidado."\">"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".""."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<i class='pencil alternate icon'></i></a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a href=\"?acao=del&id=".$rs->id_convidado."\"><i class='trash alternate icon'></i>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."</a></center></td>";
                echo "</tr>";
            }
        } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
        }
} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}
}
?>
<!--FIM BLOCO MOSTRA DADOS Convidados -->


 
  <a href="register_evento.php">
    <button class="ui blue basic button" style="float: right;">
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
  <table class="ui fixed table" style="width: 71%">
  <h2 class="header">Alterar Meus Dados</h2>
  <tr>
        <th>Título</th>
        <th>Data</th>
        <th>Horario</th>
        <th>Descrição</th>
        <th>Situação</th>
    </tr>
<?php
   while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                

                echo "<tr>";?>
                <form method="POST" action="?action=save">
                    <input type="hidden" name="id" value="<?php echo $rs->id_tarefa ?>"/>
                    <td><input type="text" name="titulo" value="<?php echo $rs->titulo ?>"/></td>
                    <td><input type="date" name="data" value="<?php echo $rs->data ?>"/></td>
                    <td><input type="time" name="horario" value="<?php echo $rs->horario ?>"/></td>
                    <td><input type="text" name="descricao" value="<?php echo $rs->descricao ?>"/></td>
                    <td><input type="text" name="situacao" value="<?php echo $rs->situacao ?>"/></td>
                    <td><input type="submit" name="save" value="Salvar" /></td><center>
                      <?php          
                echo "</tr>";
            }
}
?>
</table>
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
<table class="ui fixed table" style="width: 71%;">
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
                echo "<td>".utf8_encode($rs->titulo)."</td><td>".$rs->data."</td><td>".$rs->horario."</td><td>".utf8_encode($rs->descricao)."</td><td>".utf8_encode($rs->situacao)."</td><td><center><a href=\"?action=upd&id=".$rs->id_tarefa."\"><i class='pencil alternate icon'></i></a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a href=\"?action=del&id=".$rs->id_tarefa."\"><i class='trash alternate icon'></i></a></center></td>";
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
    <button class="ui blue basic button" style="float: right">
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