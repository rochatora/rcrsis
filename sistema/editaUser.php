<?php

// Se o campo id do formulario (hidden) estiver preenchido (nao vazio)
if(!empty($_GET['id'])){
    // declara variavel id que recebe o valor do campo id via GET(URL)
    $id = $_GET['id']; 
    
    // conecta ao banco de dados
    include_once('../includes/db_connection.php');
    // declara variavel que recebe o select da tabela usuario condicionando o id (bd) e variavel id(form)
    $editSql = "SELECT * FROM usuario WHERE id = $id";

    $editResult = $conexao->query($editSql);

    // Depois de pegar o resultado da query, verificar se teve um retorno acima de 0zero (numero de linhas), ou seja, se há dado para retornar
    if($editResult->num_rows > 0){
        // realiza um loop (while) onde declara uma variavel para receber os valores resultantes da consulta ao banco associando (utilizando o mysqli)
        while($editData = mysqli_fetch_assoc($editResult)){
            // criar variaveis para receber os dados dos campos da tabela, estas variaveis serao adicionadas como value nos campos do form
            $usuario = $editData['ds_usuario'];
            $nome = $editData['ds_nome'];
            $email = $editData['ds_email'];
            $senha = $editData['ds_senha'];
        }
    }
    // } else {
    //     //caso nao tenha retorno de dados, o usuario sera redirecionado a pagina citada
    //     header('Location: admUsuario.php');
    // }   
}


?>

<!DOCTYPE html>
<html lang="PT-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>RCR System</title>
</head>

<body>
    <div class="container">
        <br><br>

        <div class="title">
            <h3>RCR System | Cadastro do Usuario</h3>
        </div>
        <br><br>

        <form action="../includes/userEdit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="usuario" class="col-form-label">Usuário</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario ?>" required>
            </div>
            <div class="form-group">
                <label for="nome" class="col-form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>" required>
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" >
            </div>
            <div class="form-group">
                <label for="senha" class="col-form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $senha ?>" >
            </div>
            <input type="submit" class="btn btn-primary" id="update" name="update" value="Atualizar">
            <a href="admUsuario.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button></a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>