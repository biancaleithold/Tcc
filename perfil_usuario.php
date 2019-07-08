<?php
  session_start();
  include 'config.php';
  include 'cabecalho.php';

  $consulta = $connect->query('SELECT nome, email, foto_perfil FROM usuario WHERE email="'.$_SESSION['email'].'"');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $nome = $linha['nome'];
    $email = $linha['email'];
    $foto_perfil = $linha['foto_perfil']; 
  }
?>

<br><br><br>
  <div class="ui special cards" style="margin: 3%; float: left;">

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
      <a href="#">
        <i class="edit icon"></i>
        Editar Perfil
      </a>
    </div>
  </div>
</div>


<!--- BLOCO DE ALTERAR  -->

<?php 
if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'upd'  && $_REQUEST['id'] != '' ) {
  
  $stmt = $connect->prepare("SELECT id_evento,nome_evento,dia,hora,local,descricao FROM eventos WHERE id_evento=:id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 
?>
  <table class="ui fixed table">
  <h1 class="header">Alterar Meus Dados</h1>
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
                    <td><input type="submit" name="save" value="Salvar" /></td>
                    <!-- <td> -->
                      <center>
                      <?php
                      // echo "<a href=\"?act=save&id=".$rs->id_evento."\">[Salvar]</a></center></td>"; 
                echo "</tr>";
            }

}

?>
</table>
<!--- FIM BLOCO DE ALTERAR  -->


<!--BLOCO EXCLUIR DADOS -->

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
<!-- FIM DO BLOCO EXCLUIR DADOS -->



<!--- BLOCO DE SALVAR  -->

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
<!--- FIM BLOCO DE SALVAR  -->



<!-- BLOCO MOSTRA DADOS TABELA -->
<table class="ui fixed table">
  <h1 class="header">Meus Eventos</h1>
    <tr>
        <th>Nome do Evento</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Local</th>
        <th>Descriçao</th>
    </tr>
    <?php
    try {
 
    $stmt = $connect->prepare("SELECT id_evento,nome_evento,dia,hora,local,descricao FROM eventos");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".$rs->nome_evento."</td><td>".$rs->dia."</td><td>".$rs->hora."</td><td>".$rs->local."</td><td>".$rs->descricao."</td><td><center><a href=\"?act=upd&id=".$rs->id_evento."\">[Alterar]</a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a href=\"?act=del&id=".$rs->id_evento."\">[Excluir]</a></center></td>";
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
<!-- FIM BLOCO MOSTRA DADOS TABELA -->





<!--<table class="ui fixed table">
  <h1 class="header">Meus Eventos</h1>
  <thead>
    <tr>
      <th>Nome do Evento</th>
      <th>Data</th>
      <th>Hora</th>
      <th>Local</th>
      <th>Descrição</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Casamento Juliana</td>
      <td>20/06/2019</td>
      <td>18:00:00</td>
      <td>Restaurante Viapiana</td>
      <td>Casamento Juliana e Marcelo, bla bla...</td>
    </tr>
  </tbody>
</table>-->
  <a href="register_empresa.php" style="color: black">     
    <button class="ui basic button" style="float: right;  margin-right: 15%">
      <i class="icon plus"></i>
        Cadastrar Empresa
    </button>
  </a> 
  <a href="register_evento.php" style="color: black">
    <button class="ui basic button" style="float: right;">
      <i class="icon plus"></i>
        Cadastrar Evento
    </button>
  </a> 

  <i class="pencil alternate icon">
    
  </i>
  <i class="trash alternate icon"></i>
  </a> 