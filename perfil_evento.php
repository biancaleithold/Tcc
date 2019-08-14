<?php
include "cabecalho.php";

  $consulta = $connect->query('SELECT id_usuario, nome, email, foto_perfil FROM usuario WHERE email="'.$_SESSION['email'].'"');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_usuario = $linha['id_usuario']; 
    $nome = $linha['nome'];
    $email = $linha['email'];
    $foto_perfil = $linha['foto_perfil']; 
  }

  $consulta = $connect->query('SELECT id_evento, nome_evento, hora, descricao, dia, local, valor_max_pagar FROM eventos');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_evento = $linha['id_evento']; 
    $nome_evento = $linha['nome_evento'];
    $hora = $linha['hora'];
    $descricao = $linha['descricao'];
    $dia = $linha['dia'];
    $local = $linha['local'];
    $valor_max_pagar = $linha['valor_max_pagar'];
  }

  $consulta = $connect->query('SELECT id_convidado, idade, nome FROM convidados');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_convidado = $linha['id_convidado']; 
    $idade = $linha['idade'];
    $nome = $linha['nome'];
  }
?>
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
                <h2>Alterar Dados Convidado</h2>
                <form method="POST" action="?acao=save" style="width: 54%">
                  <div class="ui form">
                    <div class="two fields">
                      <input type="hidden" name="id" value="<?php echo $rs->id_convidado ?>"/>
                      <div class="field">
                        <td><input type="text" name="nome" value="<?php echo utf8_encode($rs->nome) ?>"/></td><br>
                      </div>
                      <div class="field">
                        <td><input type="text" name="idade" value="<?php echo $rs->idade ?>"/></td>
                      </div>
                      <div class="field">
                        <td><input type="submit" name="save" value="Salvar" class="ui button"/></td>
                      </div>
                    </div>
                  </div>
                </form>
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

  
  <table class="ui fixed table" style="width: 42%;">
  <h1 class="header" style="margin-bottom: 2%;">Convidados</h1>
    <tr>
        <th style="width: 75%;">Nome</th>
        <th>Idade</th>
    </tr> 
<?php

    try {
 
    $stmt = $connect->prepare("SELECT id_convidado,nome, idade FROM convidados WHERE id_evento = :id");
 
        if ($stmt->execute(array(
          ':id' => $id_usuario))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".utf8_encode($rs->nome)."</td><td>".$rs->idade."<a href=\"?acao=upd&id=".$rs->id_convidado."\">"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".""."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".""."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".""."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<i class='pencil alternate icon'></i></a>"
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
?>
  </table>

  <a href="register_convidado.php">
    <button class="ui blue basic button" style="margin-left: 29.3%">
      <i class="icon plus"></i>
        Adicionar Convidado
    </button>
  </a>
<!--FIM BLOCO MOSTRA DADOS Convidados -->