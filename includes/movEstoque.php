<?php

include_once("../includes/db_connection.php");

// Obter os dados do formulario
$mat_id = $_POST['material_id'];
$forn_id = $_POST['fornecedor_id'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];


// Verificar se é uma entrada ou saída de estoque
if ($tipo == "entrada") {
  if ($quantidade <= 0) {
    echo ("<script>
    window.alert('Quantidade INVÁLIDA! Tente novamente.')
    window.location.href='../estoque/cadMovimentacao.php';
  </script>");
  } else {
    $sql = "INSERT INTO estoque (id_material, id_fornecedor, qt_material, ds_tipo, dt_movimentacao) VALUES ($mat_id, $forn_id, $quantidade, '$tipo', NOW())";
  }
} else {

  // Verificar se há estoque suficiente para a saída
  $sql = "SELECT SUM(qt_material) qt_mat FROM estoque WHERE id_material = $mat_id AND ds_tipo = 'entrada'";

  $result = $conexao->query($sql);

  if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $estoque_atual = $data['qt_mat'];

    if ($estoque_atual >= $quantidade && $quantidade > 0) {

      // Atualizar a quantidade do material no estoque
      $sql = "INSERT INTO estoque (id_material, id_fornecedor, qt_material, ds_tipo, dt_movimentacao) VALUES ($mat_id, $forn_id, $quantidade, '$tipo', NOW())";

    } else {

      echo ("<script>
        window.alert('Operação INVÁLIDA!  Estoque Atual: $estoque_atual  -  Qtde Saída: $quantidade')
        window.location.href='../estoque/cadMovimentacao.php';
    </script>");
      exit();

    }

  } else {
    echo "Material não encontrado no estoque!";
    exit();
  }
}

$result = $conexao->query($sql);

$conexao->close();

header('Location: ../estoque/movimento.php');
