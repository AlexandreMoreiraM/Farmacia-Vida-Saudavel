<?php
include(__DIR__ . "/conexao.php");

$nome = $_POST['nome'];
$fabricante = $_POST['fabricante'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$estoque = $_POST['estoque'];

$stmt = $conn->prepare("INSERT INTO remedios (nome, fabricante, categoria, preco, estoque) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssdi", $nome, $fabricante, $categoria, $preco, $estoque);

if ($stmt->execute()) {
    header("Location: ../HTML/cadastro_remedio.php");
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
