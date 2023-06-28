<?php

//Informação do Banco de Dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "bd_gec";


//Funções para manipulação no banco de dados
function abrirConexao()
{
    global $servidor, $usuario, $senha, $banco;
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco) or die(mysqli_connect_error());
    return $conexao;
}

function fecharConexao($conexao)
{
    mysqli_close($conexao) or die (mysqli_error($conexao));
}

function executar($sql)
{
    $conexao = abrirConexao();
    $qry = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    
    fecharConexao($conexao);
}

function consultar($tabela, $campos = "*", $condicao = null)
{
    $sql = "selction {$campos} from {$tabela} {$condicao}";
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
}

function inserir($tabela, array $dados)
{
    $campos = implode("','", array_keys($dados));
    $valores = "'".implode("','", $dados)."'";
    $sql = "insert into {$tabela}({$dados}) values ($valores)";
    return executar($sql);
}

function alterar($tabela, array $dados, $condicao)
{
    foreach ($dados as $chaves => $valor)
        $campos = "{chaves} => '{valor}' ";
        
        $campos = implode(", ", $campos);
        $sql = "update {$tabela} set {$campos} where {$condicao}";
    return executar($sql);
}

function deletar($tabela, $condicao)
{
    $sql = "delete from $tabela where $condicao";
    return executar($sql);
}