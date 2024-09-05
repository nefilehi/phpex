<?php

    $etapas = $_POST['txtnum'];
    $a = 0;
    $b = 1;
    $pisos = 1;

    echo "<h3>Sequência de Fibonacci para $etapas etapas:</h3>";

    echo "$a, $b";
    for ($i=2; $i < $etapas; $i++) {
        $f = $a + $b;
        echo ", $f";
        $pisos = $pisos + $f**2;
        $a = $b;
        $b = $f;
        
    }
    
    echo "<p>para $etapas etapas, necessitamos de $pisos pisos.</p>";

?>