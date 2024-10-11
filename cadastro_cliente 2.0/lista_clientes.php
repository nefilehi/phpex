<?php
// Inicia a sessão, se ainda não estiver iniciada
session_start();

include 'conexao.php';
include 'menu.php';

// Recupera a lista de clientes do banco de dados
$clientes = $conn->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);

// Verifica se o usuário tem o nível de acesso ADMINISTRADOR
$temAcessoAdmin = isset($_SESSION['nivel_acesso']) && $_SESSION['nivel_acesso'] === 'ADMINISTRADOR';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Lista de Clientes</h1>
        <a href="cadastrar.php" class="btn btn-success mb-3">Cadastrar Cliente</a>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Arquivo PDF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= htmlspecialchars($cliente['nome']) ?></td>
                        <td><?= htmlspecialchars($cliente['email']) ?></td>
                        <td>
                            <!-- Verifica se o arquivo PDF existe antes de exibir o link -->
                            <?php if (!empty($cliente['arquivo_pdf']) && file_exists("uploads/{$cliente['arquivo_pdf']}")): ?>
                                <a href="uploads/<?= htmlspecialchars($cliente['arquivo_pdf']) ?>" target="_blank">Ver PDF</a>
                            <?php else: ?>
                                <span class="text-muted">Sem PDF disponível</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <!-- Exibe os botões de ação apenas se o usuário for ADMINISTRADOR -->
                            <?php if ($temAcessoAdmin): ?>
                                <a href="editar.php?id=<?= $cliente['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="excluir.php?id=<?= $cliente['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('A exclusão é permanente! Tem certeza disso?')">Excluir</a>
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
