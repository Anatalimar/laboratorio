<?php

include_once('../validacao/conexao.php');

$opcao = @$_REQUEST['opcao'];

function msg($texto)
{
    $msg = "<div class='container mt-4'><div class='alert alert-info' role='alert'></div></div>";
}

function exibirJanela($mensagem) {
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

function exibirDialogo($mensagem) {
    echo "<script>
            // Chama a função de diálogo
            alert('" . $mensagem . "');
          </script>";
}


switch($opcao){
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
        while($registro = mysqli_fetch_array($resultado))
        {
            if(($nusuario == $registro['usu_nome'])){
                $status = true;
                $num = 0;
            }
        }
        if($status){
            exibirDialogo("Usuário já cadastrado no sistema.");
            redireciona(2);
        }
        else
        {
            $sql = "insert into usuario(usu_nome, usu_senha, usu_email, usu_nivel_acesso) values('$nusuario', '$nsenha', '$nemail', '$nacesso')";
            $exec = mysqli_query($conexao, $sql);
            exibirDialogo("Usuário cadastrado com sucesso no sistema.");
            redireciona(2);
        }
        fecharConexao($conexao); break;
    default: echo "nada de efeito."; break;

}
?>
