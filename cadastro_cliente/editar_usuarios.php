<?php
include 'conexao.php';

// Recuperando o ID do usuário
$id = $_GET['id'] ?? null;

if ($id) {
    // Recuperando as informações do usuário
    $usuario = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $usuario->execute([$id]);
    $usuario = $usuario->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Pegando os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $nivel_acesso = $_POST['nivel_acesso'];


        if (!empty($_POST['senha'])) {
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        } else {
            $senha = $usuario['senha'];
        }


        $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ?, nivel_acesso = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $senha, $nivel_acesso, $id]);

        // Redirecionando após a atualização
        header("Location: lista_usuarios.php");
        exit;
    }
} else {
    echo "Usuário não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Editar Usuário</h2>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($usuario['email']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha:</label>
                                <input type="password" name="senha" id="senha" class="form-control">
                                <small class="form-text text-muted">Deixe em branco para manter a senha atual.</small>
                            </div>
                            <div class="form-group">
                                <label for="nivel_acesso">Nível de Acesso</label><br>
                                <select name="nivel_acesso" id="nivel_acesso" class="form-control form-select">
                                    <option value="ADMINISTRADOR">Administrador</option>
                                    <option value="COMUM">Usuário</option>
                                </select><br>
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