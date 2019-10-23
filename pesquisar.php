<?php
  
  require 'config.php';
  include("cabecalho.php");

  $stmt = $connect->query('SELECT id_categoria, nome, descricao FROM categoria_evento WHERE id_categoria=":id"');
  while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id_categoria = $rs['id_categoria']; 
    $nome = $rs['nome'];
    $descricao = $rs['descricao'];
  }

?>

<?php
      if(isset($_POST['pesquisar'])) {
   
        $pesquisa1 = $connect->prepare('SELECT id_empresa, nome, cidade FROM empresa  WHERE nome LIKE :pesquisar');
        $pesquisa1->execute(array(
          ':pesquisar' => '%'.$_POST["pesquisar"].'%'
        ));
        $resultado_pesquisa1 = $pesquisa1->fetchAll();
        ?>
        <?php  if (!empty($resultado_pesquisa1)) { ?>
           
        <table class="ui orange table" style="width:30%; float:left; margin-left: 10%;">
          <thead>
            <tr>
              <th>Empresas</th>
            </tr>
          </thead>
          <?php }elseif(isset($_POST['pesquisar'])) {
   
           $pesquisa2 = $connect->prepare('SELECT id_empresa, nome, cidade FROM empresa  WHERE cidade LIKE :pesquisar');
            $pesquisa2->execute(array(
     ':pesquisar' => '%'.$_POST["pesquisar"].'%'
   ));
   $resultado_pesquisa2 = $pesquisa2->fetchAll();
   ?>
   <?php  if (!empty($resultado_pesquisa2)) { ?>
   
   <table class="ui orange table" style="width:30%;float:left; margin-left: 10%;">
     <thead>
       <tr>
         <th>Empresas</th>
       </tr>
     </thead>
     <?php }elseif(isset($_POST['pesquisar'])) {

$pesquisa3 = $connect->prepare('SELECT id_categoria, nome, descricao FROM categoria_evento  WHERE nome LIKE :pesquisar');
$pesquisa3->execute(array(
':pesquisar' => '%'.$_POST['pesquisar'].'%'
));
$resultado_pesquisa3 = $pesquisa3->fetchAll();
?>
<?php  if (!empty($resultado_pesquisa3)) { ?>
<table class="ui orange table" style="width:30%; float:left; margin-left: 10%;">
  <thead>
      <tr>
      <th>Categoria Evento</th>
      </tr>
      
  </thead>
  <?php }elseif(isset($_POST['pesquisar'])) {


$pesquisa4 = $connect->prepare('SELECT id_categoria, descricao, nome FROM categoria_evento  WHERE descricao LIKE :pesquisar');
$pesquisa4->execute(array(
':pesquisar' => '%'.$_POST['pesquisar'].'%'
));
$resultado_pesquisa4 = $pesquisa4->fetchAll();
?>
<?php  if (!empty($resultado_pesquisa4)) { ?>
<table class="ui orange table" style="width:30%; float:right; margin-right: 20%;">
  <thead>
      <tr>
      <th>Descrição Categoria</th>
      </tr>
      
  </thead>
<?php } else{
  echo "<script>alert('Resultado não encontrado!')</script>";
}?>
  <?php
foreach ($resultado_pesquisa4 as $key => $item ) {
?>
  <tbody>
      <tr>

      <td> <?php echo '<a href="eventos.php?id='.$item['id_categoria'].'">'.utf8_encode($item['descricao']);?></a></td>
           
      </tr>
  </tbody>

</table>


<?php 
}
}
  ?>

  <?php
foreach ($resultado_pesquisa3 as $key => $item ) {
?>
  <tbody>
      <tr>
      <td> <?php echo '<a href="eventos.php?id='.$item['id_categoria'].'">'.utf8_encode($item['nome']); ?></a></td>
           
      </tr>
  </tbody>

</table>

<?php 
}
}
       ?>
  
   <?php
   foreach ($resultado_pesquisa2 as $key => $item ) {
   ?>
     <tbody>
       <tr>
         <td> <?php echo '<a href="perfil_empresa.php?id='.$item['id_empresa'].'">'.utf8_encode($item['cidade']); ?></a></td>
       </tr>
     </tbody>

    <?php 
    
   } ?>
   </table>

   <?php
 }
          
          ?>
        <?php
        foreach ($resultado_pesquisa1 as $key => $item ) {
        ?>
 
          <tbody>
            <tr>
              <td> <?php echo '<a href="perfil_empresa.php?id='.$item['id_empresa'].'">'.utf8_encode($item['nome']); ?></a></td>
            </tr>
          </tbody>

         <?php 
        
        } ?>
        </table>
      
        <?php
      }
      
    ?>
   
   <?php
          ///if  ($resultado_pesquisa != $pesquisa){ echo "<script>alert('Resultado nao encontrado')</script>"; }?> 
