<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'conexao.php';

$sql_inserir = "insert into contato(nome, sobrenome, endereco, 
    telefone, celular, email) values
    ('".$_REQUEST['nome']."','".$_REQUEST['sobrenome'].
        "','".$_REQUEST['endereco']."','".$_REQUEST['telefone'].
        "','".$_REQUEST['celular']."','".$_REQUEST['email']."')";

$res = mysqli_query($conecta, $sql_inserir);

        if(!$res)
            echo erros_conexao(mysqli_errno($conecta));
        else
            echo 'Dados gravados com sucesso.';
        header("Location: lista_contato.php");
?>