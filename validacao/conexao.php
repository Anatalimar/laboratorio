<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "db_gesi";


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
    $sql = "select {$campos} from {$tabela} {$condicao}";
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
        sleep(3);
        header("Refresh: 5, ../index.php");
    }
    elseif($resp == 1)
    {
        sleep(3);
        header("Refresh: 5, ../paginas/principal.php");
    }
    elseif($resp == 2)
    {
        sleep(3);
        header("Refresh: 5, ../paginas/principal.php?pagina=1");
    }
}

?>
