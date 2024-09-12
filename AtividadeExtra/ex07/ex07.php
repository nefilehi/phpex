<?php

    $texto = $_POST['texto'];

    echo "<h3>Contador de Palavras</h3>";

    $palavras = str_word_count($texto);

    echo "Total de palavras contidas no texto: $palavras<br><br>";

?>
