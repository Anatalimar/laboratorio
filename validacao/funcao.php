<?php

function erros_conexao($erro_numero){
    $msg_erro = "";
    switch ($erro_numero) {
        case 1050: $msg_erro = "Usuário ou senha invalido.";break;
        case 2005: $msg_erro = "Host invalido.";break;
        case 2002: $msg_erro = "Servidor invalido";break;
        case 1045: $msg_erro = "Usuário ou senha invalido.";break;
        case 1049: $msg_erro = "Banco de dados invalido.";break;
        default : $msg_erro = "Erro não identificado.";break;
    }
    return $msg_erro;
}
function redireciona($resp){
    if($resp == 0)
    {
        sleep(5);
        header("Refresh: 5, paginas/principal.php");
    }
    else
    {
        sleep(5);
        header("Refresh: 5, index.php");
    }
}
?>
