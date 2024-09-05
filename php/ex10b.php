<?php

    $etapas = $_POST['txtnum'];
    $a = 0;
    $b = 1;

    echo "<h3>Sequência de Fibonacci para $etapas etapas:</h3>";

    echo "$a, $b";
    for ($i=2; $i < $etapas; $i++) {
        $f = $a + $b;
        echo ", $f";
        $a = $b;
        $b = $f;
        
    }

?>