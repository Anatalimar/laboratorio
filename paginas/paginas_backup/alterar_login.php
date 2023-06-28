<?php

require 'conexao.php';

$sql_alterar = "update login set usuario = '".$_REQUEST['usuario'].
        "', senha='".$_REQUEST['senha'].
        "', lembrete='".$_REQUEST['lembrete']."' where codigo=".$_REQUEST['codigo'];

$resultado = mysqli_query($conecta, $sql_alterar);
if(!$resultado)
    echo erros_conexao(mysqli_errno());
else
    header("Location: lista_login.php");
?>
