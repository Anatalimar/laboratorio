<?php

function importCSVtoDatabase($csvFilePath, $databaseHost, $databaseName, $databaseUser, $databasePassword, $tableName) {
    try {
        // Conexão com o banco de dados
        $dsn = "mysql:host=$databaseHost;dbname=$databaseName";
        $db = new PDO($dsn, $databaseUser, $databasePassword);

        // Configurações adicionais
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Abre o arquivo CSV para leitura
        $csvFile = fopen($csvFilePath, 'r');

        // Verifica se o arquivo foi aberto com sucesso
        if ($csvFile !== FALSE) {
            // Lê a primeira linha (cabeçalho) do arquivo CSV
            $header = fgetcsv($csvFile);

            // Prepara a consulta SQL para inserção dos dados
            $columns = implode(',', $header);
            $placeholders = rtrim(str_repeat('?,', count($header)), ',');
            $sql = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";

            // Prepara a declaração SQL
            $stmt = $db->prepare($sql);

            // Importa os dados do CSV para o banco de dados
            while (($row = fgetcsv($csvFile)) !== FALSE) {
                // Executa a declaração SQL para cada linha de dados
                $stmt->execute($row);
            }

            // Fecha o arquivo CSV
            fclose($csvFile);

            echo "Importação concluída com sucesso!";
        } else {
            echo "Erro ao abrir o arquivo CSV.";
        }
    } catch (PDOException $e) {
        echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
    }
}

// Exemplo de uso da função
$csvFilePath = "caminho/do/arquivo.csv";
$databaseHost = "localhost";
$databaseName = "nome_do_banco";
$databaseUser = "usuario";
$databasePassword = "senha";
$tableName = "nome_da_tabela";

importCSVtoDatabase($csvFilePath, $databaseHost, $databaseName, $databaseUser, $databasePassword, $tableName);

?>
