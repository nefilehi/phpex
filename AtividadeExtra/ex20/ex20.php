<?php

$arquivoRegistros = 'registros.txt';

function carregarRegistros() {
    global $arquivoRegistros;
    $registros = [];
    if (file_exists($arquivoRegistros)) {
        $conteudo = file_get_contents($arquivoRegistros);
        $registros = unserialize($conteudo);
    }
    return $registros;
}

function salvarRegistros($registros) {
    global $arquivoRegistros;
    file_put_contents($arquivoRegistros, serialize($registros));
}

function adicionarRegistro($descricao, $valor, $tipo, $categoria) {
    $registros = carregarRegistros();
    $registros[] = ['descricao' => $descricao, 'valor' => $valor, 'tipo' => $tipo, 'categoria' => $categoria];
    salvarRegistros($registros);
}

function calcularSaldoAtual() {
    $registros = carregarRegistros();
    $saldo = 0;
    foreach ($registros as $registro) {
        if ($registro['tipo'] == 'receita') {
            $saldo += $registro['valor'];
        } elseif ($registro['tipo'] == 'despesa') {
            $saldo -= $registro['valor'];
        }
    }
    return $saldo;
}

function gerarRelatorioPorCategoria() {
    $registros = carregarRegistros();
    $relatorio = [];
    foreach ($registros as $registro) {
        if ($registro['tipo'] == 'despesa') {
            if (!isset($relatorio[$registro['categoria']])) {
                $relatorio[$registro['categoria']] = 0;
            }
            $relatorio[$registro['categoria']] += $registro['valor'];
        }
    }
    return $relatorio;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $valor = (float) $_POST['valor'];
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];

    adicionarRegistro($descricao, $valor, $tipo, $categoria);
}

$saldoAtual = calcularSaldoAtual();
$relatorioCategoria = gerarRelatorioPorCategoria();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 20</title>
</head>
<body>
    <h2>Sistema de Controle de Finanças Pessoais</h2>
    
    <h3>Saldo Atual: R$ <?php echo number_format($saldoAtual, 2, ',', '.'); ?></h3>
    
    <h3>Registrar Receita/Despesa</h3>
    <form method="POST" action="">
        <label for="categoria">Categoria:</label><br>
        <input type="text" id="categoria" name="categoria" required><br><br>
        
        <label for="valor">Valor:</label><br>
        <input type="number" step="0.01" id="valor" name="valor" required><br><br>
        
        <label for="tipo">Tipo:</label><br>
        <select id="tipo" name="tipo" required>
            <option value="receita">Receita</option>
            <option value="despesa">Despesa</option>
        </select><br><br>
        
        <button type="submit">Adicionar</button>
    </form>
    
    <h3>Relatório de Gastos por Categoria</h3>
    <?php if (!empty($relatorioCategoria)): ?>
        <ul>
            <?php foreach ($relatorioCategoria as $categoria => $valor): ?>
                <li><?php echo "<strong>$categoria:</strong> R$ " . number_format($valor, 2, ',', '.'); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhuma despesa registrada ainda.</p>
    <?php endif; ?>
</body>
</html>
