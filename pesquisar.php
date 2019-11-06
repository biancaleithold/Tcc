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

        $find = 0;
   
        $pesquisa = $connect->prepare('SELECT id_empresa, nome, cidade FROM empresa  WHERE nome LIKE :pesquisar');
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST["pesquisar"].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetchAll();
        ?>
        <?php  if (!empty($resultado_pesquisa)) { 
          $find = 1;
          ?>
        <table class="ui orange table" style="width:40%; float:left; margin-left: 6%;">
          <thead>
            <tr>
              <th>Empresa e sua localização</th>
            </tr>
          </thead>
          <?php } ?>
          <tbody>
        <?php
        foreach ($resultado_pesquisa as $key => $item ) {
        ?>
         
            <tr>
              <td> <?php echo '<a href="perfil_empresa.php?id='.$item['id_empresa'].'">'.utf8_encode($item['nome'])." - ".utf8_encode($item['cidade']); ?></a></td>
            </tr>
            <?php } ?>
          </tbody>

        </table>

        <?php
      }
    ?>
    <?php
      if(isset($_POST['pesquisar'])) {
   
        $pesquisa = $connect->prepare('SELECT id_empresa, cidade, nome FROM empresa  WHERE cidade LIKE :pesquisar');
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST["pesquisar"].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetchAll();
        ?>
        <?php  if (!empty($resultado_pesquisa)) { 
          $find = 1;
          ?>
        <table class="ui orange table" style="width:40%;float:left; margin-left: 6%;">
          <thead>
            <tr>
              <th>Cidades Empresas</th>
            </tr>
          </thead>
          <?php } ?>
          <tbody>
        <?php
        foreach ($resultado_pesquisa as $key => $item ) {
        ?>
         
            <tr>
              <td> <?php echo '<a href="perfil_empresa.php?id='.$item['id_empresa'].'">'.utf8_encode($item['cidade'])." - ".utf8_encode($item['nome']); ?></a></td>
            </tr>

            <?php } ?>

          </tbody>

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
        <?php  if (!empty($resultado_pesquisa)) { 
          $find = 1;
          ?>
         <table class="ui orange table" style="width:40%; float:left; margin-left: 6%;">
            <thead>
                <tr>
                <th>Categoria Evento</th>
                </tr>
                
            </thead>
            <?php } ?>
            <tbody>
            <?php
        foreach ($resultado_pesquisa as $key => $item ) {
        ?>
           
                <tr>
                <td> <?php echo '<a href="eventos.php?id='.$item['id_categoria'].'">'.utf8_encode($item['nome']); ?></a></td>
                     
                </tr>
                <?php } ?>
            </tbody>
           
        </table>

        <?php 
        
        
    }
  ?>
    <?php
      if(isset($_POST['pesquisar'])) {
   
        $pesquisa = $connect->prepare('SELECT id_categoria, descricao, nome FROM categoria_evento  WHERE descricao LIKE :pesquisar');
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST['pesquisar'].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetchAll();
        ?>
        <?php  if (!empty($resultado_pesquisa)) { 
          $find = 1;
          ?>
         <table class="ui orange table" style="width:40%; float:right; margin-right: 6%;">
            <thead>
                <tr>
                <th>Descrição Categoria</th>
                </tr>
                
            </thead>
        <?php }?>
        
        <tbody>
            <?php
        foreach ($resultado_pesquisa as $key => $item ) {
        ?>
                <tr>

                <td> <?php echo '<a href="eventos.php?id='.$item['id_categoria'].'">'.utf8_encode($item['descricao']);?></a></td>
                  </tr>

               <?php } ?>

            </tbody>

        </table>

        <?php 

}
            if ($find == 0) {
              echo "<script>alert('Resultado não encontrado!')</script>";
              header ("Refresh: 0; url=index.php");
            }
  ?>
 