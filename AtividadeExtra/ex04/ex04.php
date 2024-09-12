<?php

    $nascimento = $_POST['nasc'];

    echo "<h3>Verificador de Idade</h3>";

    $data_atual = new DateTime();
    $nascimento = new DateTime($nascimento);
    $diferenca = $data_atual->diff($nascimento);
    $idade = $diferenca->y;

    if ($idade >= 18) {
        echo "Você é maior de idade.";
    } else {
        echo "Você é menor de idade.";
    }

?>
