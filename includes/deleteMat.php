<?php

if (!empty($_GET['id'])) {

    include_once("db_connection.php");

    $id = $_GET['id'];

    $sql = "SELECT * FROM material WHERE id = $id";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $sql_delete = "DELETE FROM material WHERE id = $id";
        $result_delete = $conexao->query($sql_delete);
    }
}
header("Location: ../materiais/materiais.php");