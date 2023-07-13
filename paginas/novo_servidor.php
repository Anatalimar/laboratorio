<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Novo Servidor</title>

  <style>
    .Cabecalho {
    color: white;
    margin-left: 23px;
    }

    .mb-1 {
      margin-bottom: 2rem;
      margin-right: 10rem;
      width: 30%;
    }

    .mb-2 {
      margin-bottom: 2rem;
      margin-right: 10rem;
      width: 50%;
    }

    .form-label{
      color: aliceblue;
    }
  </style>


</head>
<body>
    <header><div><h2 class="Cabecalho">CADASTRO DE NOVO SERVIDOR</h2></div></header>
    <div class="container-fluid">
        <form id="form-cadastro" action="validacao.php">
          <input type="hidden" name="opcao" value="2" required>
          <div class="mb-3"></div>
          <div class="row justify-content align-items-center g-2">
            <div class="col-2">
              <label for="matricula" class="form-label">Matricula</label>
              <input type="text" class="form-control" id="matricula" name="matricula" placeholder="000000-A0" maxlength="7" required>  
            </div>
            <div class="col-3">
              <label for="cpf" class="form-label">CPF</label>
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="EX: 00011122233" maxlength="14" required>
            </div>
            <div class="col">
              <label for="nome" class="form-label">Nome Completo</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo do servidor" maxlength="45" required>
            </div>
          </div>
          <div class="mb-3"></div>
          <div class="row justify-content align-items-center g-2">
            <div class="col-3">
              <label for="funcao" class="form-label">Função</label>
              <select class="form-select" id="funcao" name="funcao" aria-label="funcao" required>
                <option disabled selected value>Selecione Função...</option>
                <option value="Agente Administrativo">Agente Administrativo</option>
                <option value="Analista de Dados Educacionais">Analista de Dados Educacionais</option>
                <option value="Assessor(a) de Comunicação">Assessor(a) de Comunicação</option>
                <option value="Auxiliar de Serviços Gerais">Auxiliar de Serviços Gerais</option>
                <option value="Bibliotecário(a) Escolar">Bibliotecário(a) Escolar</option>
                <option value="Coordenador(a)">Coordenador(a)</option>
                <option value="Diretor(a)">Diretor(a)</option>
                <option value="Gerente">Gerente</option>
                <option value="Inspetor(a) Escolar">Inspetor(a) Escolar</option>
                <option value="Monitor(a) de Alunos">Monitor(a) de Alunos</option>
                <option value="Nutricionista Escolar">Nutricionista Escolar</option>
                <option value="Orientador(a) Educacional">Orientador(a) Educacional</option>
                <option value="Pedagogo(a)">Pedagogo(a)</option>
                <option value="Professor(a)">Professor(a)</option>
                <option value="Psicólogo(a) Escolar">Psicólogo(a) Escolar</option>
                <option value="Secretário(a) de Educação">Secretário(a) de Educação</option>
                <option value="Supervisor(a)">Supervisor(a)</option>
              </select>
            </div>
            <div class="col">
              <label for="lotacao" class="form-label">Lotação</label>
              <select class="form-select" id="lotacao" name="lotacao" aria-label="lotacao" required>
                <option disabled selected value>Selecione Lotação...</option>
                <?php
                  require_once 'validacao.php';
                  $conexao = mysqli_connect("localhost", "root", "", "db_gesi");
                  carregarSelecao($conexao, "unidade", "und_codigo", "und_descricao");
                  fecharConexao($conexao);
                ?>
              </select>
            </div>
            <div class="col-3">
              <label for="fone_pessoal" class="form-label">Telefone Pessoal</label>
              <input type="tel" class="form-control" id="fone_pessoal" name="fone_pessoal" placeholder="EX: (XX) XXXXX-XXXX" maxlength="15" required oninput="this.value = formatarTelefone(this.value)">
            </div>
            <div class="col-3">
              <label for="fone_corp" class="form-label">Telefone Corporativo</label>
              <input type="tel" class="form-control" id="fone_corp" name="fone_corp" placeholder="EX: (XX) XXXXX-XXXX" maxlength="15" required oninput="this.value = formatarTelefone(this.value)">
            </div>
          </div>
          <div class="mb-3"></div>
          <div class="mb-2">
            <button type="submit" class="btn btn-primary" id="btn-salvar-servidor"> SALVAR </button>
          </div>
        </form>
      </div>

    <script>
        // Função para formatar CPF
        function formatarCPF(cpf) {
          cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos
          cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona ponto após os primeiros 3 números
          cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona ponto após os segundos 3 números
          cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona hífen após os últimos 2 números
          return cpf;
        }
      
        // Seleciona o campo de CPF
        var campoCPF = document.getElementById('cpf');
      
        // Adiciona o evento de input para formatar o CPF conforme o usuário digita
        campoCPF.addEventListener('input', function() {
          this.value = formatarCPF(this.value);
        });

        function formatarTelefone(telefone) {
  telefone = telefone.replace(/\D/g, ''); // Remove caracteres não numéricos
  telefone = telefone.replace(/(\d{2})(\d)/, '($1) $2'); // Adiciona parênteses e espaço após os primeiros 2 números
  telefone = telefone.replace(/(\d{4,5})(\d)/, '$1-$2'); // Adiciona hífen após os próximos 4 ou 5 números
  telefone = telefone.replace(/(\d{4})(\d{1,4})$/, '$1$2'); // Remove o hífen se o usuário apagou um caractere

  return telefone;
}

      </script>
      
       
</body>
</html>