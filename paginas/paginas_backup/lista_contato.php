<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table width="1000" border="0" cellspacing="1" align="center">
            <tr>
                <td width="70"><a href="novo.php" target="parent"><img src="imagens/adicionar.png" title="Novo Cadastro"></a></td>
                <td width="70"><a href="javascript:window.history.go(-1)"><img width="64" height="64" src="imagens/voltar.png" title="Voltar"></a></td>
                <td><form action="lista_contato.php">
                        <input name="filtro" type="text" size="30">
                        <input type="submit" value="Pesquisar">
                    </form>
                </td>
                
            </tr>
        </table>
        <br>
        <table width="1000" border="1" cellspacing="2" align="center">
            <tr>
                <td colspan="10"><div align="center"><h3><strong>LISTA DE CONTATOS</strong></h3></div></td>
            </tr>
            <tr>
                <td align="center"><a href="lista_contato.php?ordem=codigo">CÓDIGO</a></td>
                <td align="center"><a href="lista_contato.php?ordem=nome">NOME</a></td>
                <td align="center"><a href="lista_contato.php?ordem=sobrenome">SOBRENOME</a></td>
                <td align="center"><a href="lista_contato.php?ordem=endereco">ENDEREÇO</a></td>
                <td align="center"><a href="lista_contato.php?ordem=telefone">TELEFONE</a></td>
                <td align="center"><a href="lista_contato.php?ordem=celular">CELULAR</a></td>
                <td align="center"><a href="lista_contato.php?ordem=nascimento">DATA NASCIMENTO</a></td>
                <td align="center"><a href="lista_contato.php?ordem=email">E-MAIL</a></td>
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
            $sql_select = "select * from contato where nome LIKE '$filtro%' order by $ordem";
            $resultado = mysqli_query($conecta, $sql_select);
            $numero_registros = mysqli_num_rows($resultado);
            while($registro = mysqli_fetch_array($resultado))
            {
            ?>
            <tr>
                <td align="center"><?php echo $registro['codigo'] ?></td>
                <td><?php echo $registro['nome'] ?></td>
                <td><?php echo $registro['sobrenome'] ?></td>
                <td><?php echo $registro['endereco'] ?></td>
                <td><?php echo $registro['telefone'] ?></td>
                <td><?php echo $registro['celular'] ?></td>
                <td><?php echo $registro['nascimento'] ?></td>
                <td><?php echo $registro['email'] ?></td>
                <td align="center">
                    <a href="alterar.php?codigo=<?php echo $registro['codigo']?>&nome=<?php echo $registro['nome']?>&sobrenome=<?php echo $registro['sobrenome']?>&endereco=<?php echo $registro['endereco']?>&telefone=<?php echo $registro['telefone']?>&celular=<?php echo $registro['celular']?>&email=<?php echo $registro['email']?>">Alterar
                    </a>
                </td>
                <td align="center">Excluir</td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="10"><div align="center"><strong>Número de Registro: <?php echo $numero_registros; ?></strong></div></td>
            </tr>
        </table>
        
    </body>
</html>
