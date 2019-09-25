<?php
  
  require 'config.php';
  include("cabecalho.php");

  $stmt = $connect->query('SELECT id_categoria, nome, descricao FROM categoria_evento WHERE id_categoria=":id"');
  while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id_categoria = $rs['id_categoria']; 
    $nome = $rs['nome'];
    $descricao = $rs['descricao'];
  }
  $stmt = $connect->query('SELECT id_empresa, nome, descricao FROM empresa WHERE id_empresa=":id"');
  while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id_categoria = $rs['id_empresa']; 
    $nome = $rs['nome'];
    $descricao = $rs['descricao'];
  }
?>

<?php
      if(isset($_POST['pesquisar'])) {
   
        $pesquisa = $connect->prepare('SELECT nome, cidade FROM empresa  WHERE nome LIKE :pesquisar' );
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST['pesquisar'].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado_pesquisa);
       
        foreach ($resultado_pesquisa as $key => $item) {?>
          
         <table class="ui orange table" style="width:30%; float:none;">
            <thead>
                <tr>
                    <th><?php echo utf8_encode($key);?></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                <td> <a href="eventos.php?acao=&id=id_empresa"><?php echo utf8_encode($item); ?></a></td>
                     
                </tr>
            </tbody>

        </table>

         <?php 
        
        }
      }
    ?>
    <?php
      if(isset($_POST['pesquisar'])) {
   
        $pesquisa = $connect->prepare('SELECT cidade, nome FROM empresa  WHERE cidade LIKE :pesquisar' );
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST['pesquisar'].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado_pesquisa);
       
        foreach ($resultado_pesquisa as $key => $item) {?>
          
         <table class="ui orange table" style="width:30%; float:none;">
            <thead>
                <tr>
                    <th><?php echo utf8_encode($key);?></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                <td> <a href="eventos.php"><?php echo utf8_encode($item); ?></a></td>
                     
                </tr>
            </tbody>

        </table>

         <?php 
        
        }
      }
    ?>
    
    <?php
    if(isset($_POST['pesquisar'])) {
       
       $pesquisa = $connect->prepare('SELECT nome_evento, descricao FROM eventos  WHERE nome_evento LIKE :pesquisar');
       $pesquisa->execute(array(
         ':pesquisar' => '%'.$_POST['pesquisar'].'%'
       ));
        $resultado_pesquisa = $pesquisa->fetch(PDO::FETCH_ASSOC);
         var_dump($resultado_pesquisa);
       
        foreach ($resultado_pesquisa as $key => $item) {?>
          
         <table class="ui orange table" style="width:30%; float:left; margin-left: 10%;" >
            <thead>
    
                <tr>
                    <th ><?php echo utf8_encode($key);?> </th>
                   
                </tr>
              
            </thead>
  
            <tbody>
                <tr>
                     <td> <a href="eventos.php"><?php echo utf8_encode($item); ?></a></td>
                    
                </tr>
               
            </tbody>

        </table>

         <?php 
        
        }
      }
    ?>
    <?php
    if(isset($_POST['pesquisar'])) {
       
       $pesquisa = $connect->prepare('SELECT descricao, nome_evento FROM eventos  WHERE descricao LIKE :pesquisar');
       $pesquisa->execute(array(
         ':pesquisar' => '%'.$_POST['pesquisar'].'%'
       ));
        $resultado_pesquisa = $pesquisa->fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado_pesquisa);
       
        foreach ($resultado_pesquisa as $key => $item) {?>
          
         <table class="ui orange table" style="width:30%; float:left;  margin-left: 10%;">
            <thead>
                <tr>
                    <th><?php echo utf8_encode($key);?></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                <td> <a href="eventos.php"><?php echo utf8_encode($item); ?></a></td>
                     
                </tr>
            </tbody>

        </table>

         <?php 
        
        }
      }
    ?>
    
    <?php
      if(isset($_POST['pesquisar'])) {
   
        $pesquisa = $connect->prepare('SELECT nome, descricao FROM categoria_evento  WHERE nome LIKE :pesquisar');
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST['pesquisar'].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado_pesquisa);
       
        foreach ($resultado_pesquisa as $key => $item) {?>
          
         <table class="ui orange table" style="width:30%; float:left; margin-left: 10%;">
            <thead>
                <tr>
                    <th><?php echo utf8_encode($key);?></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                <td> <a href="eventos.php"><?php echo utf8_encode($item); ?></a></td>
                     
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
        $resultado_pesquisa = $pesquisa->fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado_pesquisa);
       
        foreach ($resultado_pesquisa as $key => $item) {?>
          
         <table class="ui orange table" style="width:30%; float:left; margin-left: 10%;">
            <thead>
                <tr>
                    <th><?php echo utf8_encode($key);?></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                <td> <a href="eventos.php"><?php echo utf8_encode($item); ?></a></td>
                     
                </tr>
            </tbody>

        </table>

         <?php 
        
        }
      }
    ?>
  </div>
  </div>


<?php
include 'rodape.php';
?>