<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset>
            <form action="alterar_contato.php" method="">
                <legend><h3>Formulario de Contato</h3></legend>
                <input id="codigo" name="codigo" type="hidden" value=<?php echo $_REQUEST['codigo'] ?>>
                <label for="nome"> Nome: </label><br>
                <input id="nome" name="nome" type="text" value=<?php echo $_REQUEST['nome'] ?>><br>
                <label for="sobrenome"> Sobrenome: </label><br>
                <input id="sobrenome" name="sobrenome" type="text" value=<?php echo $_REQUEST['sobrenome'] ?>><br>
                <label for="endereco"> Endereço: </label><br>
                <input id="endereco" name="endereco" type="text" size="50" value=<?php echo $_REQUEST['endereco'] ?>><br>
                <label for="telefone"> Telefone: </label><br>
                <input id="telefone" name="telefone" type="text" value=<?php echo $_REQUEST['telefone'] ?>><br>
                <label for="celular"> Celular: </label><br>
                <input id="celular" name="celular" type="celular" value=<?php echo $_REQUEST['celular'] ?>><br>
                <label for="email"> E-mail: </label><br>
                <input id="email" name="email" type="text" size="50" value=<?php echo $_REQUEST['email'] ?>><br>
                <label for="observacao"> Observação: </label><br>
                <textarea id="observacao" name="observacao" size="80"></textarea><br><br>
                <input type="submit" value="Alterar">
            </form>
        </fieldset>
    </body>
</html>
