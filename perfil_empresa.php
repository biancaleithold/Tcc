<?php
  session_start();
  include 'config.php';
  include 'cabecalho.php';
  
  $consulta = $connect->query('SELECT id_empresa, cnpj, nome, rua, numero, complemento, bairro, cidade, foto_perfil, descricao, telefone, email_empresa, sigla, id_usuario FROM empresa WHERE id_empresa="'.$_REQUEST['id'].'"');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_empresa = $linha['id_empresa'];
    $cnpj = $linha['cnpj']; 
    $nome = $linha['nome'];
    $nome = $linha['nome'];
    $rua = $linha['rua'];
    $numero = $linha['numero'];
    $complemento = $linha['complemento'];
    $bairro = $linha['bairro'];
    $cidade = $linha['cidade'];
    $estado = $linha['sigla']; 
    $foto_perfil = $linha['foto_perfil'];
    $descricao = $linha['descricao']; 
    $telefone = $linha['telefone']; 
    $email_empresa = $linha['email_empresa'];
    $id_usuario = $_SESSION['id_usuario'];
  }

  $consulta = $connect->query('SELECT sigla, descricao_est FROM estados WHERE sigla="'.$estado.'"');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $sigla = $linha['sigla'];
    $descricao_est = $linha['descricao_est']; 
  }
  

?>
<br><br>
  <div class="ui cards" style="margin-right: 4%; float: left; width: 21%; margin-left: 4%">

  <div class="card">
    <div class="blurring dimmable image">
      <div class="ui inverted dimmer">
        
      </div>
      <?php
        if (!empty($foto_perfil)) {
      ?>
          <img  src="imagens/<?php echo $foto_perfil;?>">
      <?php
        }else{
      ?>
          <img  src="imagens/perfil.png">
      <?php
        }
      ?>
    </div>
    <div class="content">
      <h1 class="header">Nome: <?php echo utf8_encode($nome); ?></h1>
      <div class="meta">
        <h4 class="date">Email: <?php echo $email_empresa; ?></h4>
      </div><br>
      <div class="meta">
        <h4 class="date">CNPJ: <?php echo $cnpj; ?></h4>
      </div><br>
      <div class="meta">
        <h4 class="date">Telefone: <?php echo $telefone; ?></h4>
      </div><br>
      <div class="meta">
        <h4 class="date">Endereço: <?php echo "Rua ".utf8_encode($rua).", n°"."$numero"." -  ".utf8_encode($bairro).". ".utf8_encode($cidade)." - "."$sigla"."( ".utf8_encode($descricao_est)." )<br>Complemento: "."$complemento"."."; ?></h4>
      </div><br>
<?php
       $consultando = $connect->query('SELECT id_especializacao, id_empresa FROM emp_esp WHERE id_empresa ="'.$id_empresa.'"');
       while ($linha = $consultando->fetch(PDO::FETCH_ASSOC)) {
         $id_esp[] = $linha['id_especializacao'];
         $id_empresa = $linha['id_empresa']; 
       }?>      
       
       <div class="meta"><h4 class="date"> Trabalhamos com</h4></div> 
      <?php foreach ($id_esp as $value) {
        try{
          $consulta = $connect->prepare('SELECT id_especializacao, descricao_esp FROM especializacao WHERE id_especializacao="'.$value.'"');
             if ($consulta->execute(array(':id_especializacao' => $value))) {        
               while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
                 <div class="meta">
                 <h4 class="date">  <?php echo utf8_encode($linha->descricao_esp) ?></h4>
               </div>
             <?php
               }
             }
     }catch (PDOException $erro) {
       echo "Erro: ".$erro->getMessage();
   }
      }

      
?>     

    </div>
    <div class="extra content">  
<?php
    $consulta = $connect->query('SELECT id_usuario FROM empresa WHERE id_empresa="'.$_REQUEST['id'].'"');
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $id_user = $linha['id_usuario'];
    }

    if (isset($_SESSION['id_usuario']) and $_SESSION['id_usuario'] != "" and $id_user==$_SESSION['id_usuario']) {?>
           <button class="ui basic button test"><i class="edit icon"></i> 
        <?php echo  "<a href=?acao=upd&id=".$id_empresa.">"; ?>Editar Perfil</a></button>
  <?php
    }
  ?>
    </div>
  </div>
</div>

<h1 class="header" style="font-size: xx-large;">Sobre a Empresa</h1>
<h5 class="descricao_empresa">
  <?php echo $descricao; ?>
</h5>

<?php
  if(isset($_POST['submit']) ){
    $arr = filter( $_POST['excluir'] );

    $sql = $connect->prepare('DELETE FROM galeria_empresa WHERE id_foto IN('.implode( ',', $arr ).')');
    $sql->execute(array(
          $arr = filter( $_POST['excluir'] )
        ));

    echo "<script type=\"text/javascript\">alert('Excluído com sucesso!');</script>";
        header("Refresh: 0");
        exit();
  }
  function filter( $dados ){
    $arr = Array();
    foreach( $dados AS $dado ) $arr[] = (int)$dado;
    return $arr;
  }
?>

<h1 class="header" style="font-size: xx-large;">Confira fotos de eventos já realizados!</h1>
 <?php if (isset($_SESSION['id_usuario']) and $_SESSION['id_usuario'] != "" and $id_user==$_SESSION['id_usuario']) {?>
<section style="float: left; width: 28%; margin-top: 0.5%;"><p class="header">Para excluir fotos, selecione as que desejar e clique em excluir!</p></section>
<?php } ?>

              <?php if (isset($_SESSION['id_usuario']) and $_SESSION['id_usuario'] != "" and $id_user==$_SESSION['id_usuario']) {?>
                <section style="float: right; width: 17%;"><div class="arruma_galeria">
                <input type="submit" name="submit" class="ui tiny inverted red button" value="Excluir Fotos Selecionadas"></div></section><br><br><br>
              <?php } ?>

<?php 
   $consulta = $connect->query('SELECT id_foto,descricao_foto, id_empresa FROM galeria_empresa WHERE id_empresa="'.$_REQUEST['id'].'"');
   $count_img = 0;
   while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
     $id_foto = $linha['id_foto']; 
     $descricao_foto = $linha['descricao_foto'];?>

<?php if (isset($_SESSION['id_usuario']) and $_SESSION['id_usuario'] != "" and $id_user==$_SESSION['id_usuario']) {?>
              
                
        <div class="container" style="float:left;margin: 0.5%;">
            <form method="post" action="">
                    <input style="float: left;" type="checkbox" name="excluir[]" value="<?php echo $id_foto;?>"/> <?php } ?>
          <img src="imagens/galeria/<?php echo $descricao_foto; ?>" width="305" height="215" onclick="clique(this)">
        
                    <div id="janelaModal" class="modalVisual">
                          <span class="fechar" ="fechar">x</span>                       
                            <div id="<?php echo $count_img; ?>" class="mySlides fade">
                              <img class="modalConteudo" id="imgModal" src="imagens/galeria/<?php echo $descricao_foto; ?>">
                            </div> 
                         <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                         <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
        </div>
        <!--http://wtricks.com.br/galeria-fotos-simples-e-responsiva-usando-apenas-css-e-javascript/-->

<?php 
$count_img++;
  } ?>
            </form>

<?php if (isset($_SESSION['id_usuario']) and $_SESSION['id_usuario'] != "" and $id_user==$_SESSION['id_usuario']) {?>
<div style="float: right; margin-right: 5%; margin-top: 5%;">
<form enctype="multipart/form-data" method="post" action="">
   <h3><strong>Adicionar Fotos em Minha Galeria</strong></h3>
   <input type="file" multiple name="descricao_foto[]" class="ui primary basic button"><br><br>
   <input type="submit" name="envia" value="Adicionar" class="ui inverted green button" style="float: right;">
</form>
</div>

<?php } ?>

<?php
 if (isset($_POST['envia'])) {
   
  $diretorio = "imagens/galeria/";
  
  if(!is_dir($diretorio)){ 
    echo "Pasta $diretorio nao existe";
  }else{
    $arquivo = isset($_FILES['descricao_foto']) ? $_FILES['descricao_foto'] : FALSE;
    for ($controle = 0; $controle < count($arquivo['name']); $controle++){
      
      $destino = $diretorio."/".$arquivo['name'][$controle];
      if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
        echo "<script type=\"text/javascript\">alert('Upload realizado com sucesso!');</script>";
        header("Refresh: 0");
        $descricoes_fotos[]  = $arquivo['name'][$controle];
      }else{
        echo "Erro ao realizar upload";
      }   
    }
  }

  try {
    foreach ($descricoes_fotos as $descricao) { 
      $stmt = $connect->prepare("INSERT INTO galeria_empresa (descricao_foto, id_empresa) VALUES (:descricao_foto, :id)");
      $stmt->execute(array(
        ':descricao_foto' => $descricao,
        ':id' => $_REQUEST['id']     
      )); 
    }
  } catch (PDOException $e) {
    $errMsg = $e->getMessage();
  }
  
 }
  ?>

<!--https://bootsnipp.com/snippets/P2gor-->



<?php
if (isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'upd'  && $_REQUEST['id'] != '' ) {
  
  $stmt = $connect->prepare("SELECT id_empresa, cnpj, nome, rua, numero, complemento, bairro, cidade, foto_perfil, descricao, telefone, email_empresa FROM empresa WHERE id_empresa=:id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 

   while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
              ?>

                  <!-- COMO COLOCAR ISSO FORA DO IF E FUNCIONAR? -->
                  <div class="ui modal">
                    <i class="close icon"></i>
                    <div class="header">
                      Alterar Dados
                    </div>
                  
                    <form class="ui form" method="POST" action="?agir=salva" style="width: 50%; margin-left:25%">
                                  <h3>Alterar meus dados</h3>
                                      <input type="hidden" name="id" value="<?php echo $rs->id_empresa ?>"/>
                                      <td><label>CNPJ</label><input type="text" name="cnpj" value="<?php echo $rs->cnpj ?>"/></td><br>
                                      <td><label>Nome</label><input type="text" name="nome" value="<?php echo $rs->nome ?>"/></td><br>
                                      <td><label>Rua</label><input type="text" name="rua" value="<?php echo $rs->rua ?>"/></td><br>
                                      <td><label>Numero</label><input type="text" name="numero" value="<?php echo $rs->numero ?>"/></td><br>
                                      <td><label>Complemento</label><input type="text" name="complemento" value="<?php echo $rs->complemento ?>"/></td><br>
                                      <td><label>Bairro</label><input type="text" name="bairro" value="<?php echo $rs->bairro ?>"/></td><br>
                                      <td><label>Cidade</label><input type="text" name="cidade" value="<?php echo $rs->cidade ?>"/></td><br>
                                      <td><label>Estado</label>
                                      
                                      <select name="lista_estados">
                                        <option value="" <?=($sigla == '')?'selected':''?> >Selecione</option>
                                        <?php

                                          $consulta = $connect->query('SELECT sigla, descricao_est FROM estados');
                                          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                            $id = $linha['sigla'];
                                            $descricao_est = $linha['descricao_est']; ?>
                                            <option value=<?php echo "$id"?> <?=($descricao_est == $id)?'selected':''?> ><?php echo $descricao_est; ?></option>
                                          <?php } 
                                        ?>
                                      </select>
                                      
                                      </td><br>

                                      <td><label>Especialização</label>
                                      
                                      <select multiple name="lista_especializacao[]">
                                        <option value="" >Selecione</option>
                                        <?php

                                           $consulta = $connect->query('SELECT id_especializacao, descricao_esp FROM especializacao');
                                           while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                             $id = $linha['id_especializacao'];
                                             $descricao_esp = $linha['descricao_esp']; ?>
                                            <option value=<?php echo "$id"?> <?=($descricao_esp == $id)?'selected':''?> ><?php echo $descricao_esp; ?></option>
                                          <?php 
                                        } 
                                        ?>
                                      </select>
                                      
                                      </td><br>

                                      <td><label>Foto de Perfil</label><input type="file" name="foto_perfil" value="<?php echo $rs->foto_perfil ?>"/></td><br>
                                      <td><label>Descrição</label><input type="text" name="descricao" value="<?php echo $rs->descricao ?>"/></td><br>
                                      <td><label>Telefone</label><input type="text" name="telefone" value="<?php echo $rs->telefone ?>"/></td><br>
                                      <td><label>Email</label><input type="email" name="email_empresa" value="<?php echo $rs->email_empresa ?>"/></td><br>        
                                     
                    <div class="actions">
                      <div class="ui cancel button">Cancelar</div>
                      <td><input type="submit" name="salva" value="Salvar" class="ui button" /></td></form>
                      </a>
                    </div>
                  </div>

              <?php
             
            }
}
?>



<!--INICIO BLOCO SALVAR Empresa -->
<?php 
if (isset($_REQUEST['agir']) && $_REQUEST['agir'] == 'salva'  && $_REQUEST['id'] != '' ) {
  
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['nome'];
    $sigla = $_POST['lista_estados'];
    $foto_perfil = $_POST['foto_perfil'];
    $descricao = $_POST['descricao'];
    $telefone = $_POST['telefone'];
    $email_empresa = $_POST['email_empresa'];
    
    $stmt = $connect->prepare("UPDATE empresa SET  cnpj=:cnpj, nome=:nome, rua=:rua, numero=:numero, complemento=:complemento, bairro=:bairro, cidade=:cidade, sigla=:lista_estados, foto_perfil=:foto_perfil, descricao=:descricao,telefone=:telefone, email_empresa=:email_empresa WHERE id_empresa=:id");
    $stmt->execute(array(
      ':id' => $_REQUEST['id'],
      ':cnpj' => $cnpj,
      ':nome' => $nome,
      ':rua' => $rua,
      ':numero' => $numero,
      ':complemento' => $complemento,
      ':bairro' => $bairro,
      ':cidade' => $cidade,
      ':lista_estados' => $sigla,
      ':foto_perfil' => $foto_perfil,
      ':descricao' => $descricao,
      ':telefone' => $telefone,
      ':email_empresa' => $email_empresa
      ));



         try {
            $stmt = $connect->prepare("DELETE FROM emp_esp WHERE id_empresa=:id");
            $stmt->execute(array(
              ':id' => $_REQUEST['id'],
            ));
          
        }catch (PDOException $erro) {
          echo "Erro: ".$erro->getMessage();
        }
        
    
    $lista_especializacao = $_POST['lista_especializacao'];

foreach ($lista_especializacao as $especializacao) {
    $stmt = $connect->prepare('INSERT INTO emp_esp (id_empresa, id_especializacao) VALUES (:id,:id_especializa)');
    $stmt->execute(array(
      ':id' => $_REQUEST['id'],
      ':id_especializa' => $especializacao
    ));
  }
}
?>
<!--FIM BLOCO SALVAR Empresa -->
<?php
include 'rodape.php';
?>