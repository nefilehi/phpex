<?php
include 'conexao.php';

$id = $_GET['id'];
$produto = $conn->prepare("SELECT imagem FROM produtos WHERE id = ?");
$produto->execute([$id]);
$produto = $produto->fetch(PDO::FETCH_ASSOC);

// Exclui o arquivo PDF do servidor
if (file_exists("img/" . $produto['imagem'])) {
    unlink("img/" . $produto['imagem']);
}

$stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
$stmt->execute([$id]);

header("Location: lista_produtos.php");
exit;
