<?php
include(__DIR__ . "/conexao.php");

$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$stmt = $conn->prepare("INSERT INTO funcionarios (nome, cargo, cpf, telefone, email) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nome, $cargo, $cpf, $telefone, $email);

if ($stmt->execute()) {
    header("Location: ../HTML/cadastro_funcionarios.php");
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
