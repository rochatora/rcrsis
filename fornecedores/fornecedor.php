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
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="../index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Home <span class="sr-only">(página atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../sistema/admUsuario.php">Adm Sistema</a>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Estoque
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item active" href="fornecedor.php">Fornecedor <span class="sr-only">(página atual)</span></a>
            <a class="dropdown-item" href="../materiais/material.php">Material</a>
            <a class="dropdown-item" href="../estoque/movimento.php">Movimentação</a>
            <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Algo mais aqui</a> -->
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="title">
      <h3>RCR System | Fornecedores</h3>

    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>
    </div>
    <br><br>

    <!-- Modal para cadastro de fornecedor -->
    <div class="modal fade" id="cadFornecedor" tabindex="-1" role="dialog" aria-labelledby="cadFornecedorLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cadFornecedorLabel">Cadastro de Fornecedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../includes/fornCadastrar.php" method="POST">
              <div class="form-group">
                <label for="fornecedor" class="col-form-label">Fornecedor</label>
                <input type="text" class="form-control" id="fornecedor" name="fornecedor" required>
              </div>
              <div class="form-group">
                <label for="endereco" class="col-form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" required>
              </div>
              <div class="form-group">
                <label for="contato" class="col-form-label">Contato</label>
                <input type="text" class="form-control" id="contato" name="contato" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Salvar">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Fornecedor</th>
          <th scope="col">Endereço</th>
          <th scope="col">Contato</th>
          <th scope="col">Dt Cadastro</th>
          <th scope="col">Dt Atualização</th>
          <th scope="col"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cadFornecedor">+</button></th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once("../includes/db_connection.php");
        $sql = "SELECT * FROM fornecedores ORDER BY id";
        // Exibe os dados na tabela Fornecedor
        $result = $conexao->query($sql);
        while ($data = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $data['id']             . '</td>';
          echo '<td>' . $data['nm_fornecedor']  . '</td>';
          echo '<td>' . $data['ds_endereco']    . '</td>';
          echo '<td>' . $data['nr_contato']     . '</td>';
          echo '<td>' . $data['dt_cadastro']    . '</td>';
          echo '<td>' . $data['dt_atualizacao'] . '</td>';
          echo "<td>
                    <a href='editaForn.php?id=$data[id]'><button type='button' class='btn btn-warning btn-sm'>Atualizar</button></a>
                    <a href='../includes/deleteForn.php?id=$data[id]'><button type='button' class='btn btn-danger btn-sm'>Excluir</button></a>
                    </td>";
        echo '</tr>';
      }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>