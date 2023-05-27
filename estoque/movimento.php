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
        <li class="nav-item">
          <a class="nav-link" href="../sistema/admUsuario.php">Adm Sistema</a>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Estoque
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../fornecedores/fornecedor.php">Fornecedor</a>
            <a class="dropdown-item" href="../materiais/material.php">Material</a>
            <a class="dropdown-item active" href="movimento.php">Movimentação <span class="sr-only">(página atual)</span></a>
            <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Algo mais aqui</a> -->
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="title">
      <h3>RCR System | Movimentação de Estoque</h3>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>
    </div>
    <br><br>

    <table class="table table-hover">
      <thead>
        <tr>
          <!-- <th scope="col">ID</th> -->
          <th scope="col">Material</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Fornecedor</th>
          <th scope="col">Tipo</th>
          <th scope="col">Data</th>
          <th scope="col">Qtde Estoque</th>
          <th scope="col"><a href='cadMovimentacao.php'><button type='button' class='btn btn-primary btn-sm'>Cadastrar</button></a>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once("../includes/db_connection.php");


        // $sql = "SELECT DISTINCT id_material, SUM(qt_material) qt_material, id_fornecedor, ds_tipo, dt_movimentacao FROM estoque GROUP BY id_material, id_fornecedor, ds_tipo, dt_movimentacao ORDER BY id_material";
        $sql = "SELECT
        a.id_material,
        SUM(a.qt_material) qt_material,
        (SELECT SUM(b.qt_material) FROM estoque b WHERE a.id_material = b.id_material AND b.ds_tipo = 'entrada') qt_positivo,
        (SELECT SUM(b.qt_material) FROM estoque b WHERE a.id_material = b.id_material AND b.ds_tipo = 'entrada') - (SELECT SUM(c.qt_material) FROM estoque c WHERE a.id_material = c.id_material AND c.ds_tipo = 'saida') qt_total,
        a.id_fornecedor,
        a.ds_tipo, 
        a.dt_movimentacao
        FROM estoque a
        GROUP BY 
        a.id_material, 
        a.id_fornecedor, 
        a.ds_tipo, 
        a.dt_movimentacao 
        ORDER BY 
        a.id_material";

        
          // Exibe os dados da tabela ESTOQUE
          $result = $conexao->query($sql);

          while ($data = $result->fetch_assoc()){
            $atual = $data['qt_total'];
            if($atual != NULL){

            echo '<tr>';
            // echo '<td>' . $data['id'] . '</td>';
            echo '<td>' . $data['id_material'] . '</td>';
            echo '<td>' . $data['qt_material'] . '</td>';
            echo '<td>' . $data['id_fornecedor'] . '</td>';
            echo '<td>' . $data['ds_tipo'] . '</td>';
            echo '<td>' . $data['dt_movimentacao'] . '</td>';
            echo '<td>' . $data['qt_total'] . '</td>';
            echo '</tr>';
  
          }else{
            echo '<tr>';
            // echo '<td>' . $data['id'] . '</td>';
            echo '<td>' . $data['id_material'] . '</td>';
            echo '<td>' . $data['qt_material'] . '</td>';
            echo '<td>' . $data['id_fornecedor'] . '</td>';
            echo '<td>' . $data['ds_tipo'] . '</td>';
            echo '<td>' . $data['dt_movimentacao'] . '</td>';
            echo '<td>' . $data['qt_positivo'] . '</td>';
            echo '</tr>';
          }
        }

        ?>





        <tr>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
          <td>...</td>
        </tr>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>