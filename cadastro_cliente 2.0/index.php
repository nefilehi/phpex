<?php
include 'conexao.php';

$clientes = $conn->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
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
                        <td><a href="uploads/<?= htmlspecialchars($cliente['arquivo_pdf']) ?>" target="_blank">Ver PDF</a></td>
                        <td>
                            <a href="editar.php?id=<?= $cliente['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="excluir.php?id=<?= $cliente['id'] ?>" class="btn btn-danger" onclick="return confirm('A exclusão é permanente! Tem certeza disso?')">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>