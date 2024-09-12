<?php

    $dolar = $_POST['dolar'];

    echo "<h3>Conversor de Moedas</h3>";

    $real = $dolar * 5.60;

    echo "Cotação atual: R$ 5,60<br><br>";

    echo "Valor em dólares: $ $dolar<br><br>";

    echo "Valor convertido em reais: R$ $real";

?>
