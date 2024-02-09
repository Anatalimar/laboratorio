<?php

// Configurações do banco de dados MySQL
$host = 'seu_host';
$usuario = 'seu_usuario';
$senha = 'sua_senha';
$banco = 'sua_base_de_dados';

// Conectar ao banco de dados MySQL
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Criar tabela se não existir
$sql = '
    CREATE TABLE IF NOT EXISTS clientes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255),
        telefone VARCHAR(20),
        email VARCHAR(255)
    )
';
$conn->query($sql);

function criarCliente($nome, $telefone, $email) {
    global $conn;
    $stmt = $conn->prepare('INSERT INTO clientes (nome, telefone, email) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $nome, $telefone, $email);
    $stmt->execute();
    echo "Cliente criado com sucesso!\n";
}

function listarClientes() {
    global $conn;
    $result = $conn->query('SELECT * FROM clientes');
    $clientes = $result->fetch_all(MYSQLI_ASSOC);
    if (empty($clientes)) {
        echo "Nenhum cliente encontrado.\n";
    } else {
        print_r($clientes);
    }
}

function atualizarCliente($clienteId, $novoNome, $novoTelefone, $novoEmail) {
    global $conn;
    $stmt = $conn->prepare('
        UPDATE clientes
        SET nome=?, telefone=?, email=?
        WHERE id=?
    ');
    $stmt->bind_param('sssi', $novoNome, $novoTelefone, $novoEmail, $clienteId);
    $stmt->execute();
    echo "Cliente atualizado com sucesso!\n";
}

function deletarCliente($clienteId) {
    global $conn;
    $stmt = $conn->prepare('DELETE FROM clientes WHERE id=?');
    $stmt->bind_param('i', $clienteId);
    $stmt->execute();
    echo "Cliente deletado com sucesso!\n";
}

// Exemplos de uso:
criarCliente("João Silva", "123456789", "joao@email.com");
criarCliente("Maria Oliveira", "987654321", "maria@email.com");

listarClientes();

atualizarCliente(1, "João da Silva", "111111111", "joao.silva@email.com");
listarClientes();

deletarCliente(2);
listarClientes();

// Fechar a conexão com o banco de dados
$conn->close();

?>
