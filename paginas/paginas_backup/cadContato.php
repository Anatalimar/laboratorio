<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'conexao.php';

$sql_inserir = "insert into login(usuario, senha, lembrete) values
    ('".$_REQUEST['usuario']."','".$_REQUEST['senha'].
        "','".$_REQUEST['lembrete']."')";

$res = mysqli_query($conecta, $sql_inserir);

        if(!$res)
            echo erros_conexao(mysqli_errno($conecta));
        else
            echo 'Dados gravados com sucesso.';
        header("Location: lista_login.php");
?>