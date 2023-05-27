<?php

include_once("db_connection.php");

$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuario (ds_usuario, ds_nome, ds_email, ds_senha, dt_cadastro, dt_atualizacao) VALUES ('$usuario','$nome','$email','$senha',NOW(),NULL)";

$result = $conexao->query($sql);

$conexao->close();

header('Location: ../sistema/admUsuario.php');