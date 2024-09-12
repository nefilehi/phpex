<?php

    $palavra = $_POST['palavra'];

    function verificaPalindromo($palavra) {
        $palavra = strtolower(str_replace(' ', '', $palavra));

        $palavraInvertida = strrev($palavra);

        if ($palavra === $palavraInvertida) {
            return "A palavra $palavra é um palíndromo.";
        } else {
            return "A palavra $palavra não é um palíndromo.";
        }
    }

    echo "<h3>Verificador de Palíndromo</h3>";

    echo verificaPalindromo($palavra);

?>
