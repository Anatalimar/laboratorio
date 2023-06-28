<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login de Usuário</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="../gec/paginas/custom.css">
</head>
<body style="background-color:cornflowerblue; background-image:none;">
	<div class="conteiner-fluid" id="cabecalho">
		<header class="row" id="header">
			<div id="logo-container"><img src="#" alt="" id="logo"></div>
		</header>
	</div>
	<div class="container" id="main">
		<div class="row align-items-center justify-content-center" id="caixa-login">
			<div class="mb-4">
				<img src="imagens/usuario.png" class="rounded mx-auto d-block"  height="128" width="128"/>
			</div>
				<form method="post" action="validacao/autenticacao.php">
					<div class="mb-4">
						<label for="usuario" class="form-label">Usuário</label>
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Informe nome de usuário" required>
					</div>
					<div class="mb-4">
						<label for="senha" class="form-label">Senha</label>
						<input type="password" id="senha" class="form-control" name="senha" placeholder="Digite sua senha" required>
					</div>
					<center><button type="submit" class="btn btn-primary" id="btn-entrar"> ENTRAR </button></center>
				</form>
		</div>
	</div>
	<div class="container-fluid" id="rodape">
    	<p align="center"><strong>SECRETARIA DE ESTADO DE EDUCAÇÃO - SEDUC</strong><br>
        	    Rua Waldomiro Lustoza, 250 - Japiim II - Cep: 69076-830 - Manaus - Amazonas<br>
            	Copyright 2023 © Secretaria de Estado de Educação do Amazonas - Todos os direitos reservados.
	</div>
</body>
</html>
