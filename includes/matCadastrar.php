<?php
// Conexão com o banco de dados
include_once("../includes/db_connection.php");

// Obter os dados do formulário
$material = $_POST['material'];
$valor = $_POST['valor'];
$observacao = $_POST['observacao'];
$valor = $_POST['valor'];

// Inserir os dados do fornecedor na tabela "Fornecedores"
$sql = "INSERT INTO material (ds_material, ds_observacao, vl_material, dt_cadastro, dt_atualizacao) VALUES ('$material','$observacao','$valor',NOW(),NULL)";

$result = $conexao->query($sql);

// Fechar a conexão com o banco de dados
$conexao->close();

header("Location: ../materiais/material.php");