<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'conexao.php';

$sql_alterar = "update contato set nome = '".$_REQUEST['nome'].
        "', sobrenome='".$_REQUEST['sobrenome'].
        "', endereco='".$_REQUEST['endereco'].
        "', telefone='".$_REQUEST['telefone'].
        "', celular='".$_REQUEST['celular'].
        "', email='".$_REQUEST['email']."' where codigo=".$_REQUEST['codigo'];

$resultado = mysqli_query($conecta, $sql_alterar);
if(!$resultado)
    echo erros_conexao(mysqli_errno());
else
    header("Location: lista_contato.php");
?>
