<?php


include_once('db_connection.php');

$id = $_GET['id'];

$sqlDel = "DELETE FROM usuario WHERE id = $id";

$resultDel = $conexao->query($sqlDel);

$conexao->close();

header('Location: ../sistema/admUsuario.php');