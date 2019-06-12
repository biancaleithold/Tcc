<?php
	
  /*  require 'config.php';
  include("cabecalho.php");

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $foto_perfil = $_FILES['foto_perfil'];
    $cpf = $_POST['cpf'];

    if($nome == '')
      $errMsg = 'Insira seu nome';
    if($email == '')
      $errMsg = 'Insira seu email';
    if($telefone == '')
      $errMsg = 'Insira seu telefone';
    if($senha == '')
      $errMsg = 'Insira sua senha';
    if($foto_perfil == '')
      $errMsg = 'Insira sua foto de perfil';
    if($cpf == '')
      $errMsg = 'Insira seu cpf';
    if($errMsg == ''){
      try {

        if($foto_perfil != NULL) { 
          $nomeFinal = time().'.jpg';
          if (move_uploaded_file($foto_perfil['tmp_name'], $nomeFinal)) {
            $tamanhoImg = filesize($nomeFinal); 
 
            $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
 
            mysql_connect($dbhost,$dbuser,$dbpass) or die("Impossível Conectar");

            unlink($nomeFinal);

        $stmt = $connect->prepare('INSERT INTO usuario (nome,  email, telefone, senha, foto_perfil, cpf) VALUES (:nome, :email, :telefone, :senha, $mysqlImg, :cpf)');
        $stmt->execute(array(
          ':nome' => $nome,
          ':email' => $email,
          ':telefone' => $telefone,
          ':senha' => $senha,
          '$mysqlImg' => $foto_perfil,
          ':cpf' => $cpf
        ));


        //ARRUMAR!! NÃO APARECE MENSAGEM REGISTRADO COM SUCESSO!
        //$host  = $_SERVER['HTTP_HOST'];
            //$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            //echo "<script type='text/javascript'>window.top.location='http://$host$uri/register_usuario.php';</script>";
            //exit;
        header('Location: register_usuario.php?action=joined');
        exit;
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registrado com sucesso! <br> Agora você pode logar. <br><br>';
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
      <input type="file" name="imagem" value="<?php if(isset($_FILES['imagem'])) echo $_FILES['imagem'] ?>" /><br /><br>

      <label>CPF</label>
      <input type="text" name="cpf" value="<?php if(isset($_POST['cpf'])) echo $_POST['cpf'] ?>"  placeholder="000.000.000-00" /><br /><br>

    </div>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>
*/


  
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
  
    // Se a foto estiver sido selecionada
    echo "<br><br><br><br><br>";
    echo $foto_perfil;
    echo "<br><br><br><br><br>";
    if (!empty($foto_perfil["name"])) {
      // Largura máxima em pixels
      $largura = 150;
      // Altura máxima em pixels
      $altura = 180;
      // Tamanho máximo do arquivo em bytes
      $tamanho = 1000;
 
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
 
        // Gera um nome único para a imagem
        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        // Caminho de onde ficará a imagem
        $caminho_imagem = "imagens/" . $nome_imagem;
 
        // Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($foto_perfil["tmp_name"], $caminho_imagem);
    
        // Insere os dados no banco
        $comando->prepare('INSERT INTO usuario (nome, email, telefone, senha, foto_perfil, cpf) VALUES (:nome, :email, :telefone, :senha, :nome_imagem, :cpf)');
        $comando->execute(array(
          ':nome' => $nome,
          ':email' => $email,
          ':telefone' => $telefone,
          ':senha' => $senha,
          ':nome_imagem' => $nome_imagem,
          ':cpf' => $cpf
        ));
        // $sql = mysql_query("INSERT INTO usuario VALUES ('', '".$nome."', '".$email."', '".$telefone."', '".$senha."', '".$nome_imagem."', '".$cpf."')");
    
        // Se os dados forem inseridos com sucesso
        //if ($sql){
        //  echo "Você foi cadastrado com sucesso.";
        //}
      }
  
      // Se houver mensagens de erro, exibe-as
      if (count($error) != 0) {
        foreach ($error as $erro) {
          echo $erro . "<br />";
        }
      }
    } else {
      echo "<br><br><br><br><br>OIOOIOIOIOIIO<br><br><br><br><br>";
    }
  }

/*    // Get data from FROM
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $foto_perfil = $_FILES['arquivo']['name'];
    $cpf = $_POST['cpf'];

    if($nome == '')
      $errMsg = 'Insira seu nome';
    if($email == '')
      $errMsg = 'Insira seu email';
    if($telefone == '')
      $errMsg = 'Insira seu telefone';
    if($senha == '')
      $errMsg = 'Insira sua senha';
    if($foto_perfil == '')
      $errMsg = 'Insira sua foto de perfil';
    if($cpf == '')
      $errMsg = 'Insira seu cpf';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO usuario (nome,  email, telefone, senha, foto_perfil, cpf) VALUES (:nome, :email, :telefone, :senha, :foto_perfil, :cpf)');
        $stmt->execute(array(
          ':nome' => $nome,
          ':email' => $email,
          ':telefone' => $telefone,
          ':senha' => $senha,
          ':foto_perfil' => $foto_perfil,
          ':cpf' => $cpf
        ));

  if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registrado com sucesso! <br> Agora você pode logar. <br><br>';
  }
*/
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

  <form action="" method="post">
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
      <input type="file" name="foto_perfil"><br /><br>

      <label>CPF</label>
      <input type="text" name="cpf" value="<?php if(isset($_POST['cpf'])) echo $_POST['cpf'] ?>"  placeholder="000.000.000-00" /><br /><br>

    </div>
    <input type="submit" name='register' class="ui button botao">
  </form>
</div>  