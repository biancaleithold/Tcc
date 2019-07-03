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
  
echo "FAZER COMO FORM PARA ALTERAÇÃO";

  $stmt = $connect->prepare("SELECT * FROM eventos WHERE id_evento=:id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 
?>
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
   while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
echo "FAZER COMO FORM PARA ALTERAÇÃO";
                echo "<tr>";
                echo "<td>".$rs->nome_evento."</td><td>".$rs->dia."</td><td>".$rs->hora."</td><td>".$rs->local."</td><td>".$rs->descricao."</td><td><center><a href=\"?act=save&id=".$rs->id_evento."\">[Salvar]</a>"
                           ."</center></td>";
                echo "</tr>";
            }

}

?>
</table>
<!--- FIM BLOCO DE ALTERAR  -->



<!--- BLOCO DE SALVAR  -->

<?php 
if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'save'  && $_REQUEST['id'] != '' ) {
  echo "FAZER UPDATE";
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
 
    $stmt = $connect->prepare("SELECT nome_evento,dia,hora,local,descricao FROM eventos");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".$rs->nome_evento."</td><td>".$rs->dia."</td><td>".$rs->hora."</td><td>".$rs->local."</td><td>".$rs->descricao."</td><td><center><a href=\"?act=upd&id=".$rs->id_evento."\">[Alterar]</a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a href=\"\">[Excluir]</a></center></td>";
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
  <a href="register_fornecedor.php" style="color: black">     
    <button class="ui basic button" style="float: right;  margin-right: 15%">
      <i class="icon plus"></i>
        Cadastrar Fornecedor
    </button>
  </a> 
  <a href="register_evento.php" style="color: black">
  <a href="#" style="color: black">
    <button class="ui basic button" style="float: right;">
      <i class="icon plus"></i>
        Cadastrar Evento
    </button>
  </a> 

  <i class="pencil alternate icon">
    
  </i>
  <i class="trash alternate icon"></i>
  </a> 