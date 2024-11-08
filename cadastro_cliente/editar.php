<?php
include 'conexao.php';

$id = $_GET['id'];
$cliente = $conn->prepare("SELECT * FROM clientes WHERE id = ?");
$cliente->execute([$id]);
$cliente = $cliente->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $arquivoNovo = $_FILES['arquivo_pdf'];

    if ($arquivoNovo['error'] === UPLOAD_ERR_OK) {
        $nomeArquivoNovo = uniqid() . "-" . $arquivoNovo['name'];
        move_uploaded_file($arquivNovo['tmp_name'], "uploads/$nomeArquivoNovo");

        // Remove o arquivo antigo
        if (file_exists("uploads/" . $cliente['arquivo_pdf'])) {
            unlink("uploads/" . $cliente['arquivo_pdf']);
        }

        $stmt = $conn->prepare("UPDATE clientes SET nome = ?, email = ?, arquivo_pdf = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $nomeArquivoNovo, $id]);
    } else {
        $stmt = $conn->prepare("UPDATE clientes SET nome = ?, email = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $id]);
    }

    header("Location: lista_clientes.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Editar Cliente</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required><br>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required><br>
            </div>
            <div class="form-group">
                <label for="arquivo_pdf">Arquivo PDF Assinado (deixe em branco se não quiser alterar)</label>
                <input type="file" class="form-control" name="arquivo_pdf" accept=".pdf"><br>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</body>

</html>