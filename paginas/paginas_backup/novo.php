<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table width="150" border="0" cellspacing="1">
            <tr>
                <td width="70"><a href="novo.php" target="parent"><img src="imagens/adicionar.png" title="Novo Cadastro"></a></td>
                <td width="70"><a href="javascript:window.history.go(-1)"><img width="64" height="64" src="imagens/voltar.png" title="Voltar"></a></td>           
            </tr>
        </table>
        <fieldset>
            <form action="cadContato.php" method="">
                <legend><h3>Formulario de Contato</h3></legend>
                <label for="nome"> Nome: </label><br>
                <input id="nome" name="nome" type="text"><br>
                <label for="sobrenome"> Sobrenome: </label><br>
                <input id="sobrenome" name="sobrenome" type="text"><br>
                <label for="endereco"> Endereço: </label><br>
                <input id="endereco" name="endereco" type="text" size="50"><br>
                <label for="telefone"> Telefone: </label><br>
                <input id="telefone" name="telefone" type="text"><br>
                <label for="celular"> Celular: </label><br>
                <input id="celular" name="celular" type="text"><br>
                <label for="email"> Data de Nascimento: </label><br>
                <input id="nascimento" name="nascimento" type="text"><br>
                <label for="email"> E-mail: </label><br>
                <input id="email" name="email" type="text" size="50"><br>
                <label for="observacao"> Observação: </label><br>
                <textarea id="observacao" name="observacao" cols="51" rows="5"></textarea><br><br>
                <input type="submit" value="Cadastrar">
            </form>
        </fieldset>
    </body>
</html>
