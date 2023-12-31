<?php

include_once('../validacao/conexao.php');

$opcao = @$_REQUEST['opcao'];


function msg($texto)
{
    $msg = "<div class='container mt-4'><div class='alert alert-info' role='alert'></div></div>";
}


function exibirJanela($mensagem)
{
    echo "<script>
            function showModal(message) {
                var modal = document.createElement('div');
                modal.classList.add('modal');

                var content = document.createElement('div');
                content.classList.add('modal-content');
                content.innerText = message;

                // Adiciona o conteúdo à janela modal
                modal.appendChild(content);

                // Adiciona a janela modal ao corpo do documento
                document.body.appendChild(modal);
            }

            // Chama a função para exibir a janela modal
            showModal('" . $mensagem . "');
        </script>";
}

function carregarSelecao($conexao, $tabela, $valorColuna, $textoColuna)
{
    // Consulta SQL para recuperar os dados da tabela
    $consulta = "SELECT $valorColuna, $textoColuna FROM $tabela order by und_descricao";

    // Executar a consulta no banco de dados
    $resultado = mysqli_query($conexao, $consulta);

    // Verificar se a consulta retornou resultados
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Loop através dos resultados e criar as opções do <select>
        while ($row = mysqli_fetch_assoc($resultado)) {
            $valor = $row[$valorColuna];
            $texto = $row[$textoColuna];
            echo "<option value=\"$valor\">$texto</option>";
        }
    } else {
        // Caso não haja resultados, exibir uma opção vazia
        echo "<option value=\"\">Nenhum resultado encontrado</option>";
    }

    // Liberar a memória ocupada pelo resultado da consulta
    mysqli_free_result($resultado);
}


function exibirDialogo($mensagem)
{
    echo "<script>
            // Chama a função de diálogo
            alert('" . $mensagem . "');
          </script>";
}

function consultaServidor($matricula){
    $status = false;
        $msg = "";
        $num = 1;
        $sql = "Select * from servidor";
        $conexao = abrirConexao();
        $resultado = mysqli_query($conexao, $sql);
        while ($registro = mysqli_fetch_array($resultado)) {
            if (($matricula == $registro['ser_matricula'])) {
                $status = true;
                $num = 0;
            }
        }
}


switch ($opcao) {
    /* TELA DE CADASTRO DE USUARIO */
    case 1:
        $nusuario = $_REQUEST['usuario'];
        $nsenha = $_REQUEST['senha'];
        $nemail = $_REQUEST['email'];
        $nacesso = $_REQUEST['nivel_acesso'];

        $status = false;
        $msg = "";
        $num = 1;
        $sql = "Select * from usuario";
        $conexao = abrirConexao();
        $resultado = mysqli_query($conexao, $sql);
        while ($registro = mysqli_fetch_array($resultado)) {
            if (($nusuario == $registro['usu_nome'])) {
                $status = true;
                $num = 0;
            }
        }
        if ($status) {
            exibirDialogo("Usuário já cadastrado no sistema.");
            redireciona(2);
        } else {
            $sql = "insert into usuario(usu_nome, usu_senha, usu_email, usu_nivel_acesso) values('$nusuario', '$nsenha', '$nemail', '$nacesso')";
            $exec = mysqli_query($conexao, $sql);
            exibirDialogo("Usuário cadastrado com sucesso no sistema.");
            redireciona(2);
        }
        fecharConexao($conexao);
        break;

    /* TELA DE CADASTRO DE SERVIDOR */
    case 2:
        $nmatricula = $_REQUEST['matricula'];
        $ncpf = $_REQUEST['cpf'];
        $nnome = $_REQUEST['nome'];
        $nfuncao = $_REQUEST['funcao'];
        $nlotacao = $_REQUEST['lotacao'];
        $nfone_pessoal = $_REQUEST['fone_pessoal'];
        $nfone_corp = $_REQUEST['fone_corp'];

        $status = false;
        $msg = "";
        $num = 1;
        $sql = "Select * from servidor";
        $conexao = abrirConexao();
        $resultado = mysqli_query($conexao, $sql);

        while ($registro = mysqli_fetch_array($resultado)) {
            exibirDialogo("$nmatricula <br> - ".$registro['ser_matricula']);
            
            if (($nmatricula == $registro['ser_matricula'])) {
                $status = true;
                $num = 0;
            }
        }
        
        if ($status) {
            exibirDialogo("Servidor já cadastrado no sistema.");
            redireciona(3);
        } else {
            $sql = "insert into servidor(ser_nome, ser_cpf, ser_matricula, ser_funcao, ser_unidade, ser_fone_contato, ser_fone_corp) values('$nnome', '$ncpf', '$nmatricula', '$nfuncao', '$nlotacao', '$nfone_pessoal', '$nfone_corp')";

            $exec = mysqli_query($conexao, $sql);
            exibirDialogo("Servidor cadastrado com sucesso no sistema.");
            redireciona(3);
        }
        fecharConexao($conexao);
        break;
    /* TELA DE CADASTRO DE UNIDADE */
    /* PRECISA MUDAR ISSO AQUI*/
    /* PRECISA MUDAR ISSO AQUI*/
    /* PRECISA MUDAR ISSO AQUI*/
    case 5:
        $ndescricao = $_REQUEST['descricao'];
        $nsigla = $_REQUEST['sigla'];
        $nmunicipio = $_REQUEST['municipio'];
        $ncoord = $_REQUEST['coord/sede'];
        $nstatus = $_REQUEST['status'];

        $status = false;
        $msg = "";
        $num = 1;
        $sql = "Select * from unidade";
        $conexao = abrirConexao();
        $resultado = mysqli_query($conexao, $sql);

        while ($registro = mysqli_fetch_array($resultado)) {
            exibirDialogo("$ndescricao <br> - ".$registro['und_descricao']);
            
            if (($ndescricao == $registro['und_descricao'])) { /* PRECISA MUDAR ISSO AQUI ---------------------------------------------------------------------------------- */
                $status = true;
                $num = 0;
            }
        }
        
        if ($status) {
            exibirDialogo("Unidade já cadastrada no sistema.");
            redireciona(3);
        } else {
            $sql = "insert into unidade(und_descricao, und_sigla, und_municipio, und_coord, und_status) values('$ndescricao', '$nsigla', '$nmunicipio', '$ncoord', '$nstatus')";

            $exec = mysqli_query($conexao, $sql);
            exibirDialogo("Unidade cadastrada com sucesso no sistema.");
            redireciona(3);
        }
        fecharConexao($conexao);
        break;
    default:
        echo "nada de efeito.";
        break;

}
?>