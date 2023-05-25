<?php

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    include_once("../includes/db_connection.php");

    // Consultar os Fornecedores
    $edit_sql = "SELECT * FROM fornecedores WHERE id = '$id' ORDER BY id";

    $edit_result = $conexao->query($edit_sql);

    if ($edit_result->num_rows > 0) {
        while ($edit_data = mysqli_fetch_assoc($edit_result)) {
            $fornecedor = $edit_data['nm_fornecedor'];
            $endereco = $edit_data['ds_endereco'];
            $contato = $edit_data['nr_contato'];
        }
    } else {
        header("Location: fornecedor.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

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
            <h3>RCR System | Cadastro do Fornecedor</h3>
        </div>
        <br><br>

    <form action="../includes/fornEdit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="form-group">
            <label for="fornecedor" class="col-form-label">Fornecedor</label>
            <input type="text" class="form-control" id="fornecedor" name="fornecedor" value="<?php echo $fornecedor ?>" required>
        </div>
        <div class="form-group">
            <label for="endereco" class="col-form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $endereco ?>" required>
        </div>
        <div class="form-group">
            <label for="contato" class="col-form-label">Contato</label>
            <input type="text" class="form-control" id="contato" name="contato" value="<?php echo $contato ?>" required>
        </div>
        <input type="submit" class="btn btn-primary" id="update" name="update" value="Atualizar">
        <a href="fornecedor.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button></a>
    </form>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>