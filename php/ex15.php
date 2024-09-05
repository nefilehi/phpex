<?php

    echo "<h3>Alterar array</h3>";

    $letra = $_POST['letra'];

    $listaletras = array("A", "B", "C", "D", "E");

    for ($i=0; $i < 4; $i++) {
        if ($listaletras[$i] == $letra) {
            $listaletras[$i] = "X";
        }
        echo $listaletras[$i] . "<br>";
    }

?>