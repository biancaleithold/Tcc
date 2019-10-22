<?php
function ValidaCPF($cpf){
    if ($cpf == "000.000.000-00" || $cpf == "111.111.111-11" || $cpf == "222.222.222-22" || $cpf == "333.333.333-33" || $cpf == "444.444.444-44" || $cpf == "555.555.555-55" || $cpf == "666.666.666-66" || $cpf == "777.777.777-77" || $cpf == "888.888.888-88" || $cpf == "999.999.999-99") {
       echo "<script>alert('CPF inválido!')</script>";
       $resultado = true;
    }else{
        $resultado = false;
    }
    return $resultado;
}

function ValidaCNPJ($cnpj){
    if ($cnpj == "000.000.000-00" || $cnpj == "111.111.111-11" || $cnpj == "222.222.222-22" || $cnpj == "333.333.333-33" || $cnpj == "444.444.444-44" || $cnpj == "555.555.555-55" || $cnpj == "666.666.666-66" || $cnpj == "777.777.777-77" || $cnpj == "888.888.888-88" || $cnpj == "999.999.999-99") {
        echo "<script>alert('CNPJ inválido!')</script>";
        $result = true;
     }else{
         $result = false;
     }
     return $result;
}

function ValidaTelefone($telefone){
    if ($telefone == "000.000.000-00" || $telefone == "111.111.111-11" || $telefone == "222.222.222-22" || $telefone == "333.333.333-33" || $telefone == "444.444.444-44" || $telefone == "555.555.555-55" || $telefone == "666.666.666-66" || $telefone == "777.777.777-77" || $telefone == "888.888.888-88" || $telefone == "999.999.999-99") {
        echo "<script>alert('Número de telefone inválido!')</script>";
        $resposta = true;
     }else{
         $resposta = false;
     }
     return $resposta;
}

?>