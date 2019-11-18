<?php 
    include 'config.php';
    include 'cabecalho.php';
    include 'funcoes_validacao.php';


	//INICIO BLOCO ALTERAR E SALVAR Usuario

if (isset($_REQUEST['atualiza']) && $_REQUEST['atualiza'] == 'usuario'  && $_REQUEST['id'] != '' ) {
  
  $stmt = $connect->prepare("SELECT id_usuario,nome,email,telefone,senha,foto_perfil,cpf FROM usuario WHERE id_usuario=:id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 

  while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
    ?>
    <div class="centraliza_img">
			<h1 style="margin-top: 2%">Alterar Dados</h1>
		</div>
    <div class="ui form login">
      <form  method="post" action="?agir=salva" enctype="multipart/form-data">
        <div class="field">
          <input type="hidden" name="id" value="<?php echo $rs->id_usuario ?>"/>
          <label>Nome</label><input type="text" name="nome" value="<?php echo utf8_encode($rs->nome) ?>"/><br><br>
          <label>Email</label><input type="email" name="email" value="<?php echo utf8_encode($rs->email) ?>"/><br><br>
          <label>Telefone</label><input type="text" name="telefone" onKeyUp='mascara(this,"(##) ####-####","(")' value="<?php echo $rs->telefone ?>"/><br><br>
          <label>Senha</label><input type="password" name="senha" value="<?php echo $rs->senha ?>"/><br><br>
          <label>Foto de Perfil</label><input type="file" name="foto_perfil" value="<?php echo $rs->foto_perfil ?>"/><br><br>
          <label>CPF</label><input type="text" name="cpf" value="<?php echo $rs->cpf ?>"/><br><br>
          <div onClick="window.history.back();" class="ui cancel button">Cancelar</div>
          <input type="submit" name='salva' value="Salvar" class="ui button">
        </div>  
      </form>
    </div>           
    <?php            
  }
}
?>

<?php 
if (isset($_REQUEST['agir']) && $_REQUEST['agir'] == 'salva'  && $_REQUEST['id'] != '' ) {

  $id_usuario = $_REQUEST['id'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $senha = $_POST['senha'];
  $foto_perfil = $_FILES["foto_perfil"];
  $cpf = $_POST['cpf'];
  $target_dir = "imagens/";
  $target_file = $target_dir . basename($_FILES["foto_perfil"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if($nome == '')
    $errMsg = 'Insira o nome!';
  if($email == '')
    $errMsg = 'Insira o email!';
  if($telefone == '')
    $errMsg = 'Insira a telefone!';
  if($senha == '')
    $errMsg = 'Insira o senha!';
  if($cpf == '')
    $errMsg = 'Insira o cpf!';

  // Se a foto estiver sido selecionada
  if (!empty($foto_perfil["name"])) {
    // Largura máxima em pixels
    $largura = 40000;
    // Altura máxima em pixels
    $altura = 40000;
    // Tamanho máximo do arquivo em bytes
    $tamanho = 1000000;
 
    $error = array();
 
    // Verifica se o arquivo é uma imagem

    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto_perfil["type"])){
      $error[1] = "Isso não é uma imagem.";
    } 
  
    // Pega as dimensões da imagem
    $dimensoes = getimagesize($foto_perfil["tmp_name"]);
  
    // Verifica se a largura da imagem é maior que a largura permitida
    if($dimensoes[0] > $largura) {
      $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
    }
 
    // Verifica se a altura da imagem é maior que a altura permitida
    if($dimensoes[1] > $altura) {
      $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
    }
    
    // Verifica se o tamanho da imagem é maior que o tamanho permitido
    if($foto_perfil["size"] > $tamanho) {
      $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
    }
 
    // Se não houver nenhum erro
    if (count($error) == 0) {
      // Pega extensão da imagem
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto_perfil["name"], $ext);
 
      // Faz o upload da imagem para seu respectivo caminho
      if (move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], $target_file)) {
        echo "Arquivo ". basename( $_FILES["foto_perfil"]["name"]). "foi inserido.";
      } else {
        echo "Erro no Upload!";
      }
      // move_uploaded_file($foto_perfil["tmp_name"], $caminho_imagem);
    }
  }

  if($errMsg == '' && ValidaCPF($cpf)==false && ValidaTelefone($telefone)==false){
    $stmt = $connect->prepare("UPDATE usuario SET nome=:nome, email=:email, telefone=:telefone, senha=:senha, foto_perfil=:imagem, cpf=:cpf WHERE id_usuario=:id");
    $stmt->execute(array(
      ':id' => $_REQUEST['id'],
      ':nome' => $nome,
      ':email' => $email,
      ':telefone' => $telefone,
      ':senha' => $senha,
      ':imagem' => $_FILES["foto_perfil"]["name"],
      ':cpf' => $cpf  
    ));

    echo "<script type=\"text/javascript\">alert('Alterado com sucesso! Por favor, realize o login novamente para continuar!');</script>";
    header("Refresh: 0; url=login.php");
  }else{
    if(isset($errMsg)){
      echo "<script type=\"text/javascript\">alert('".$errMsg."');</script>";
      header("Refresh: 0; url=edita_perfil.php?atualiza=usuario&id=$id_usuario");
    }
  }

  if(isset($_REQUEST['agir']) && $_REQUEST['agir'] == 'salva') {
    session_start();
    require 'config.php';
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    session_destroy();

    exit();
  } 
  //FIM BLOCO ALTERAR E SALVAR Usuario
}

//EDITA EMPRESA
if (isset($_REQUEST['edita']) && $_REQUEST['edita'] == 'empresa'  && $_REQUEST['id'] != '' ) {	 
  $stmt = $connect->prepare("SELECT id_empresa, cnpj, nome, rua, numero, complemento, bairro, cidade, foto_perfil, descricao, telefone, email_empresa FROM empresa WHERE id_empresa=:id");
  $stmt->execute(array(
    ':id' => $_REQUEST['id'],
  )); 

  while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
    ?>                   
    <div class="centraliza_img">
      <h1 style="margin-top: 2%">Alterar Dados</h1>
    </div>
    <form  style="max-width:65%; margin-left: 18%; margin-top: 1%" class="ui form" method="POST" action="?acao=salvar" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $rs->id_empresa ?>"/>
      <div class="field"> 
        <div class="two fields">
          <div class="field">
            <label>CNPJ</label><input type="text" name="cnpj" onkeypress="$(this).mask('00.000.000/0000-00')" value="<?php echo $rs->cnpj ?>"/>
          </div>
  				<div class="field">
            <label>Nome</label><input type="text" name="nome" value="<?php echo utf8_encode($rs->nome) ?>"/></div>
          </div>
        </div>
        <div class="field">
      <label>Eventos que Realiza (selecione novamente)</label>
      <?php
        $stmt = $connect->prepare("SELECT id_categoria, nome FROM categoria_evento");      
      ?>
      <div class="inline field">
        <!-- https://codepen.io/danbrady/pen/VrjGEW -->
        <?php 
        if ($stmt->execute()) {
          while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) { 
            echo "<div style=\"float: left; margin: 0%; margin-bottom: 1.5%; margin-left: 5%;\">";
              echo "<input type=\"checkbox\" name=\"especializacao[]\" multiple=\"\" value=\"".$linha->id_categoria."\" class=\"ui checkbox\">";
              echo utf8_encode($linha->nome);
            echo "</div>";              
          }
        }
        ?>
      </div>
    </div>
        <div class="field">
          <div class="fields">
            <div class="twelve wide field">
              <label>Rua</label><input type="text" name="rua" value="<?php echo utf8_encode($rs->rua) ?>"/>
            </div>
  					<div class="four wide field">
              <label>Numero</label><input type="text" name="numero" value="<?php echo $rs->numero ?>"/>
            </div>
  					<div class="four wide field">
              <label>Complemento</label><input type="text" name="complemento" value="<?php echo utf8_encode($rs->complemento) ?>"/>
            </div>
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <label>Bairro</label><input type="text" name="bairro" value="<?php echo utf8_encode($rs->bairro) ?>"/>
          </div>
					<div class="field">
            <label>Cidade</label><input type="text" name="cidade" value="<?php echo utf8_encode($rs->cidade) ?>"/>
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <label>Estado (selecione novamente)</label>
            <select name="lista_estados">
              <option value="" >Selecione</option>
              <?php
              $consulta = $connect->query('SELECT sigla, descricao_est FROM estados');
              while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $id = $linha['sigla'];
                $descricao_est = $linha['descricao_est']; ?>
                <option value=<?php echo "$id"?> <?=($descricao_est == $id)?'selected':''?> ><?php echo utf8_encode($descricao_est); ?></option>
                <?php 
              } 
              ?>
            </select>
          </div>
  				<div class="field">
  					<label>Logo</label><input type="file" name="logo"/> </div>
  				</div>
  			</div>
  			<div class="field">
  				<label>Descrição</label><textarea type="text" rows="2" type="text" name="descricao"><?php echo utf8_encode($rs->descricao) ?></textarea>
        </div>
  			<div class="two fields">
  				<div class="field">
  					<label>Telefone</label><input type="text" name="telefone" onkeypress="$(this).mask('(00) 0000-0000')"  value="<?php echo $rs->telefone ?>"/>
          </div>
  				<div class="field">
            <label>Email</label><input type="email" name="email_empresa" value="<?php echo $rs->email_empresa ?>"/>
          </div>
				</div>
<<<<<<< HEAD
        <div class="field">
      <label>Serviços Prestados (selecione novamente)</label>
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
=======
        <div class="two fields">
					<div class="field">
            <label>Serviços Prestados</label>                				
            <?php
            $stmt = $connect->prepare("SELECT id_especializacao, descricao_esp FROM especializacao");      
            ?>
            <select multiple name="especializacao[]" >
              <!-- <select name='especializacao[]' multiple class="label ui selection fluid dropdown"> -->
              <?php 
              if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                  echo "<option value=\"".$rs->id_especializacao."\">".utf8_encode($rs->descricao_esp)."</option>";
                }
              }
              ?>
            </select>
          </div>
          <div class="field">
            <label>Eventos que Realiza</label>
            <?php $stmt = $connect->prepare("SELECT id_categoria, nome FROM categoria_evento"); ?>
            <select id='categoria' name='categoria[]' multiple>
              <!-- <select name='categoria[]' multiple class="label ui selection fluid dropdown"> -->
              <!-- https://codepen.io/danbrady/pen/VrjGEW -->
              <?php 
              if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {                
                  echo "<option value=\"".$rs->id_categoria."\">".utf8_encode($rs->nome)."</option>";
                }
              }
              ?>
            </select>
          </div>
        </div>
>>>>>>> c91ce4b662d37df96605bc6bdaf379daa4da4017
      </div>
      <input style="margin-bottom: 3%; float: right; margin-top: 3%;" type="submit" name='salvar' value="Salvar" class="ui button" style="float: right;">
      <div style="float: right; margin-top: 3%;" onClick="window.history.back();" class="ui cancel button">Cancelar</div>		
    </form>
  <?php
  } 
}
?>

<!--INICIO BLOCO SALVAR Empresa -->
<?php 
if (isset($_REQUEST['acao']) && $_REQUEST['acao'] == 'salvar'  && $_REQUEST['id'] != '' && !isset($errMsg) ) {
  $errMsg = '';

  $id_empresa = $_REQUEST['id'];
  $cnpj = $_POST['cnpj'];
  $nome = $_POST['nome'];
  $rua = $_POST['rua'];
  $numero = $_POST['numero'];
  $complemento = $_POST['complemento'];
  $bairro = $_POST['bairro'];
  $cidade = $_POST['cidade'];
  $sigla = $_POST['lista_estados'];
  $logo = $_FILES['logo'];
  $descricao = $_POST['descricao'];
  $telefone = $_POST['telefone'];
  $email_empresa = $_POST['email_empresa'];
    
  $target_dir = "imagens/";
  $target_file = $target_dir . basename($_FILES["logo"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if($cnpj == '')
    $errMsg = 'Insira o cnpj!';
  if($nome == '')
    $errMsg = 'Insira o nome!';
  if($rua == '')
    $errMsg = 'Insira a rua!';
  if($numero == '')
    $errMsg = 'Insira o numero!';
  if($complemento == '')
    $errMsg = 'Insira o complemento!';
  if($bairro == '')
    $errMsg = 'Insira o bairro!';
  if($cidade == '')
    $errMsg = 'Insira a cidade!';
  if($sigla == '')
    $errMsg = 'Insira o estado!';
  if($descricao == '')
    $errMsg = 'Insira a descricao!';
  if($telefone == '')
    $errMsg = 'Insira o telefone!';
  if($email_empresa == '')
    $errMsg = 'Insira o email da empresa';

  if($_POST["especializacao"] == '' or !is_array($_POST["especializacao"])) {
    $especializacoes = $_POST["especializacao"];
    $errMsg = 'Insira a especialização!';
  }
    
  if($_POST["categoria"] == '' or !is_array($_POST["categoria"])) {
    $categorias = $_POST["categoria"];
    $errMsg = 'Insira os eventos que realiza!';
  }

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
        echo "Arquivo ". basename( $_FILES["logo"]["name"]). " foi inserido.";
      }else{
        echo "Erro no Upload!";
      }
      // move_uploaded_file($logo["tmp_name"], $caminho_imagem);
    }
  }

  if($errMsg == '' && ValidaCNPJ($cnpj)==false && ValidaTelefone($telefone)==false){
    $stmt = $connect->prepare("UPDATE empresa SET  cnpj=:cnpj, nome=:nome, rua=:rua, numero=:numero, complemento=:complemento, bairro=:bairro, cidade=:cidade, sigla=:lista_estados, foto_perfil=:foto, descricao=:descricao,telefone=:telefone, email_empresa=:email_empresa WHERE id_empresa=:id");
    $stmt->execute(array(
      ':id' => $_REQUEST['id'],
      ':cnpj' => $cnpj,
      ':nome' => $nome,
      ':rua' => $rua, 
      ':numero' => $numero,
      ':complemento' => $complemento,
      ':bairro' => $bairro,
      ':cidade' =>  $cidade,
      ':lista_estados' => $sigla,
      ':foto' => $_FILES["logo"]["name"],
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
        
    try {
      $stmt = $connect->prepare("DELETE FROM emp_categ WHERE id_empresa=:id");
      $stmt->execute(array(
        ':id' => $_REQUEST['id'],
      ));
    }catch (PDOException $erro) {
      echo "Erro: ".$erro->getMessage();
    }

    $lista_especializacao = $_POST['especializacao'];

    foreach ($lista_especializacao as $especializacoes) {
      $stmt = $connect->prepare('INSERT INTO emp_esp (id_empresa, id_especializacao) VALUES (:id,:id_especializacao)');
      $stmt->execute(array(
        ':id' => $_REQUEST['id'],
        ':id_especializacao' => $especializacoes
      ));
    }

    $lista_categoria = $_POST['categoria'];
    
    foreach ($lista_categoria as $categorias) {
      $stmt = $connect->prepare('INSERT INTO emp_categ (id_empresa, id_categoria) VALUES (:id, :id_categoria)');
      $stmt->execute(array(
        ':id' => $_REQUEST['id'],
        ':id_categoria' => $categorias
      ));
    }

    echo "<script type=\"text/javascript\">alert('Alterado com sucesso!');</script>";
    header("Refresh: 0; url=perfil_empresa.php?ver=view&id=$id_empresa");

    exit();

  }else{
    if(isset($errMsg)){
      echo "<script type=\"text/javascript\">alert('".$errMsg."');</script>";
      header("Refresh: 0; url=edita_perfil.php?edita=empresa&id=$id_empresa");
    }
  }
}
?>
<!--FIM BLOCO SALVAR Empresa -->