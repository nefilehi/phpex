<?php

$cpf = $_POST['cpf'];

function validarCPF($cpf) {
    // Remove caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verifica se o CPF tem 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais, o que é inválido
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    for ($i = 0, $soma = 0; $i < 9; $i++) {
        $soma += $cpf[$i] * (10 - $i);
    }
    $resto = $soma % 11;
    $digito1 = $resto < 2 ? 0 : 11 - $resto;

    // Calcula o segundo dígito verificador
    for ($i = 0, $soma = 0; $i < 10; $i++) {
        $soma += $cpf[$i] * (11 - $i);
    }
    $resto = $soma % 11;
    $digito2 = $resto < 2 ? 0 : 11 - $resto;

    // Verifica se os dígitos calculados correspondem aos dígitos verificadores do CPF
    return ($cpf[9] == $digito1 && $cpf[10] == $digito2);
}

// Exemplo de uso

echo "<h3>Validador de CPF</h3>";

if (validarCPF($cpf)) {
    echo "O CPF $cpf é válido.";
} else {
    echo "O CPF $cpf é inválido.";
}

?>
