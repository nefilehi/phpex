<?php

$temperatura = floatval($_POST['txtnum']);

echo "<h3>Exercício 08</h3>";

if ($temperatura == 0) {
    echo "Temperatura neutra.";
} elseif ($temperatura < 0) {
    echo "Frio intenso detectado!";
} else {
    echo "Clima ameno e agradável!";
}
