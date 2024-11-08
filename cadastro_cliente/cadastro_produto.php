<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $arquivo = $_FILES['imagem'];
 
    if ($arquivo['error'] === UPLOAD_ERR_OK) {
 
        $nomeArquivo = uniqid() . "-" . $arquivo['name'];
        $file_parts = pathinfo($nomeArquivo);
        $extension = $file_parts['extension'];
 
        // Verifica se o arquvio enviado é um arquivo de imagem válido
        if (in_array($extension, array('jpg', 'png', 'jpeg', 'gif'))) {
           
            move_uploaded_file($arquivo['tmp_name'], "img/$nomeArquivo");
 
            $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, quantidade, imagem) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nome, $descricao, $preco, $quantidade, $nomeArquivo]);
 
            header("Location: lista_produtos.php");
            exit;
        } else {
            echo "<div class='container text-center mt-4 alert alert-danger'>Por favor insira um arquivo válido para a imagem!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Cadastro de Produto</h2>
                        <form action="cadastro_produto.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição:</label>
                                <input type="text" name="descricao" id="descricao" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço:</label>
                                <input type="number" name="preco" id="preco" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="quantidade" class="form-label">Quantidade:</label>
                                <input type="number" name="quantidade" id="quantidade" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="imagem">Imagem do produto</label>
                                <input type="file" class="form-control" name="imagem" accept=".jpg,.jpeg,.png" required><br>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>