<?php
// Inicia a sessão, se ainda não estiver iniciada
session_start();

include 'conexao.php';
include 'menu.php';

// Verifica se o usuário está logado e tem o nível de acesso ADMINISTRADOR
if (!isset($_SESSION['nivel_acesso'])) {
    // Redirecionar ou exibir mensagem de erro
    header('Location: login.php');
    exit;
}
$temAcessoAdmin = $_SESSION['nivel_acesso'] === 'ADMINISTRADOR';

// Recupera a lista de produtos do banco de dados
$produtos = $conn->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Lista de Produtos</h1>
        <a href="cadastro_produto.php" class="btn btn-success mb-3">Cadastrar Produto</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= htmlspecialchars($produto['nome']) ?></td>
                        <td><?= htmlspecialchars($produto['descricao']) ?></td>
                        <td><?= htmlspecialchars($produto['preco']) ?></td>
                        <td><?= htmlspecialchars($produto['quantidade']) ?></td>
                        <td>
                            <?php if (!empty($produto['imagem'])): ?>
                                <a href="uploads/<?= htmlspecialchars($produto['imagem']) ?>" target="_blank">Ver imagem</a>
                            <?php else: ?>
                                <span class="text-muted">Sem imagem disponível</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($temAcessoAdmin): ?>
                                <a href="editar.php?id=<?= $produto['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="excluir.php?id=<?= $produto['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('A exclusão é permanente! Tem certeza disso?')">Excluir</a>
                            <?php else: ?>
                                <span class="text-muted">Sem permissão</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0eM7tddxzOrp9v6hZPszMUM0pQ9pt3Qp2zN1K1VZfFMfZRe1Wb+Qlwtr5b9PqR93" crossorigin="anonymous"></script>
</body>

</html>
