<?php

function carregar_dados_csv($hostname, $username, $password, $nome_banco_dados, $nome_tabela, $nome_arquivo_csv) {
    // Conectar ao banco de dados
    $conexao = new mysqli($hostname, $username, $password, $nome_banco_dados);

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    // Criar a tabela se não existir
    $criar_tabela = "CREATE TABLE IF NOT EXISTS $nome_tabela (coluna1 VARCHAR(255), coluna2 INT, coluna3 FLOAT)";
    $conexao->query($criar_tabela);

    // Abrir o arquivo CSV
    $arquivo_csv = fopen($nome_arquivo_csv, 'r');

    // Ignorar o cabeçalho do arquivo CSV
    fgetcsv($arquivo_csv);

    // Inserir os dados na tabela
    while (($linha = fgetcsv($arquivo_csv, 1000, ',')) !== FALSE) {
        $coluna1 = $linha[0];
        $coluna2 = $linha[1];
        $coluna3 = $linha[2];
        $coluna4 = $linha[3];
        $coluna5 = $linha[4];
        $coluna6 = $linha[5];

        $inserir_dados = "INSERT INTO $nome_tabela (und_codigo, und_descricao, und_sigla, und_municipio, und_coord, und_status) VALUES ('$coluna1', '$coluna2', '$coluna3', '$coluna4', '$coluna5', '$coluna6')";
        echo $inserir_dados."  -   \n";
        $conexao->query($inserir_dados);
    }

    // Fechar o arquivo CSV e a conexão com o banco de dados
    fclose($arquivo_csv);
    $conexao->close();
}

carregar_dados_csv('localhost', 'root', '', 'db_gesi', 'unidade', 'arquivo.csv');

?>

