<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <table width="150" border="0" cellspacing="1">
            <tr>
                <td width="70"><a href="novoLogin.php" target="parent"><img src="imagens/adicionar.png" title="Novo Cadastro"></a></td>
                <td width="70"><a href="javascript:window.history.go(-1)"><img width="64" height="64" src="imagens/voltar.png" title="Voltar"></a></td>           
            </tr>
        </table>
        <fieldset>
            <form action="cadLogin.php" method="">
                <legend><h3>FORMULÁRIO DE LOGIN</h3></legend>
                <label for="usuario"> Usuário: </la   bel><br>
                <input id="usuario" name="usuario" type="text"><br>
                <label for="senha"> Senha: </label><br>
                <input id="senha" name="senha" type="text"><br>
                <label for="lembrete"> Lembrete: </label><br>
                <input id="lembrete" name="lembrete" type="text" size="50"><br>
                <br>
                <input type="submit" value="Cadastrar">
            </form>
        </fieldset>
    </body>
</html>
