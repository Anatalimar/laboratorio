<?php

include_once('../validacao/conexao.php');

$opcao = @$_REQUEST['opcao'];

function msg($texto)
{
    $msg = "<div class='container mt-4'><div class='alert alert-info' role='alert'></div></div>";
}





switch($opcao){
    case 1:
        $nusuario = $_REQUEST['usuario'];
        $nsenha = $_REQUEST['senha'];
        $nemail = $_REQUEST['uemail'];
        $nacesso = $_REQUEST['nivel_acesso'];

        $sql = "select * from usuario where usu_nome = $nusuario";
        $qry = executar($sql);
        
        if(!mysqli_affected_rows($qry))
            return false;
        else
        {
            while($linha = mysqli_fetch_array($qry))
        {
            $dados[] = $linha;
        }
    }

        $resultado = mysqli_fetch_row()


}

?>