<?php
  
  require 'config.php';
  include("cabecalho.php");

  $stmt = $connect->query('SELECT id_categoria, nome, descricao, foto1, foto2, foto3, foto4 FROM categoria_evento WHERE id_categoria="'.$_GET['id'].'"');
  while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id_categoria = $linha['id_categoria']; 
    $nome = $linha['nome'];
    $descricao = $linha['descricao'];
    $foto1 = $linha['foto1'];
    $foto2 = $linha['foto2'];
    $foto3 = $linha['foto3'];
    $foto4 = $linha['foto4'];
  }

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
    .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
    .fa-anchor,.fa-coffee {font-size:200px}
  </style>
</head>
<body style="background: #f1f8f9;">
<center>

  <h1 class="titulo_evento" style="margin-top: 2%; "><?php echo utf8_encode($nome);?></h1>

<div id="sol" class="carousel slide" data-ride="carousel" style= "width:60%">
  <ol class="carousel-indicators">

<?php 
      
      $fotos1 = explode('.', $foto1);
      $fotos2 = explode('.', $foto2);
      $fotos3 = explode('.', $foto3);
      $fotos4 = explode('.', $foto4); 
?>

    <li data-target="#<?php echo $fotos1[0]; ?>" data-slide-to="0" class="active"></li>
    <li data-target="#<?php echo $fotos2[0]; ?>" data-slide-to="1"></li>
    <li data-target="#<?php echo $fotos3[0]; ?>" data-slide-to="2"></li>
    <li data-target="#<?php echo $fotos4[0]; ?>" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner" >
    <div class="carousel-item active" >
      <img class="d-block w-100" src="imagens/<?php echo $foto1; ?>" alt="First slide" >
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="imagens/<?php echo $foto2; ?>" alt="Second slide">
    </div>
    <div class="carousel-item" >
      <img class="d-block w-100" src="imagens/<?php echo $foto3; ?>" alt="Third slide" >
    </div>
     <div class="carousel-item" >
      <img class="d-block w-100" src="imagens/<?php echo $foto4; ?>" alt="Fourth slide" >
    </div>
  </div>
  <a class="carousel-control-prev" href="#sol" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#sol" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<form action="" method="post" name="busca_esp">
<div class="inline field" style="width: 20%;float: left;margin-left: 20%;margin-top: 2%">
      <label>O que você procura?</label>
<?php
          $stmt = $connect->prepare("SELECT id_especializacao, descricao_esp FROM especializacao");      
      ?>
      <select name="especializacao" class="label ui selection fluid dropdown"> 
      <!--<select name="especializacao">-->
        <?php 
        if ($stmt->execute()) {
          while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) {                
            echo "<option value=\"".$linha->id_especializacao."\">".utf8_encode($linha->descricao_esp)."</option>";
          }
        }
        ?>
      <input type="submit" name="envia" value="Buscar" class="btn btn-secondary">
      </select>
</div>
</form>

<div>
  <h4 class="texto_evento" style="margin-top: 2%;   margin-bottom: 10%;"><?php echo utf8_encode($descricao);?></h4>
</div>


<form action="" method="post" name="busca_est" style="width: 10%;float: left; margin-left: 20%;">
<div class="inline field" style="margin-left: 15%;margin-top: 8%">
      <label>Filtrar por Estado</label>
<?php
          $stmt = $connect->prepare("SELECT sigla, descricao_est FROM estados");      
      ?>
      <select name="estado" class="label ui selection fluid dropdown"> 
      <!--<select name="estado" style="width: 8%;margin-left: 15%">-->
        <?php 
        if ($stmt->execute()) {
          while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) {                
            echo "<option value=\"".$linha->sigla."\">".utf8_encode($linha->descricao_est)."</option>";
          }
        }
        ?>
      </select>
      <input type="submit" name="filtrar" value="Filtrar" class="btn btn-secondary">
</div>

</form>



<?php 
//Consulta filtro especializacao
if (isset($_POST['envia'])) {
 
  $especializacao = $_POST['especializacao'];
  
  $consulta = $connect->query('SELECT id_empresa, id_especializacao FROM emp_esp WHERE id_especializacao="'.$especializacao.'"');
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_emp[] = $linha['id_empresa']; 
    $id_especializacao = $linha['id_especializacao']; 
    
    }
  
      if (!empty($id_emp)) {
          foreach ($id_emp as $value) {
              try{
                $consulta = $connect->query('SELECT nome, foto_perfil,  telefone, email_empresa, cidade, sigla FROM empresa WHERE id_empresa="'.$value.'"');
                  if ($consulta->execute(array(':id_empresa' => $value))) {
                    while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
                      
                      <div style="margin-top: 5%;float: left;">
                            <div class="ui move reveal" style="margin-left: 10%;">
                                  <div class="visible content">
                                    <img src="imagens/<?php echo $linha->foto_perfil?>" class="ui medium image">
                                  </div>
                                  <div class="hidden content">
                                  <?php echo '<a href="perfil_empresa.php?id='.$value.'">';?>
                                    <p style="background-color: #90bdce91;height: 151px;font-size: large">
                                    <?php echo utf8_encode($linha->nome)."<br><br>".$linha->telefone."<br>".utf8_encode($linha->email_empresa)."<br>".utf8_encode($linha->cidade)." - ".$linha->sigla;?>        
                                    </p> 
                                      <?php echo '</a>';?>
                                  </div>                      
                            </div>
                      </div>     
                      
                <?php

                    }
                  }
              }catch (PDOException $erro) {
                echo "Erro: ".$erro->getMessage();
              }
          }
      }else{
        echo "<script>alert('Nenhuma empresa foi encontrada com esta especialização!')</script>";
      }
}


if (isset($_POST['filtrar'])) {
//Consulta filtro estado
  $estado = $_POST['estado'];
  
  $consulta = $connect->query('SELECT sigla FROM estados WHERE sigla="'.$estado.'"');
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $id_est[] = $linha['sigla']; 
      
    }
  
    
          foreach ($id_est as $value) {
                try{
                  $consulta = $connect->query('SELECT nome, foto_perfil,  telefone, email_empresa, cidade, sigla FROM empresa WHERE sigla="'.$value.'"');
                    if ($consulta->execute(array(':id_empresa' => $value))) {
                      while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {?>
                        <div style="margin-top: 5%;float: left;">
                              <div class="ui move reveal" style="margin-left: 10%;">
                                    <div class="visible content">
                                      <img src="imagens/<?php echo $linha->foto_perfil?>" class="ui medium image">
                                    </div>
                                    <div class="hidden content">
                                    <?php echo '<a href="perfil_empresa.php?id='.$value.'">';?>
                                      <p style="background-color: #90bdce91;height: 151px;font-size: large">
                                      <?php echo utf8_encode($linha->nome)."<br><br>".$linha->telefone."<br>".utf8_encode($linha->email_empresa)."<br>".utf8_encode($linha->cidade)." - ".$linha->sigla;?>        
                                      </p> 
                                        <?php echo '</a>';?>
                                    </div>                      
                              </div>
                        </div>     
                        
                  <?php
                        if (!isset($linha)) {
                            echo "<script>alert('Nenhuma empresa foi encontrada com este estado!')</script>";
                        }  
                      }
                    }
                }catch (PDOException $erro) {
                  echo "Erro: ".$erro->getMessage();
                }
          }
}

  

include 'rodape.php';
?>