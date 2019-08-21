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
       
        // echo $_POST['pesquisar'];

        //$resul_info = "SELECT * FROM categoria_evento WHERE nome LIKE '%$pesquisar%' ";
        $pesquisa = $connect->prepare('SELECT nome, descricao FROM categoria_evento  WHERE nome LIKE :pesquisar');
        $pesquisa = $connect->prepare('SELECT nome FROM empresa  WHERE nome LIKE :pesquisar');
        $pesquisa = $connect->prepare('SELECT nome_evento, descricao FROM eventos  WHERE nome_evento LIKE :pesquisar');
        $pesquisa->execute(array(
          ':pesquisar' => '%'.$_POST['pesquisar'].'%'
        ));
        $resultado_pesquisa = $pesquisa->fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado_pesquisa);
       
        foreach ($resultado_pesquisa as $key => $item) {?>
          
         <table class="ui orange table" style="width:20%; float:left;">
            <thead>
                <tr>
                    <th><?php echo utf8_encode($key);?><a href="eventos.php"></a></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                     <td><?php echo utf8_encode($item); ?></td>
                     
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