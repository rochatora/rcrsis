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
          <a class="nav-link" href="../index.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="admUsuario.php">Adm Sistema <span class="sr-only">(página atual)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Estoque
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../fornecedores/fornecedor.php">Fornecedor</a>
            <a class="dropdown-item" href="material.php">Material</a>
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
      <h3>RCR System | Adm Sistema</h3>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>
    </div>
    <br><br>

    <!-- Modal para cadastro de Usuario -->
    <div class="modal fade" id="cadUsuario" tabindex="-1" role="dialog" aria-labelledby="cadUsuarioLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cadUsuarioLabel">Cadastro de Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../includes/userCadastrar.php" method="POST">
              <div class="form-group">
                <label for="usuario" class="col-form-label">Usuário</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
              </div>
              <div class="form-group">
                <label for="nome" class="col-form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
              </div>
              <div class="form-group">
                <label for="email" class="col-form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="senha" class="col-form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha">
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
          <th scope="col">Usuário</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Dt Cadastro</th>
          <th scope="col">Dt Atualização</th>
          <th scope="col"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cadUsuario">Cadastrar</button></th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once('../includes/db_connection.php');
        $sql = "SELECT * FROM usuario ORDER BY id";

        // Exibe os dados da tabela Usuario
        $result = $conexao->query($sql);

        while ($data = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $data['id']             . '</td>';
          echo '<td>' . $data['ds_usuario']    . '</td>';
          echo '<td>' . $data['ds_nome']    . '</td>';
          echo '<td>' . $data['ds_email']  . '</td>';
          echo '<td>' . $data['dt_cadastro']    . '</td>';
          echo '<td>' . $data['dt_atualizacao'] . '</td>';
          echo "<td>
          <a href='editaUser.php?id=$data[id]'><button type='button' class='btn btn-warning btn-sm'>Atualizar</button></a>
          <a href='../includes/deleteUser.php?id=$data[id]'><button type='button' class='btn btn-danger btn-sm'>Excluir</button></a>
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