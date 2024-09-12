<?php

$arquivoEventos = 'eventos.json';
$eventos = json_decode(file_get_contents($arquivoEventos), true) ?? [];

function formatarData($data) {
    return date("d/m/Y", strtotime($data));
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 10</title>
</head>
<body>
    <h2>Calendário de Eventos</h2>

    <h3>Adicionar Novo Evento</h3>
    <form action="adicionar_evento.php" method="post">
        <label for="titulo">Título do Evento:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>
        <label for="data">Data do Evento:</label>
        <input type="date" id="data" name="data" required><br><br>
        <button type="submit">Adicionar Evento</button>
    </form>

    <h3>Eventos</h3>
    <?php if (count($eventos) > 0): ?>
        <ul>
            <?php foreach ($eventos as $id => $evento): ?>
                <li>
                    <?php echo $evento['titulo'] . ' - ' . formatarData($evento['data']); ?>
                    <a href="excluir_evento.php?id=<?php echo $id; ?>" onclick="return confirm('Tem certeza que deseja excluir este evento?');">Excluir</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum evento adicionado.</p>
    <?php endif; ?>
</body>
</html>
