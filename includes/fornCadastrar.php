<?php
// Conexão com o banco de dados
include_once("../includes/db_connection.php");

// Obter os dados do formulário
$fornecedor = $_POST['fornecedor'];
$endereco = $_POST['endereco'];
$contato = $_POST['contato'];

// Inserir os dados do fornecedor na tabela "Fornecedores"
$sql = "INSERT INTO fornecedores (nm_fornecedor, ds_endereco, nr_contato, dt_cadastro, dt_atualizacao) VALUES ('$fornecedor','$endereco','$contato',NOW(),NULL)";

$result = $conexao->query($sql);

// Verificar se o cadastro foi realizado com sucesso
if ($result) {
    echo "Fornecedor cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o fornecedor: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conexao->close();