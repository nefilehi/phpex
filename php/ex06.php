<?php

$idade = $_POST['txtnum'];

echo "<h3>Exercício 06</h3>";

if ($idade >= 60) {
    echo "<p>Receba a pulseira vip para idosos!</p>";
} elseif ($idade >= 18) {
    echo "<p>Receba a pulseira normal!</p>";
} else {
    echo "<p>Receba a pulseira para menores!</p>";
}

echo "<p>Programa encerrado</p>";
