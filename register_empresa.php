<?php
  require 'config.php';
  include("cabecalho.php");
  include("funcoes_validacao.php");
  ini_set('display_errors', 0);
  error_reporting(0);
  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $logo = $_FILES['logo'];
    $descricao = $_POST['descricao'];
    $telefone = $_POST['telefone'];
    $email_empresa = $_POST['email_empresa'];
    $especializacoes = $_POST['especializacao'];
    $categorias = $_POST['categoria'];
    $target_dir = "imagens/";
    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $id_usuario = $_SESSION['id_usuario'];
      

    if($cnpj == '')
      $errMsg = 'Insira o cnpj';
    if($nome == '')
      $errMsg = 'Insira o nome';
    if($rua == '')
      $errMsg = 'Insira a rua';
    if($numero == '')
      $errMsg = 'Insira o numero';
    if($complemento == '')
      $errMsg = 'Insira o complemento';
    if($bairro == '')
      $errMsg = 'Insira o bairro';
    if($cidade == '')
      $errMsg = 'Insira a cidade';
    if($estado == '')
      $errMsg = 'Insira o estado';
    if($descricao == '')
      $errMsg = 'Insira a descricao';
    if($telefone == '')
      $errMsg = 'Insira o telefone';
    if($email_empresa == '')
      $errMsg = 'Insira o email da empresa';
    if($especializacoes == '')
      $errMsg = 'Insira a especialização';
    if ($categorias == '') 
      $errMsg = 'Insira os eventos que sua empresa realiza';
   
  
    // Se a foto estiver sido selecionada
    if (!empty($logo["name"])) {
      // Largura máxima em pixels
      $largura = 40000;
      // Altura máxima em pixels
      $altura = 40000;
      // Tamanho máximo do arquivo em bytes
      $tamanho = 1000000;
 
      $error = array();
      

      // Verifica se o arquivo é uma imagem
      if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $logo["type"])){
        $error[1] = "Isso não é uma imagem.";
      } 
  
      // Pega as dimensões da imagem
      $dimensoes = getimagesize($logo["tmp_name"]);
  
      // Verifica se a largura da imagem é maior que a largura permitida
      if($dimensoes[0] > $largura) {
        $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
      }
 
      // Verifica se a altura da imagem é maior que a altura permitida
      if($dimensoes[1] > $altura) {
        $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
      }
    
      // Verifica se o tamanho da imagem é maior que o tamanho permitido
      if($logo["size"] > $tamanho) {
        $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
      }
 
      // Se não houver nenhum erro
      if (count($error) == 0) {
        // Pega extensão da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $logo["name"], $ext);
 
       // Faz o upload da imagem para seu respectivo caminho
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        } else {
          echo "Erro no Upload!";
        }
        // move_uploaded_file($logo["tmp_name"], $caminho_imagem);
      }
    }

        if($errMsg == '' && ValidaCNPJ($cnpj)==false && ValidaTelefone($telefone)==false){
        // Insere os dados no banco
            $stmt = $connect->prepare('INSERT INTO empresa (cnpj, nome, rua, numero, complemento, bairro, cidade, sigla, foto_perfil, descricao, telefone, email_empresa, id_usuario) VALUES (:cnpj, :nome, :rua, :numero, :complemento, :bairro, :cidade, :estado, :logo, :descricao, :telefone, :email_empresa, :id_usuario)');
            $stmt->execute(array(
              ':cnpj' => $cnpj,
              ':nome' => $nome,
              ':rua' => $rua, 
              ':numero' => $numero,
              ':complemento' => $complemento,
              ':bairro' => $bairro,
              ':cidade' => $cidade,
              ':estado' => $estado,
              ':logo' => $_FILES["logo"]["name"],
              ':descricao' => $descricao,
              ':telefone' => $telefone,
              ':email_empresa' => $email_empresa,
              ':id_usuario' => $_SESSION['id_usuario'] 
            ));

          
            $id_empresa = $connect->lastInsertId();

                foreach ($especializacoes as $especializacao) { 
                  
                  $stmt = $connect->prepare('INSERT INTO emp_esp (id_empresa, id_especializacao) VALUES (:id_empresa,:id_especializacao)');
                  $stmt->execute(array(
                    ':id_empresa' => $id_empresa,
                    ':id_especializacao' => $especializacao
                    ));
                }

          

              foreach ($categorias as $categoria) {
                $stmt = $connect->prepare('INSERT INTO emp_categ (id_empresa, id_categoria) VALUES (:id_empresa, :id_categoria)');
                $stmt->execute(array(
                  ':id_empresa' => $id_empresa,
                  ':id_categoria' => $categoria
                ));
              }

            echo "<script type=\"text/javascript\">alert('Cadastrado com sucesso!');</script>";
            header("Refresh: 0; url=perfil_usuario.php?action=joined");
            exit;
        } 
      
  }
?>


<br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<div class="centraliza_img">
  <h1 style="margin-top: 0.5%">Cadastro de Empresa</h1>
</div>

<!--<div class="ui form login">

      Parte do Prof -->
      <?php
        if(isset($errMsg)){
          echo '<div style="color:green;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>

<form name="form1" class="ui form" style="max-width:65%; margin-left: 18%; margin-top: 1%" action="register_empresa.php" enctype="multipart/form-data" method="post">
  <div class="field"> 
    <div class="two fields">
      <div class="field">
        <label>CNPJ</label>
        <input type="text" name="cnpj" maxlength="18" onkeypress="$(this).mask('00.000.000/0000-00')" placeholder="00.000.000/0000-00">
      </div>
      <div class="field">
      <label>Nome</label>
        <input type="text" name="nome" placeholder="Celebrate Festas e Eventos">
      </div>
    </div>
  </div>
  <div class="field">
      <label>Eventos que Realiza</label>
      <?php
        $stmt = $connect->prepare("SELECT id_categoria, nome FROM categoria_evento");      
      ?>
      <div class="inline field">
        <!-- https://codepen.io/danbrady/pen/VrjGEW -->
        <?php 
        if ($stmt->execute()) {
          while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) { 
            echo "<div style=\"float: left; margin: 0%; margin-bottom: 1.5%; margin-left: 5%;\">";
              echo "<input type=\"checkbox\" name=\"especializacao[]\" multiple=\"\" value=\"".$rs->id_categoria."\" class=\"ui checkbox\">";
              echo utf8_encode($rs->nome);
            echo "</div>";              
          }
        }
        ?>
      </div>
    </div>
  <div class="field">
    <div class="fields">
      <div class="twelve wide field">
      <label>Rua</label>
        <input type="text" name="rua" placeholder="Juscelino Kubitschek">
      </div>
      <div class="four wide field">
        <label>Número</label>
        <input type="text" name="numero" placeholder="198">
      </div>
      <div class="four wide field">
        <label>Complemento</label>
        <input type="text" name="complemento" placeholder="Apartamento 4987">
      </div>
    </div>
  </div>
  <div class="two fields">
    <div class="field">
      <label>Bairro</label>
       <input type="text" name="bairro" placeholder="Bucarein">
    </div>
    <div class="field">
      <label>Cidade</label>
        <input type="text" name="cidade" placeholder="Joinville">
    </div>
  </div>
  <div class="two fields">
    <div class="field">
      <label>Estado</label>
      <?php
        $stmt = $connect->prepare("SELECT sigla, descricao_est FROM estados");      
      ?>
      <!--<select name="estado" class="label ui selection fluid dropdown">-->
      <select name="estado">
        <option value="">Estado</option>
        <?php 
        if ($stmt->execute()) {
          while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
            echo "<option value=\"".$rs->sigla."\">".utf8_encode($rs->sigla)."</option>";
          }
        }
        ?>
      </select>
    </div>
    <div class="field">
      <label>Logo</label>
        <input type="file" name="logo">
    </div>
  </div>
  <div class="field">
    <label>Descrição</label>
    <textarea name="descricao" rows="1" placeholder="Estamos no mercado desde 1998!"></textarea>
  </div>
  <div class="two fields">
      <div class="field">
        <label>Telefone</label>
        <input type="text" name="telefone" value="" onkeypress="$(this).mask('(00) 0000-0000')"  placeholder="(47)99841-6593">
      </div>
      <div class="field">
      <label>E-mail</label>
        <input type="text" name="email_empresa" placeholder="celebrate.festas@gmail.com">
      </div>
  </div>
  <div class="field">
      <label>Serviços Prestados</label>
      <?php
        $stmt = $connect->prepare("SELECT id_especializacao, descricao_esp FROM especializacao");      
      ?>
      <div class="inline field">
      <!-- https://codepen.io/danbrady/pen/VrjGEW -->
        <?php 
          if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
              // echo "<option value=\"".$rs->id_especializacao."\">".utf8_encode($rs->descricao_esp)."</option>";
              echo "<div style=\"width: 25%; float: left; margin: 0%; margin-bottom: 4px;\">";
                echo "<input type=\"checkbox\" name=\"especializacao[]\" multiple=\"\" value=\"".$rs->id_especializacao."\" class=\"ui checkbox\">";
                echo utf8_encode($rs->descricao_esp);
              echo "</div>";
            }
          }
        ?>
      </div>              
    </div>
</div>
    <input type="submit" name='register' value="Cadastrar" class="ui button" style="float:right; margin-top: 3%; margin-bottom: 3%;">

</form>
</div>


<script type="text/javascript">
  $('.tag.example .ui.dropdown')
  .dropdown({
    allowAdditions: true
  })
;
</script>