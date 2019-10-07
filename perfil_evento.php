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

  $consulta = $connect->query('SELECT id_empresa, nome FROM empresa');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_empresa = $linha['id_empresa']; 
    $nome_empresa = $linha['nome'];
  }

  $consulta = $connect->query('SELECT valor_pago FROM despesa');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $valor_pago[] = $linha['valor_pago'];
  }
?>

<!--INICIO BLOCO DADOS EVENTO -->

<table class="ui fixed table" style="width: 94%; margin-left: 3%;">
    <tr>
        <th>Nome Evento</th>
        <th>Hora</th>
        <th>Data</th>
        <th>Local</th>
        <th>Descrição</th>
        <th>Valor da Festa</th>
    </tr> 

<?php

  try {
 
    $stmt = $connect->prepare("SELECT id_evento,nome_evento, hora, dia, local, descricao, valor_max_pagar FROM eventos WHERE id_evento = :id");
 
            if ($stmt->execute(array(
              ':id' => $_REQUEST['id']))) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                    echo "<h1 style=\"font-size: -webkit-xxx-large;\"><center>".utf8_encode($rs->nome_evento)."</center></h1>" ;
                    echo "<h2 class=\"header\" style=\"margin-left: 2%;\">Dados do Evento</h2>";
                    echo "<tr>";
                    echo "<td>".utf8_encode($rs->nome_evento)."</td><td>".utf8_encode($rs->hora)."</td><td>".utf8_encode($rs->dia)."</td><td>".utf8_encode($rs->local)."</td><td>".utf8_encode($rs->descricao)."</td><td>".utf8_encode($rs->valor_max_pagar)."<a href=\"?act=upd&id=".$rs->id_evento."\" style=\"float: right;\">"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".""."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".""."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".""."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<i class='pencil alternate icon'></i></a></td>";
                    echo "</tr>";
                }
            }
      } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
?>
</table>
<!-- FIM BLOCO DADOS EVENTO -->

<!--- BLOCO DE ALTERAR Eventos  -->
<?php 
if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'upd'  && $_REQUEST['id'] != '' ) {
  
  $stmt = $connect->prepare("SELECT id_evento,nome_evento,dia,hora,local,descricao,valor_max_pagar FROM eventos WHERE id_evento=:id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 
?>
  
  <h2 class="header" style="width: 100%; margin-left: 2%;">Alterar Dados do Evento</h2>  
<?php
   while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
?>
                <form method="POST" action="?act=salvar" style="width: 93.5%; margin-left: 3%;">
                  <div class="ui form">
                    <div class="two fields">
                      <input type="hidden" name="id" value="<?php echo $rs->id_evento ?>"/>
                      <div class="field">
                        <label>Nome Evento</label><input type="text" name="nome_evento" value="<?php echo utf8_encode($rs->nome_evento) ?>"/>
                      </div>
                      <div class="field">
                        <label>Hora</label><input type="time" name="hora" value="<?php echo $rs->hora ?>"/>
                      </div>
                      <div class="field">
                        <label>Data</label><input type="date" name="dia" value="<?php echo $rs->dia ?>"/>
                      </div>
                      <div class="field">
                        <label>Local</label><input type="text" name="local" value="<?php echo utf8_encode($rs->local) ?>"/>
                      </div>
                      <div class="field">
                        <label>Descrição</label><input type="text" name="descricao" value="<?php echo utf8_encode($rs->descricao) ?>"/>
                      </div>
                      <div class="field">
                        <label>Valor Máximo da Festa</label><input type="text" name="valor_max_pagar" value="<?php echo $rs->valor_max_pagar ?>"/>
                      </div>
                      
                      <input onClick="window.history.back();" type="button" value="Cancelar" class="ui inverted red button" style="margin-top: 1.5%"/>
                                            
                      <input type="submit" name="salvar" value="Salvar" class="ui inverted green button" style="margin-top: 1.5%"/>
                      
                    </div>
                  </div>
                </form>
<?php
            }
  }
?>
<!-- FIM BLOCO DE ALTERAR Eventos -->

<!-- BLOCO DE SALVAR Eventos -->
<?php 
if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'salvar'  && $_REQUEST['id'] != '' ) {
    $nome_evento = $_POST['nome_evento'];
    $hora = $_POST['hora'];
    $descricao = $_POST['descricao'];
    $dia = $_POST['dia'];
    $local = $_POST['local'];
    $valor_max_pagar = $_POST['valor_max_pagar'];

    $stmt = $connect->prepare("UPDATE eventos SET nome_evento=:nome_evento, dia=:dia, hora=:hora, local=:local, descricao=:descricao, valor_max_pagar=:valor_max_pagar  WHERE id_evento=:id");
    $stmt->execute(array(
      ':id' => $_REQUEST['id'],
      ':nome_evento' => $nome_evento,
      ':hora' => $hora,
      ':descricao' => $descricao,
      ':local' => $local,
      ':dia' => $dia,
      ':valor_max_pagar' => $valor_max_pagar
  ));
    
  $conexao = $connect->prepare("SELECT id_evento FROM eventos WHERE id_evento = :id");
    if ($conexao->execute(array(':id' => $_REQUEST['id']))) {
      while ($linhas = $conexao->fetch(PDO::FETCH_OBJ)) {                
      echo ('<meta http-equiv="refresh" content="0; url=perfil_evento.php?ver=view&id='.$linhas->id_evento.'">');                    
      }
    }   
}
?>
<!--FIM BLOCO DE SALVAR Eventos-->


<section style="float: left; width: 50%;">
<!--INICIO BLOCO ALTERAR E SALVAR Convidados -->
<?php 
if (isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'upd'  && $_REQUEST['id'] != '' ) {
  
  $stmt = $connect->prepare("SELECT id_convidado,nome, idade FROM convidados WHERE id_convidado=:id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  ));
?>  
   <h2 style="margin-left: 4%;">Alterar Dados Convidado</h2>  
<?php
   while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                

                ?> 
               
                <form method="POST" action="?acao=save" style="width: 92%; margin-left: 6%;">
                  <div class="ui form">
                    <div class="fields">
                      <input type="hidden" name="id" value="<?php echo $rs->id_convidado ?>"/>
                      <div class="twelve wide field">
                        <label>Nome</label><input type="text" name="nome" value="<?php echo utf8_encode($rs->nome) ?>"/><br>
                      </div>
                      <div class="three wide field">
                        <label>Idade</label><input type="text" name="idade" value="<?php echo $rs->idade ?>"/>
                      </div>
                      
                      <input onClick="window.history.back();" type="button" value="Cancelar" class="ui inverted red button" style="margin-top: 3%" />                      
                      
                      <input type="submit" name="save" value="Salvar" class="ui inverted green button" style="margin-top: 3%"/>
                      
                    </div>
                  </div>
                </form>
                      <?php
              
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





<!--INICIO BLOCO MOSTRA DADOS Convidados -->
<table class="ui fixed table" style="width: 91.8%; margin-left: 6%;">
  <h2 class="header" style="margin-bottom: 2%; margin-left: 4%;">Convidados</h2>
    <tr>
        <th style="width: 70%;">Nome</th>
        <th style="width: 18%;">Idade</th>
        <th></th>
    </tr> 
<?php

    try {
 
    $stmt = $connect->prepare("SELECT id_convidado,nome, idade FROM convidados WHERE id_evento = :id");
 
        if ($stmt->execute(array(
          ':id' => $_REQUEST['id']))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".utf8_encode($rs->nome)."</td><td>".$rs->idade."</td><td style=\"float: right;\"><a href=\"?acao=upd&id=".$rs->id_convidado."\">"."<i class='pencil alternate icon'></i></a>"
                           ."&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a href=\"?acao=del&id=".$rs->id_convidado."\"><i class='trash alternate icon'></i>"."&nbsp;&nbsp;&nbsp;&nbsp;"
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
  <?php
  echo "<a href=?acao=insere&id=".$_REQUEST['id'].">";?>
    <button class="ui blue basic button" style="float: right; margin-right: 2.5%;">
      <i class="icon plus"></i>
        Adicionar Convidado
    </button>
  </a>
<!--FIM BLOCO MOSTRA DADOS Convidados -->



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


<!-- INICIO BLOCO INSERE Convidados -->
<?php
if (isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'insere'  && $_REQUEST['id'] != '' ) {

  if(!isset($_POST['nome_ins'])) {
            
                echo "<tr>";
                echo "<td>";?>
                 <br><br><br>
                 <h2 style="margin-left: 2%;">Adicionar Convidado</h2>
                 <form method="POST" action="?acao=insere" style="width: 94%; margin-left: 3%;">
                    <div class="ui form">
                      <div class="fields">
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>"/>
                          <div class="twelve wide field">
                              <label>Nome do Convidado</label><input type="text" name="nome_ins"/>
                          </div>
                          <div class="three wide field">
                              <label>Idade</label><input type="text" name="idade_ins"/>
                          </div>

                          <input onClick="window.history.back();" type="button" value="Cancelar" class="ui inverted red button" style="margin-top: 3%"/>

                          <input type="submit" name="insere" value="Adicionar" class="ui inverted green button" style="margin-top: 3%" />
                          
                      </div>
                    </div>
                <?php 
                echo "</td>";
                echo "</tr>";
  } else {
    
      try{
            $stmt = $connect->prepare('INSERT INTO  convidados (idade, nome, id_evento) VALUES (:idade , :nome, :id_evento)');
            $stmt->execute(array(
              ':idade' => $_REQUEST['idade_ins'],
              ':nome' => $_REQUEST['nome_ins'],
              ':id_evento' => $_REQUEST['id']
            )); 
          }catch (PDOException $erro) {
              echo "Erro: ".$erro->getMessage();
          }
          }
  }

?>
<!--FIM BLOCO INSERE Convidados -->
</section>


<section style="float: right; width: 50%;">

<!--INICIO BLOCO ALTERAR E SALVAR DESPESA -->
<?php 
if (isset($_REQUEST['acaoo']) && $_REQUEST['acaoo'] == 'updt'  && $_REQUEST['id'] != '' ) {
  
  $stmt = $connect->prepare("SELECT eventos.id_evento, eventos.valor_max_pagar, empresa.nome, despesa.valor_pago, despesa.id_despesa, empresa.id_empresa FROM eventos, empresa, despesa WHERE empresa.id_empresa = despesa.id_empresa and eventos.id_evento = despesa.id_evento and despesa.id_despesa = :id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 

   while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                

                echo "<tr>";
                echo "<td>";?> 
                <h2>Alterar Dados Despesa</h2>
                <form method="POST" action="?acaoo=salvando" style="width: 178%; margin-left: 2%;">            
                  <div class="ui form">
                    <div class="fields">
                      <input type="hidden" name="id" value="<?php echo $rs->id_despesa ?>"/>
                      <div class="three wide field">
                        <label>Empresa</label>                       
                        <select name="id_empresa">
                          <?php 
                            $conexao = $connect->prepare("SELECT id_empresa, nome FROM empresa");
                              if ($conexao->execute()) {
                                while ($linhas = $conexao->fetch(PDO::FETCH_OBJ)) {                
                                  echo "<option value=\"".$linhas->id_empresa."\">".utf8_encode($linhas->nome)."</option>";
                                }
                              }
                          ?>
                        </select>
                      </div>
                      <div class="three wide field">
                        <label>Valor do Contrato</label><input type="text" name="valor_pago" value="<?php echo $rs->valor_pago ?>"/>
                      </div>
                      
                      <input onClick="window.history.back();" type="button" name="cancel" value="Cancelar" class="ui inverted red button" style="margin-top: 1.5%" />
                                                                
                      <input type="submit" name="salvando" value="Salvar" class="ui inverted green button" style="margin-top: 1.5%"/>
                      
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
if (isset($_REQUEST['acaoo']) && $_REQUEST['acaoo'] == 'salvando'  && $_REQUEST['id'] != '' ) { 

    $id_empresa = $_POST['id_empresa'];
    $valor_pago = $_POST['valor_pago'];

    $stmt = $connect->prepare("UPDATE despesa SET id_empresa=:id_empresa, valor_pago=:valor_pago WHERE id_despesa=:id");
    $stmt->execute(array(
      ':id' => $_REQUEST['id'],
      ':id_empresa' => $id_empresa,
      ':valor_pago' => $valor_pago
  ));              
                    
      
}
?>
<!--FIM BLOCO ALTERAR E SALVAR DESPESAS -->





<!--INICIO BLOCO MOSTRA DADOS DESPESAS -->
<table class="ui fixed table" style="width: 91.8%; margin-left: 2%;">
  <h2 class="header" style="margin-bottom: 2%;">Despesas</h2>
    <tr>
        <th style="width: 58%;">Empresa</th>
        <th style="width: 18%;">Valor do Contrato</th>
        <th></th>
    </tr> 
<?php

    try {
    
    $stmt = $connect->prepare("SELECT eventos.id_evento, eventos.valor_max_pagar, empresa.nome, despesa.valor_pago, despesa.id_despesa FROM eventos, empresa, despesa WHERE empresa.id_empresa = despesa.id_empresa and eventos.id_evento = despesa.id_evento and despesa.id_evento = :id");
    
        if ($stmt->execute(array(
          ':id' => $_REQUEST['id']))) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                echo "<tr>";
                echo "<td>".utf8_encode($rs->nome)."</td><td>R$ ".$rs->valor_pago."</td><td style=\"float: right;\"><a href=\"?acaoo=updt&id=".$rs->id_despesa."\">"."<i class='pencil alternate icon'></i></a>"."&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."<a href=\"?acaooo=delet&id=".$rs->id_despesa."\"><i class='trash alternate icon'></i>"."&nbsp;&nbsp;&nbsp;&nbsp;"
                           ."</a></center></td>";
                echo "</tr>";
                $valores_pagos[] = $rs->valor_pago;
                $despesa = $rs->valor_max_pagar - array_sum($valores_pagos);
            }
              if (empty($despesa)) {
                $stmt = $connect->prepare("SELECT id_evento, valor_max_pagar FROM eventos WHERE eventos.id_evento = :id");

                if ($stmt->execute(array(':id' => $_REQUEST['id']))) {
                  while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<td style=\"font-size: 150%;\"><b> Saldo Atual</b></td>";
                    echo "<td></td>";
                    echo "<td style=\"font-size: 150%; float: right;\"><b>R$ " .$rs->valor_max_pagar. "</b></td>";
                    echo "</table>";
                  }
                }                
              }else{
                echo "<td style=\"font-size: 150%;\"><b> Saldo Atual</b></td>";
                echo "<td></td>";
                echo "<td style=\"font-size: 150%; float: right;\"><b>R$ " .$despesa. "</b></td>";
                echo "</table>";
              }
        } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
        }
} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}
?>
  
  <?php
  echo "<a href=?acaodespesa=inseredespesa&id=".$_REQUEST['id'].">";?>
    <button class="ui blue basic button" style="float: right; margin-right: 6.5%;">
      <i class="icon plus"></i>
        Adicionar Despesa
    </button>
  </a>
<!--FIM BLOCO MOSTRA DADOS DESPESAS -->



<!--BLOCO EXCLUIR DADOS DESPESAS -->
<?php
  if (isset($_REQUEST["acaooo"]) && $_REQUEST["acaooo"] == "delet" && $_REQUEST['id'] != '') {
    try {
        $stmt = $connect->prepare("DELETE FROM despesa WHERE id_despesa=:id");
        $stmt->execute(array(
          ':id' => $_REQUEST['id'],
        ));
    }catch (PDOException $erro) {
      echo "Erro: ".$erro->getMessage();
    }
  }
?>

<!-- FIM DO BLOCO EXCLUIR DADOS DESPESAS -->


<!-- INICIO BLOCO INSERE DESPESAS -->
<?php
if (isset($_REQUEST['acaodespesa']) && $_REQUEST['acaodespesa'] == 'inseredespesa'  && $_REQUEST['id'] != '' ) {

  if(!isset($_POST['valor_pago'])) {
            
                echo "<tr>";
                echo "<td>";?>
                 <br><br><br>
                 <h2 style="margin-left: 2%;">Adicionar Despesa</h2>
                 <form method="POST" action="" style="width: 90%; margin-left: 3%;">
                    <div class="ui form">
                      <div class="fields">
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>"/>
                          <div class="ten wide field">
                            <label>Empresa</label>
                            <select name="id_empresa">
                              <?php 
                                $conexao = $connect->prepare("SELECT id_empresa, nome FROM empresa");
                                  if ($conexao->execute()) {
                                    while ($linhas = $conexao->fetch(PDO::FETCH_OBJ)) {                
                                      echo "<option value=\"".$linhas->id_empresa."\">".utf8_encode($linhas->nome)."</option>";
                                    }
                                  }
                              ?>
                            </select>
                          </div>
                          <div class="five wide field">
                              <td><label>Valor do Contrato</label><input type="text" name="valor_pago"/></td>
                          </div>

                          <input onClick="window.history.back();" type="button" name="cancel" value="Cancelar" class="ui inverted red button" style="margin-top: 3%" />                          
                             
                          <input type="submit" name="inseredespesa" value="Adicionar" class="ui inverted green button" style="margin-top: 3%;" />

                      </div>
                    </div>
                <?php                 
                echo "</td>";
                echo "</tr>";
  } else {
    
      try{
            $stmt = $connect->prepare('INSERT INTO  despesa (valor_pago, id_empresa, id_evento) VALUES (:valor_pago, :id_empresa, :id_evento)');
            $stmt->execute(array(
              ':valor_pago' => $_REQUEST['valor_pago'],
              ':id_empresa' => $_REQUEST['id_empresa'],
              ':id_evento' => $_REQUEST['id']
            )); 
          }catch (PDOException $erro) {
              echo "Erro: ".$erro->getMessage();
          }
          
        }
  }

?>
<!--FIM BLOCO INSERE DESPESAS -->
</section>


<?php
include "rodape.php";
?>