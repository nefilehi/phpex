<?php

$arquivoContatos = 'contatos.txt';

function carregarContatos() {
    global $arquivoContatos;
    $contatos = [];
    if (file_exists($arquivoContatos)) {
        $conteudo = file_get_contents($arquivoContatos);
        $contatos = unserialize($conteudo);
    }
    return $contatos;
}

function salvarContatos($contatos) {
    global $arquivoContatos;
    file_put_contents($arquivoContatos, serialize($contatos));
}

function adicionarContato($nome, $telefone, $email) {
    $contatos = carregarContatos();
    $contatos[] = ['nome' => $nome, 'telefone' => $telefone, 'email' => $email];
    salvarContatos($contatos);
}

function excluirContato($indice) {
    $contatos = carregarContatos();
    if (isset($contatos[$indice])) {
        unset($contatos[$indice]);
        salvarContatos($contatos);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    
    adicionarContato($nome, $telefone, $email);
}

if (isset($_GET['excluir'])) {
    $indice = $_GET['excluir'];
    excluirContato($indice);
}

$contatos = carregarContatos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 15</title>
</head>
<body>
    <h2>Agenda de Contatos</h2>
    
    <h3>Adicionar Novo Contato</h3>
    <form method="POST" action="">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone" required><br><br>
        
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <button type="submit" name="adicionar">Adicionar Contato</button>
    </form>
    
    <h3>Lista de Contatos</h3>
    <?php if (!empty($contatos)): ?>
        <ul>
            <?php foreach ($contatos as $indice => $contato): ?>
                <li>
                    <?php echo "{$contato['nome']} - {$contato['telefone']} - {$contato['email']}"; ?>
                    <a href="?excluir=<?php echo $indice; ?>" onclick="return confirm('Tem certeza que deseja excluir este contato?');">Excluir</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum contato adicionado.</p>
    <?php endif; ?>
</body>
</html>
