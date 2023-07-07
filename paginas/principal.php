<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GEC - Menu Principal</title>

</head>

<body>
    <div class="conteiner-fluid" id="cabecalho">
        <header class="row" id="header">
            <div id="logo-container"><img src="#" alt="" id="logo"></div>
        </header>
    </div>
    <div class="conteiner-fluid" id="area-meio">
        <div class="row" id="painel">
                <div class="col-2 justify-content-center" id="painel1">
                    <div class="col" id="item-menu">
                        <img src="../imagens/novo_usuario.png" width="30" height="30">
                        <a href="principal.php?pagina=1">NOVO USUÁRIO</a>
                    </div>
                    <div class="col" id="item-menu">
                        <img src="../imagens/login.png" width="30" height="30">
                        <a href="principal.php?pagina=2">NOVO SERVIDOR</a>
                    </div>
                    <div class="col" id="item-menu">
                        <img src="../imagens/procurar.png" width="30" height="30">
                        <a href="principal.php?pagina=3">LOCALIZAR REGISTRO</a>
                    </div>
                    <div class="col" id="item-menu">
                        <img src="../imagens/login_lista.gif" width="30" height="30">
                        <a href="principal.php?pagina=4">NOVO SETOR</a>
                    </div>
                    <div class="col" id="item-menu">
                        <img src="../imagens/escola.png" width="30" height="30">
                        <a href="principal.php?pagina=5">NOVA UND ESCOLAR</a>
                    </div>
                    <div class="col" id="item-menu">
                        <img src="../imagens/material.png" width="30" height="30">
                        <a href="principal.php?pagina=6">NOVA CAUTELA</a>
                    </div>
                    <div class="col" id="item-menu">
                        <img src="../imagens/eqp_info.png" width="30" height="30">
                        <a href="principal.php?pagina=7">EQUIPAMENTO</a>
                    </div>
                    <div class="col" id="item-menu">
                        <img src="../imagens/eqp_info.png" width="30" height="30">
                        <a href="principal.php?pagina=8">CHIP CORPORATIVO</a>
                    </div>
                    <div class="col" id="item-menu">
                        <img src="../imagens/exit.png" width="30" height="30">
                        <a href="../index.php">SAIR DO SISTEMA</a>
                    </div> 
                </div>
                <div class="col" id="painel2">
                    <?php
                    $pag = @$_REQUEST['pagina'];
                    switch($pag){
                        case '1': include_once('novo_usuario.html'); break;
                        case '2': include_once('novo_servidor.html'); break;
                        case '3': include_once('checar_registro.html'); break;
                        case '4': include_once('novo_setor.html'); break;
                        case '5': include_once('nova_unidade.html'); break;
                        case '6': include_once('nova_cautela.html'); break;
                        case '7': include_once('novo_equipamento.html'); break;
                        case '8': include_once('novo_chip.html'); break;
                        case '9': header('Location: index.php'); exit;
                        default: include_once('tela_padrao.html'); break;
                    }
                    ?>


                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="rodape">
    	<p align="center"><strong>SECRETARIA DE ESTADO DE EDUCAÇÃO - SEDUC</strong><br>
        	    Rua Waldomiro Lustoza, 250 - Japiim II - Cep: 69076-830 - Manaus - Amazonas<br>
            	Copyright 2023 © Secretaria de Estado de Educação do Amazonas - Todos os direitos reservados.
	</div>
</body>
</html>