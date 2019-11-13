<?php
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
  <div class="ui cards" style="margin-right: 4%; float: left; margin-left: 3%">

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
          <img  src="imagens/empresa.png">
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

      
       
       <div class="meta"><h4 class="date"> Nossas especializações</h4></div> 
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

      $consultando1 = $connect->query('SELECT id_categoria, id_empresa FROM emp_categ WHERE id_empresa ="'.$id_empresa.'"');
      while ($linha = $consultando1->fetch(PDO::FETCH_ASSOC)) {
        $id_categ[] = $linha['id_categoria'];
        $id_empresa = $linha['id_empresa']; 
      }?>
<br>
    <div class="meta"><h4 class="date"> Trabalhamos com</h4></div> 
        <?php foreach ($id_categ as $value) {
          try{
            $consulta = $connect->prepare('SELECT id_categoria, nome FROM categoria_evento WHERE id_categoria="'.$value.'"');
              if ($consulta->execute(array(':id_categoria' => $value))) {        
                while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
                  <div class="meta">
                  <h4 class="date">  <?php echo utf8_encode($linha->nome) ?></h4>
                </div>
              <?php
                }
              }
      }catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
        }
?>


    
    <div class="extra content" style="margin-top: 7%;">  
<?php
    $consulta = $connect->query('SELECT id_usuario FROM empresa WHERE id_empresa="'.$_REQUEST['id'].'"');
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $id_user = $linha['id_usuario'];
    }

    if (isset($_SESSION['id_usuario']) and $_SESSION['id_usuario'] != "" and $id_user==$_SESSION['id_usuario']) {?>
        <?php echo  "<a href=edita_perfil.php?edita=empresa&id=".$id_empresa.">"; ?><i class="edit icon"></i>
        Editar Perfil</a>
  <?php
    }
  ?>
    </div>
  </div>
</div>


<section style="float: right; width: 71%; margin-left: 5%;">

<h1 class="header" style="font-size: 55px; font-family: initial;">Sobre a Empresa</h1>
<h5 class="descricao_empresa">
  <?php echo utf8_encode($descricao); ?>
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

<h1 class="header" style="font-size: 40px; font-family: initial;">Confira fotos de eventos já realizados!</h1>
 <?php 
  $consulta = $connect->query('SELECT id_foto FROM galeria_empresa WHERE id_empresa="'.$_REQUEST['id'].'"');
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $foto = $linha['id_foto'];
  }

 if (isset($_SESSION['id_usuario']) and $_SESSION['id_usuario'] != "" and $id_user==$_SESSION['id_usuario'] and !empty($foto)) {?>
<section style="float: left; width: 28%; margin-top: 0.5%;"><p class="header">Para excluir fotos, selecione as que desejar e clique em excluir!</p></section>   
              <form method="post" action="">
                <section style="float: right; width: 25%;"><div class="arruma_galeria">
                <input type="submit" name="submit" class="ui tiny inverted red button" value="Excluir Fotos Selecionadas"></div></section><br><br><br>
<?php }elseif(empty($foto)){ ?>
<section style="float: left; width: 28%; margin-top: 0.5%;"><p class="header">Esta empresa ainda não possui fotos!</p></section>
<?php } ?>

<?php 
   $consulta = $connect->query('SELECT id_foto,descricao_foto, id_empresa FROM galeria_empresa WHERE id_empresa="'.$_REQUEST['id'].'"');
   $count_img = 0;
   while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
     $id_foto = $linha['id_foto']; 
     $descricao_foto = $linha['descricao_foto'];?>
     
<?php if (isset($_SESSION['id_usuario']) and $_SESSION['id_usuario'] != "" and $id_user==$_SESSION['id_usuario']) {?>
              
                
        <div class="container" style="float:left; margin: 0.5%;">
          <input style="float: left;" type="checkbox" name="excluir[]" value="<?php echo $id_foto;?>"/> <?php } ?>
          <img src="imagens/galeria/<?php echo $descricao_foto; ?>" width="305" height="215" onclick="clique(this)">
              <div id="janelaModal" class="modalVisual">
        
            <span class="fechar" ="fechar">x</span>                       
            <div id="<?php echo $count_img; ?>">
              <img class="modalConteudo" id="imgModal" src="imagens/galeria/<?php echo $descricao_foto; ?>">
            </div> 
          </div>
        </div>
        <!--http://wtricks.com.br/galeria-fotos-simples-e-responsiva-usando-apenas-css-e-javascript/-->

<?php 
$count_img++;
  } ?>
            </form>

<?php if (isset($_SESSION['id_usuario']) and $_SESSION['id_usuario'] != "" and $id_user==$_SESSION['id_usuario']) {?>

<div style="float: right; margin-top: 1%; width: 33%;">
<br>
<form enctype="multipart/form-data" method="post" action="">
   <h3><strong>Adicionar Fotos em Minha Galeria</strong></h3>
   <input type="file" multiple name="descricao_foto[]" class="ui primary basic button"><br><br>
   <input type="submit" name="envia" value="Adicionar" class="ui button" style="float: right;">
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
   echo "<script type=\"text/javascript\">alert('Upload realizado com sucesso!');</script>";
        header("Refresh: 0");
  
 }
  ?>

</section>
<!--https://bootsnipp.com/snippets/P2gor-->

<?php
include 'rodape.php';
?>