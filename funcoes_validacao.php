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
    if ($cnpj == "00.000.000/0000-00" || $cnpj == "11.111.111/1111-11" || $cnpj == "22.222.222/2222-22" || $cnpj == "33.333.333/3333-33" || $cnpj == "44.444.444/4444-44" || $cnpj == "55.555.555/5555-55" || $cnpj == "66.666.666/6666-66" || $cnpj == "77.777.777/7777-77" || $cnpj == "88.888.888/8888-88" || $cnpj == "99.999.999/9999-99") {
        echo "<script>alert('CNPJ inválido!')</script>";
        $result = true;
     }else{
         $result = false;
     }
     return $result;
}

function ValidaTelefone($telefone){
    if ($telefone == "(00) 0000-0000 " || $telefone == "(11) 1111-1111" || $telefone == "(22) 2222-2222" || $telefone == "(33) 3333-3333" || $telefone == "(44) 4444-4444" || $telefone == "(55) 5555-5555" || $telefone == "(66) 6666-6666" || $telefone == "(77) 7777-7777" || $telefone == "(88) 8888-8888" || $telefone == "(99) 9999-9999") {
        echo "<script>alert('Número de telefone inválido!')</script>";
        $resposta = true;
     }else{
         $resposta = false;
     }
     return $resposta;
}

?>