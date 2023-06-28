<?php

include_once('conexao.php');

$opcao = @$_REQUEST['opcao'];

function msg($texto)
{
    $msg = "<div class='container mt-4'><div class='alert alert-info' role='alert'>Cadastro realizado com sucesso.</div></div>"
}


switch($opcao){
    case 1:
        $nomep = $_REQUEST['aluno'];
        $resultado = consultar("usuario", "usu_nome", "where usu_nome = $nomep");
        if($resultado)
        {
            echo $texto;
            redireciona(0);
        }
        else
        {
            $texto = msg('Cadastro realizado com sucesso,')
        }


}

?>