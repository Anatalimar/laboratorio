<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GEC - Menu Principal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        .bg-custon{
            background: #0277BD;
        }
        .gradient-custom {
        /* fallback for old browsers */
        background: #014974;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(1, 40, 63, 1), rgba(37, 117, 252, 1))
        }
        .shadow-custom {
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .25), 0 3px 10px 5px rgba(0, 0, 0, 0.05) !important;
        }
	</style>

	<link rel="stylesheet" href="custom.css">

</head>

<body class="gradient-custom">
    <div class="conteiner-fluid" id="cabecalho">
        <header class="row" id="header">
            <div id="logo-container justify-content-center">
                <div class="row">
                    <div class="col-2" id="logo"><img src="../imagens/logo_am.png" height="80px" width="55px"></div>
                    <div class="col text-white" id="titulo_pagina">SECRETARIA DE EDUCAÇÃO E DESPORTO ESCOLAR</div>
                </div>
            </div>
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
                            case '2': include_once('novo_servidor.php'); break;
                            case '3': include_once('checar_registro.html'); break;
                            case '4': include_once('novo_setor.html'); break;
                            case '5': include_once('nova_unidade.html'); break;
                            case '6': include_once('nova_cautela.html'); break;
                            case '7': include_once('novo_equipamento.html'); break;
                            case '8': include_once('novo_chip.html'); break;
                            case '9': header('Location: index.php'); break;
                            default: include_once('tela_padrao.html'); break;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="rodape">
    <p align="center" style="color:white"><strong style="color:white">SECRETARIA DE EDUCAÇÃO E DESPORTO ESCOLAR - SEDUC</strong><br>
        	    Rua Waldomiro Lustoza, 250 - Japiim II - Cep: 69076-830 - Manaus - Amazonas<br>
            	Copyright 2023 © Secretaria de Estado de Educação do Amazonas - Todos os direitos reservados.
	</div>
</body>
</html>