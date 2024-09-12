<?php

    $vt = $_POST['txtconta'];
    $g = $_POST['txtgorjeta'];

    echo "<h3>Calculadora de Gorjeta</h3>";

    $vf = $vt * ($g / 100);

    echo "Valor da gorjeta: R$$vf";

?>