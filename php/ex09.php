<?php

    $num = $_POST['txtnum'];

    echo "<h3>Gerador de números</h3>";

    for ($i=0; $i <= $num; $i++) { 
            echo "$i <br/>";
    }
    
    echo "<p>Sequência encerrada</p>";

?>