<?php

    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    echo "<h3>Cálculo de IMC</h3>";

    $imc = $peso / ($altura * $altura);

    echo "Seu IMC é: " . (round($imc,2));

?>