<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table width="1000" border="0" cellspacing="1" align="center">
            <tr>
                <td width="70"><a href="novoLogin.php" target="parent"><img src="imagens/adicionar.png" title="Novo Cadastro"></a></td>
                <td width="70"><a href="javascript:window.history.go(-1)"><img width="64" height="64" src="imagens/voltar.png" title="Voltar"></a></td>
                <td><form action="lista_login.php">
                        <input name="filtro" type="text" size="30">
                        <input type="submit" value="Pesquisar">
                    </form>
                </td>
                
            </tr>
        </table>
        <br>
        <table width="1000" border="1" cellspacing="2" align="center">
            <tr>
                <td colspan="6"><div align="center"><h2><strong>LISTA DE LOGIN</strong></h2></div></td>
            </tr>
            <tr>
                <td align="center"><a href="lista_login.php?ordem=codigo">CÓDIGO</a></td>
                <td align="center"><a href="lista_login.php?ordem=usuario">USUÁRIO</a></td>
                <td align="center"><a href="lista_login.php?ordem=senha">SENHA</a></td>
                <td align="center"><a href="lista_login.php?ordem=lembrete">LEMBRETE</a></td>
                <td colspan="2" align="center">AÇÕES</td>
            </tr>
            
            <?php
           
            if(@$_REQUEST['ordem'] == '')
                $ordem = "codigo";
            else
                $ordem = $_REQUEST['ordem'];
            
            if(@$_REQUEST['filtro'] == '')
                $filtro = "";
            else
                $filtro = $_REQUEST['filtro'];
            
            require 'conexao.php';
            $sql_select = "select * from login where usuario LIKE '$filtro%' order by $ordem";
            $resultado = mysqli_query($conecta, $sql_select);
            $numero_registros = mysqli_num_rows($resultado);
            while($registro = mysqli_fetch_array($resultado))
            {
            ?>
            <tr>
                <td align="center"><?php echo $registro['codigo'] ?></td>
                <td><?php echo $registro['usuario'] ?></td>
                <td><?php echo $registro['senha'] ?></td>
                <td><?php echo $registro['lembrete'] ?></td>
                <td align="center">
                    <img src="imagens/ferramenta-php.png" width="20" height="20"> <a href="alterar_usuario.php?codigo=<?php echo $registro['codigo']?>&usuario=<?php echo $registro['usuario']?>&senha=<?php echo $registro['senha']?>&lembrete=<?php echo $registro['lembrete']?>">Alterar
                    </a>
                </td>
                <td align="center"><img src="imagens/lixeira2.png" width="20" height="20"> <a href="alterar_usuario.php?codigo=<?php echo $registro['codigo']?>">Excluir</td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="6"><div align="center"><strong>Número de Registro: <?php echo $numero_registros; ?></strong></div></td>
            </tr>
        </table>
        
    </body>
</html>
