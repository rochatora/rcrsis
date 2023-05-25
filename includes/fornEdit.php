<?php

include_once("db_connection.php");

if (isset($_POST['update'])) {

    // Obter os dados do formulário
    $id         = $_POST['id'];
    $fornecedor = $_POST['fornecedor'];
    $endereco   = $_POST['endereco'];
    $contato    = $_POST['contato'];

    $sqlUpdate  = "UPDATE fornecedores SET nm_fornecedor = '$fornecedor', ds_endereco = '$endereco', nr_contato = '$contato', dt_atualizacao = NOW() WHERE id = '$id'";

    $result     = $conexao->query($sqlUpdate);
}

header("Location: ../fornecedores/fornecedor.php");
