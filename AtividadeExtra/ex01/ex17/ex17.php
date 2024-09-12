<?php

function verificarDisponibilidadeDominio($dominio) {
    $dominio = trim($dominio);

    if (!filter_var("http://$dominio", FILTER_VALIDATE_URL)) {
        return "Domínio inválido.";
    }

    if (checkdnsrr($dominio, 'A') || checkdnsrr($dominio, 'CNAME') || checkdnsrr($dominio, 'MX')) {
        return "O domínio $dominio já está registrado.";
    } else {
        return "O domínio $dominio está disponível para registro.";
    }
}

    $dominio = $_POST['dominio'];

    $resultado = verificarDisponibilidadeDominio($dominio);

    echo "<h3>Verificador de Disponibilidade de Domínio</h3>";
    echo "<p>$resultado</p>";

?>
