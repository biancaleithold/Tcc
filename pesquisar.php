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
   
        $pesquisa = $connect->prepare('SELECT id_empresa, nome, cidade FROM empresa  WHERE nome LIKE :pesquisar');
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST["pesquisar"].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetchAll();
        ?>
        <table class="ui orange table" style="width:30%; float:none;">
          <thead>
            <tr>
              <th>Empresas</th>
            </tr>
          </thead>
         
        <?php
        foreach ($resultado_pesquisa as $key => $item ) {
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
      if(isset($_POST['pesquisar'])) {
   
        $pesquisa = $connect->prepare('SELECT id_empresa, nome, cidade FROM empresa  WHERE cidade LIKE :pesquisar');
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST["pesquisar"].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetchAll();
        ?>
        <table class="ui orange table" style="width:30%; float:none;">
          <thead>
            <tr>
              <th>Empresas</th>
            </tr>
          </thead>
         
        <?php
        foreach ($resultado_pesquisa as $key => $item ) {
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
      if(isset($_POST['pesquisar'])) {
   
        $pesquisa = $connect->prepare('SELECT id_categoria, nome, descricao FROM categoria_evento  WHERE nome LIKE :pesquisar');
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST['pesquisar'].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetchAll();
        ?>
         <table class="ui orange table" style="width:30%; float:left; margin-left: 10%;">
            <thead>
                <tr>
                <th>Categoria Evento</th>
                </tr>
                
            </thead>
            <?php
        foreach ($resultado_pesquisa as $key => $item ) {
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
      if(isset($_POST['pesquisar'])) {
   
        $pesquisa = $connect->prepare('SELECT descricao, nome FROM categoria_evento  WHERE descricao LIKE :pesquisar');
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST['pesquisar'].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetchAll();
        ?>
          
         <table class="ui orange table" style="width:30%; float:left; margin-left: 10%;">
            <thead>
                <tr>
                <th>Descrição Categoria</th>
                </tr>
                
            </thead>
            <?php
        foreach ($resultado_pesquisa as $key => $item ) {
        ?>
            <tbody>
                <tr>
                <td> <?php echo '<a href="eventos.php?id='.$item['id_categoria'].'">'.utf8_encode($item['descricao']); ?></a></td>
                     
                </tr>
            </tbody>

        </table>

        <?php 
        
      }
    }
  ?>
 


<?php
include 'rodape.php';
?>