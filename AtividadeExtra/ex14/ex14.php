<?php

    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];

    echo "<h3>Cálculo de média</h3>";

    $med = ($n1 + $n2 + $n3) / 3;

    $med = (round($med,2));
    
    if ($med >= 8) {
        echo "Aluno aprovado com média $med";
    } else {
        echo "Aluno reprovado com média $med";
    }

?>