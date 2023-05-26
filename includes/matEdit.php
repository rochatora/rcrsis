<?php

include_once("db_connection.php");

if (isset($_POST['update'])) {

    // Obter os dados do formulário
    $id         = $_POST['id'];
    $material   = $_POST['material'];
    $observacao = $_POST['observacao'];
    $valor      = $_POST['valor'];

    $sqlUpdate  = "UPDATE material SET ds_material = '$material', ds_observacao = '$observacao', vl_material = '$valor', dt_atualizacao = NOW() WHERE id = '$id'";

    $result     = $conexao->query($sqlUpdate);
}

header("Location: ../materiais/material.php");
