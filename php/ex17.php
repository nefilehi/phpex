<?php

    echo "<h3>Sequência gerada:</h3>";

    $p1 = $_POST['p1'];
    $d1 = $_POST['d1'];
    $p2 = $_POST['p2'];
    $d2 = $_POST['d2'];

    $desconto1 = ($d1 * $p1) / 100;
    echo "Preço do produto 1: <br>" . $p1 - $desconto1 . "<br>";

    $desconto2 = ($d2 * $p2) / 100;
    echo "Preço do produto 2: <br>" . $p2 - $desconto2 . "<br>";

    echo "O valor total é: " . ($p1 - $desconto1) + ($p2 - $desconto2);
?>