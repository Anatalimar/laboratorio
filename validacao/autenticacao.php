<?php

require_once '../validacao/conexao.php';

$status = false;
$msg = "";
$num = 0;
$sql = "Select * from usuario";


$resultado = mysqli_query(abrirConexao(), $sql);
while($registro = mysqli_fetch_array($resultado))
    {
    if(($_REQUEST['usuario'] == $registro['usu_nome']) &&($registro['usu_senha'] == $_REQUEST['senha']) ){
        $status = true;
        $num = 1;
    }
    }
    if($status){
        $msg = "Bem Vindo ".$_REQUEST['usuario'].", Você está Logado!"."<br>"."Redirecionamento em 3 segundos.";
    }
    else
    {
        $msg = "Desculpe, usuário ou senha invalidos."."<br>"."Redirecionamento em 3 segundos.";
    }

?>
<br><br><p align="center"><strong><?php echo $msg; redireciona($num); ?></strong></p>