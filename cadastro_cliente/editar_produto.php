<?php
include 'conexao.php';

// Recuperando o ID do produto
$id = $_GET['id'] ?? null;

if ($id) {
    // Recuperando as informações do produto
    $produto = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
    $produto->execute([$id]);
    $produto = $produto->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $imagem = $_FILES['imagem'];

        $imagemPath = $produto['imagem'];


        if ($imagem['error'] === UPLOAD_ERR_OK) {

            $nomeArquivo = uniqid() . '-' . basename($imagem['name']);
            $imagemPath = "uploads/$nomeArquivo";


            if (move_uploaded_file($imagem['tmp_name'], $imagemPath)) {
                // Remover a imagem antiga
                if (file_exists("uploads/" . $produto['imagem'])) {
                    unlink("uploads/" . $produto['imagem']);
                }
            }
        }

        // Atualizando o produto no banco
        $stmt = $conn->prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, quantidade = ?, imagem = ? WHERE id = ?");
        $stmt->execute([$nome, $descricao, $preco, $quantidade, $imagemPath, $id]);

        // Redirecionando após a atualização
        header("Location: lista_produtos.php");
        exit;
    }
} else {
    echo "Produto não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Editar Produto</h2>
                        <form action="editar_produto.php?id=<?= $produto['id'] ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($produto['nome']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição:</label>
                                <input type="text" name="descricao" id="descricao" class="form-control" value="<?= htmlspecialchars($produto['descricao']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço:</label>
                                <input type="number" name="preco" id="preco" class="form-control" value="<?= htmlspecialchars($produto['preco']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="quantidade" class="form-label">Quantidade:</label>
                                <input type="number" name="quantidade" id="quantidade" class="form-control" value="<?= htmlspecialchars($produto['quantidade']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="imagem">Imagem do produto</label>
                                <input type="file" class="form-control" name="imagem" accept=".jpg,.jpeg,.png"><br>
                                <?php if ($produto['imagem']): ?>
                                    <img src="uploads/<?= $produto['imagem'] ?>" alt="Imagem do produto" class="img-fluid mb-2" width="100">
                                <?php endif; ?>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>