<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset>
            <form action="alterar_login.php" method="">
                <legend><h3>ALTERAR LOGIN</h3></legend>
                <input id="codigo" name="codigo" type="hidden" value=<?php echo $_REQUEST['codigo'] ?>>
                <label for="usuario"> Usuário: </label><br>
                <input id="usuario" name="usuario" type="text" value=<?php echo $_REQUEST['usuario'] ?>><br>
                <label for="senha"> Senha: </label><br>
                <input id="senha" name="senha" type="text" value=<?php echo $_REQUEST['senha'] ?>><br>
                <label for="lembrete"> Lembrete: </label><br>
                <input id="lembrete" name="lembrete" type="text" size="50" value=<?php echo $_REQUEST['lembrete'] ?>><br>
                <br>
                <input type="submit" value="Alterar">
            </form>
        </fieldset>
    </body>
</html>
