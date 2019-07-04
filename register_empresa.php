<?php
  
  require 'config.php';
  include("cabecalho.php");

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $logo = $_POST['logo'];
    $descricao = $_POST['descricao'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    if($cnpj == '')
      $errMsg = 'Insira seu cnpj';
    if($nome == '')
      $errMsg = 'Insira seu nome';
     if($rua == '')
      $errMsg = 'Insira sua rua';
     if($numero == '')
      $errMsg = 'Insira o número do estabelecimento';
    if($complemento == '')
      $errMsg = 'Insira o complemento';
    if($bairro == '')
      $errMsg = 'Insira o bairro';
    if($cidade == '')
      $errMsg = 'Insira a cidade';
    if($estado == '')
      $errMsg = 'Insira o estado';
    if($logo == '')
      $errMsg = 'Insira sua logomarca';
    if($descricao == '')
      $errMsg = 'Insira a descricao';
    if($telefone == '')
      $errMsg = 'Insira seu telefone';
    if($email == '')
      $errMsg = 'Insira seu email';
    if($errMsg == ''){
      try {
        $stmt = $connect->prepare('INSERT INTO fornecedor (cnpj, nome, rua, numero, complemento, bairro, cidade, estado, logo, descricao, telefone, email) VALUES (:cnpj, :nome, :rua, :numero, :complemento, :bairro, :cidade, :estado, :logo, :descricao, :telefone, :email)');
        $stmt->execute(array(
          ':cnpj' => $cnpj,
          ':nome' => $nome,
          ':rua' => $rua, 
          ':numero' => $numero,
          ':complemento' => $complemento,
          ':bairro' => $bairro,
          ':cidade' => $cidade,
          ':estado' => $estado,
          ':logo' => $logo,
          ':descricao' => $descricao,
          ':telefone' => $telefone,
          ':email' => $email
        ));
        header('Location: register_empresa.php?action=joined');
        exit;
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registrado com sucesso!<br><br>';
  }
?>

<br>
<br>
<br>
<br>

<div class="centraliza_img">
  <h1 style="margin-top: 0.5%">Cadastro de Empresa</h1>
</div>

<!--<div class="ui form login">

      Parte do Prof -->
      <?php
        if(isset($errMsg)){
          echo '<div style="color:green;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>

  <form class="ui form" style="max-width:65%; margin-left: 18%; margin-top: 1%">
  <div class="field"> 
    <div class="two fields">
      <div class="field">
        <label>CNPJ</label>
        <input type="text" name="cnpj" placeholder="00.000.000/0000-00">
      </div>
      <div class="field">
      <label>Nome</label>
        <input type="text" name="nome" placeholder="Celebrate Festas e Eventos">
      </div>
    </div>
  </div>
  <div class="field">
    <div class="fields">
      <div class="twelve wide field">
      <label>Rua</label>
        <input type="text" name="rua" placeholder="Juscelino Kubitschek">
      </div>
      <div class="four wide field">
        <label>Número</label>
        <input type="text" name="numero" placeholder="198">
      </div>
      <div class="four wide field">
        <label>Complemento</label>
        <input type="text" name="complemento" placeholder="Apartamento 4987">
      </div>
    </div>
  </div>
  <div class="two fields">
    <div class="field">
      <label>Bairro</label>
       <input type="text" name="bairro" placeholder="Bucarein">
    </div>
    <div class="field">
      <label>Cidade</label>
        <input type="text" name="cidade" placeholder="Joinville">
    </div>
  </div>
  <div class="two fields">
      <div class="field">
        <label>Estado</label>
        <input type="text" name="estado" placeholder="SC">
      </div>
      <div class="field">
      <label>Logo</label>
        <input type="file" name="logo">
      </div>
      </div>
    </div>
  <div class="field">
    <label>Descrição</label>
    <textarea rows="1" placeholder="Estamos no mercado desde 1998!"></textarea>
  </div>
  <div class="two fields">
      <div class="field">
        <label>Telefone</label>
        <input type="text" name="telefone" placeholder="(47)99841-6593">
      </div>
      <div class="field">
      <label>E-mail</label>
        <input type="text" name="email" placeholder="celebrate.festas@gmail.com">
      </div>
  </div>

  <!---  <div class="ui form field">
    <label>Qual sua especialização?</label>

<select class="ui fluid search dropdown" multiple="">
  <option value="">Barbearia</option>
  <option value="AL">Alabama</option>
  <option value="AK">Alaska</option>
  <option value="AZ">Arizona</option>
  <option value="AR">Arkansas</option>
  <option value="CA">California</option>
  <option value="CO">Colorado</option>
  <option value="CT">Connecticut</option>
  <option value="DE">Delaware</option>
  <option value="DC">District Of Columbia</option>
  <option value="FL">Florida</option>
  <option value="GA">Georgia</option>
  <option value="HI">Hawaii</option>
  <option value="ID">Idaho</option>
  <option value="IL">Illinois</option>
  <option value="IN">Indiana</option>
  <option value="IA">Iowa</option>
  <option value="KS">Kansas</option>
  <option value="KY">Kentucky</option>
  <option value="LA">Louisiana</option>
  <option value="ME">Maine</option>
  <option value="MD">Maryland</option>
  <option value="MA">Massachusetts</option>
  <option value="MI">Michigan</option>
  <option value="MN">Minnesota</option>
  <option value="MS">Mississippi</option>
  <option value="MO">Missouri</option>
  <option value="MT">Montana</option>
  <option value="NE">Nebraska</option>
  <option value="NV">Nevada</option>
  <option value="NH">New Hampshire</option>
  <option value="NJ">New Jersey</option>
  <option value="NM">New Mexico</option>
  <option value="NY">New York</option>
  <option value="NC">North Carolina</option>
  <option value="ND">North Dakota</option>
  <option value="OH">Ohio</option>
  <option value="OK">Oklahoma</option>
  <option value="OR">Oregon</option>
  <option value="PA">Pennsylvania</option>
  <option value="RI">Rhode Island</option>
  <option value="SC">South Carolina</option>
  <option value="SD">South Dakota</option>
  <option value="TN">Tennessee</option>
  <option value="TX">Texas</option>
  <option value="UT">Utah</option>
  <option value="VT">Vermont</option>
  <option value="VA">Virginia</option>
  <option value="WA">Washington</option>
  <option value="WV">West Virginia</option>
  <option value="WI">Wisconsin</option>
  <option value="WY">Wyoming</option>
</select>
</div>--->

  <div class="ui form field">
    <label>Qual sua especialização?</label>

  <div class="inline fields">
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Animação</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Barbearia</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Brinquedos</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Buffet</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Cerimonialista</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>CIA Viagem</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Confeitaria</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Convite</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Decoração</label>
      </div>
    </div>
  </div>

    <div class="inline fields">
      <div class="field">
        <div class="ui checkbox">
          <input type="checkbox" name="frequency">
        <label>Filmagem</label>
        </div>
      </div>
      <div class="field">
        <div class="ui checkbox">
          <input type="checkbox" name="frequency">
          <label>Floricultura</label>
        </div>
      </div>
      <div class="field">
        <div class="ui checkbox">
          <input type="checkbox" name="frequency">
          <label>Fotografia</label>
        </div>
      </div> 
      <div class="field">
        <div class="ui checkbox">
          <input type="checkbox" name="frequency">
          <label>Garçom</label>
        </div>
      </div>
      <div class="field">
        <div class="ui checkbox">
          <input type="checkbox" name="frequency">
          <label>Lembranças</label>
        </div>
      </div>
      <div class="field">
        <div class="ui checkbox">
          <input type="checkbox" name="frequency">
          <label>Locação de Carro</label>
        </div>
      </div>
      <div class="field">
        <div class="ui checkbox">
          <input type="checkbox" name="frequency">
          <label>Locação e Compra de Trajes</label>
        </div>
      </div>
      <div class="field">
        <div class="ui checkbox">
          <input type="checkbox" name="frequency">
          <label>Locação do Local</label>
        </div>
      </div>
    </div>

  <div class="inline fields">
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Música</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Recepção</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Relojoaria</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Salão de Beleza</label>
      </div>
    </div>
    <div class="field">
      <div class="ui checkbox">
        <input type="checkbox" name="frequency">
        <label>Segurança</label>
      </div>
    </div>
  </div>

    <div style="float: right;" class="ui button" tabindex="0">Cadastrar</div>
</form>
<!--</div>
