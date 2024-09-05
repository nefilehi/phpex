<?php

    $num = $_POST['txtnum'];

    echo "<h3>Gerador de números</h3>";

    $i = 1;

    while ($i <= $num) {
        echo "$i <br/>";
        $i += 2;
        
    }
    
    echo "<p>Sequência encerrada</p>";

?>