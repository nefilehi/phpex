<?php

    $celsius = $_POST['celsius'];

    echo "<h3>Conversor de Temperatura</h3>";

    $f = $celsius * 1.8 + 32;

    echo "A temperatura em Fahrenheit é: $f °F";

?>