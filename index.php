<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login de Usuário</title>
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
	<link rel="stylesheet" href="paginas/custom.css">
</head>

<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-custon text-white shadow-custom" style="border-radius: 1rem;"> <!-- Implementação da cor de fundo (bg-custom) e sombra (shadow-custom) na divisão -->
          <div class="card-body p-5 text-center">

            <div class="mb-md-1 mt-md-4 pb-5">
			  <form action="validacao/autenticacao.php"> <!-- Valição dos dados do usuário -->
              <img class="mb-4" src="imagens/gesi.png"/>
              <p class="text-white-50 mb-4">Por favor insira seu login e senha!</p>

              <div class="form-outline form-white mb-4">
                <input type="text" name=usuario id="usuario" placeholder="Usuário" class="form-control form-control-lg" required />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name=senha id="senha" placeholder="Senha" class="form-control form-control-lg" required />
              </div>

              <p class="small mb-4 pb-lg-2"><a class="text-white-50" href="#!">Esqueci minha senha?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
			  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

	<div class="container-fluid" id="rodape">
    	<p align="center" style="color:white"><strong style="color:white">SECRETARIA DE EDUCAÇÃO E DESPORTO ESCOLAR - SEDUC</strong><br>
        	    Rua Waldomiro Lustoza, 250 - Japiim II - Cep: 69076-830 - Manaus - Amazonas<br>
            	Copyright 2023 © Secretaria de Estado de Educação do Amazonas - Todos os direitos reservados.
	</div>
</body>
</html>
