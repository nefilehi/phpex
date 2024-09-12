<?php

function calcularFrete($peso, $destino) {
    $tabelaFrete = [
        'São Paulo' => [
            'preco_base' => 15.00,
            'preco_por_kg' => 5.00,
        ],
        'Rio de Janeiro' => [
            'preco_base' => 17.00,
            'preco_por_kg' => 6.00,
        ],
        'Minas Gerais' => [
            'preco_base' => 19.00,
            'preco_por_kg' => 7.00,
        ],
        'Bahia' => [
            'preco_base' => 20.00,
            'preco_por_kg' => 8.00,
        ],
    ];

    $precoBase = $tabelaFrete[$destino]['preco_base'];
    $precoPorKg = $tabelaFrete[$destino]['preco_por_kg'];

    if ($peso <= 1) {
        $frete = $precoBase;
    } else {
        $frete = $precoBase + (($peso - 1) * $precoPorKg);
    }

    return number_format($frete, 2, ',', '.');
}

$peso = floatval($_POST['peso']);
$destino = $_POST['destino'];

$valorFrete = calcularFrete($peso, $destino);

echo "<h3>Cálculo de Frete</h3>";

echo "Valor do frete para $destino: R$ $valorFrete";

?>
