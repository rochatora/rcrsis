<?php

// verificar se o button update foi acionado, se sim segue
if(isset($_POST['update'])){
    // conexao com o bd
    include_once('db_connection.php');
    // armazena os valores dos campos do form, nas variaveis $
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // armazena a query de update numa variavel $
    $upSql = "UPDATE usuario SET ds_usuario = '$usuario', ds_nome = '$nome', ds_email = '$email', ds_senha = '$senha', dt_atualizacao = NOW() WHERE id = $id";
    
    // result para realizacao da tarefa no banco
    $resultUp = $conexao->query($upSql);
    
    $conexao->close();
}

header('Location: ../sistema/admUsuario.php');