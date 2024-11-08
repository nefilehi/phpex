<?php
// Inicia a sessão, se ainda não estiver iniciada
session_start();

include 'conexao.php';
include 'menu.php';

// Recupera a lista de usuarios do banco de dados
$usuarios = $conn->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);

// Verifica se o usuário tem o nível de acesso ADMINISTRADOR
$temAcessoAdmin = isset($_SESSION['nivel_acesso']) && $_SESSION['nivel_acesso'] === 'ADMINISTRADOR';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Lista de Usuários</h1>
        
        <!-- Exibe o botão de cadastro apenas para administradores -->
        <?php if ($temAcessoAdmin): ?>
            <a href="cadastro_usuario.php" class="btn btn-success mb-3">Cadastrar Usuário</a>
        <?php endif; ?>

        <!-- Exibe uma mensagem caso não haja usuários -->
        <?php if (empty($usuarios)): ?>
            <div class="alert alert-warning">Nenhum usuário cadastrado.</div>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nível de Acesso</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario['nome']) ?></td>
                            <td><?= htmlspecialchars($usuario['email']) ?></td>
                            <td><?= htmlspecialchars($usuario['nivel_acesso']) ?></td>
                            <td>
                                <!-- Exibe os botões de ação apenas se o usuário for ADMINISTRADOR -->
                                <?php if ($temAcessoAdmin): ?>
                                    <a href="editar_usuarios.php?id=<?= $usuario['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="excluir_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('A exclusão é permanente! Tem certeza disso?')">Excluir</a>
                                <?php else: ?>
                                    <span class="text-muted">Sem permissão</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0eM7tddxzOrp9v6hZPszMUM0pQ9pt3Qp2zN1K1VZfFMfZRe1Wb+Qlwtr5b9PqR93" crossorigin="anonymous"></script>
</body>

</html>
