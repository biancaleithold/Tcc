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
      // foreach ($foto as $value) {
      //   $partes_fotos[] = explode(',',$foto);
      //   echo '<br><br><br><br><br><br><br>';
      //   echo $partes_fotos;
      // }

/// SE NAO DER CERTO COM O FOREACH, DAR UM CAMPO PARA CADA FOTO!

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

<div class="inline field" style="width: 23%;float: left;margin-left: 20%;margin-top: 2%">
      <label>O que você procura?</label>
<?php
          $stmt = $connect->prepare("SELECT id_especializacao, descricao FROM especializacao");      
      ?>
      <!-- <select name="especializacao[]" class="label ui selection fluid dropdown"> -->
      <select name="especializacao">
        <?php 
        if ($stmt->execute()) {
          while ($linha = $stmt->fetch(PDO::FETCH_OBJ)) {                
            echo "<option value=\"".$linha->id_especializacao."\">".utf8_encode($linha->descricao)."</option>";
          }
        }
        ?>
      </select>
</div>

<div>
  <h4 class="texto_evento" style="margin-top: 2%;   margin-bottom: 10%;"><?php echo utf8_encode($descricao);?></h4>
</div>


<?php
include 'rodape.php';
?>