<?php
include_once("../includes/db_connection.php");

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
      <h3>RCR System | Registro de Movimentação de Estoque</h3>
    </div>
    <br><br>

    <form action="../includes/movEstoque.php" method="POST">
      <div class="form-group">
        <label for="material_id" class="col-form-label">Material</label>
        <select class="form-control" name="material_id" id="material_id" required>
          <option value="">Selecione ...</option>

          <?php
          // Consulta para obter os materiais cadastrados
          $sql = "SELECT id, ds_material FROM material";
          $result = $conexao->query($sql);

          // Preenche as opções do select com os materiais
          while ($data = $result->fetch_assoc()) {
            echo '<option value = "' . $data['id'] . '">' . $data['ds_material'] . '</option>';
          }

          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="fornecedor_id" class="col-form-label">Fornecedor</label>
        <select name="fornecedor_id" id="fornecedor_id" class="form-control">
          <option value="">Selecione ...</option>

          <?php
          $sql = "SELECT id, nm_fornecedor FROM fornecedores";
          $result = $conexao->query($sql);

          // Preencher as opcoes do select com os fornecedores
          while ($data = $result->fetch_assoc()) {
            echo '<option value = "' . $data['id'] . '">' . $data['nm_fornecedor'] . '</option>';
          }

          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="tipo" class="col-form-label">Tipo</label>
        <select name="tipo" id="tipo" class="form-control">
          <option value="">Selecione ...</option>
          <option value="entrada">Entrada</option>
          <option value="saida">Saída</option>
        </select>
      </div>

      <div class="form-group">
        <label for="quantidade" class="col-form-label">Quantidade</label>
        <input type="text" class="form-control" id="quantidade" name="quantidade" required>
      </div>

      <input type="submit" class="btn btn-primary" value="Salvar">
      <a href="movimento.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>