<?php

$pontosPartida1 = isset($_POST['txtnum']) ? (int)$_POST['txtnum'] : 0;
$pontosPartida2 = isset($_POST['txtnum2']) ? (int)$_POST['txtnum2'] : 0;

$pontuacaoTotal = $pontosPartida1 + $pontosPartida2;

echo "<h3>Exercício 07</h3>";

if ($pontuacaoTotal >= 50) {
    $multiplicacao = $pontosPartida1 * $pontosPartida2;
    echo "Parabéns! A pontuação total da equipe é $pontuacaoTotal pontos.<br>";
    echo "A multiplicação dos pontos das duas partidas é $multiplicacao.<br>";
} else {
    echo "A pontuação total da equipe é $pontuacaoTotal pontos.<br>";
    echo "Precisamos intensificar nossos treinos para alcançar um desempenho melhor nos próximos jogos.<br>";
}
