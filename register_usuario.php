<?php
	  
  require 'config.php';
  include("cabecalho.php");

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Recupera os dados dos campos
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $foto_perfil = $_FILES["foto_perfil"];
    $cpf = $_POST['cpf'];  
    $target_dir = "imagens/";
    $target_file = $target_dir . basename($_FILES["foto_perfil"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  
  
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
          echo "The file ". basename( $_FILES["foto_perfil"]["name"]). " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
        // move_uploaded_file($foto_perfil["tmp_name"], $caminho_imagem);
    
        // Insere os dados no banco
        $comando = $connect->prepare('INSERT INTO usuario (nome, email, telefone, senha, foto_perfil, cpf) VALUES (:nome, :email, :telefone, :senha, :nome_imagem, :cpf)');
        $comando->execute(array(
          ':nome' => $nome,
          ':email' => $email,
          ':telefone' => $telefone,
          ':senha' => $senha,
          ':nome_imagem' => $_FILES["foto_perfil"]["name"],
          ':cpf' => $cpf
        ));
        header('Location: login.php?action=joined');
        exit;
      }
  
      if(isset($_GET['action']) && $_GET['action'] == 'joined') {
        $errMsg = 'Registrado com sucesso!<br><br>';
      }
      

      // Se houver mensagens de erro
      if (count($error) != 0) {
        foreach ($error as $erro) {
          echo "<br><br><br><br><br>";
          echo "outro locall";
          echo $erro . "<br />";
        }
      }
    }
  }
?>

<br>
<br>
<br>
<br>

<div class="centraliza_img">
  <h1 style="margin-top: 3%">Cadastro de Usuário</h1>
</div>

<div class="ui form login">

      <!-- Parte do Prof -->
      <?php
        if(isset($errMsg)){
          echo '<div style="color:green;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="field">

      <label>Nome Completo</label>
      <input type="text" name="nome" placeholder="Celebrate Festas e Eventos" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'] ?>" autocomplete="off" class="box"/><br /><br />

      <label>Email</label>
      <input type="Email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" placeholder="celebrate@festas.com" /><br /><br>      

      <label>Telefone</label>
      <input type="tel" name="telefone" value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone'] ?>" placeholder="(00) 00000-0000" /><br /><br>

      <label>Senha</label>
      <input type="password" name="senha" value="<?php if(isset($_POST['senha'])) echo $_POST['senha'] ?>" placeholder="********" /><br /><br>

      <label>Foto Perfil</label>
      <input type="file" name="foto_perfil" id="foto_perfil"><br /><br>

      <label>CPF</label>
      <input type="text" name="cpf" value="<?php if(isset($_POST['cpf'])) echo $_POST['cpf'] ?>"  placeholder="000.000.000-00" /><br /><br>

    </div>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>  


<!--https://www.youtube.com/watch?v=0BzYNHQx35g-->
