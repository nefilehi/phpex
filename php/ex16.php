<?php

    echo "<h3>Sequência gerada:</h3>";

    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];

    for ($i=$n1; $i <= $n2; $i++) {
        echo $i . "<br>";
    }

?>