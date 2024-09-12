<?php

function buscarEnderecoPorCEP($cep) {
    $cep = preg_replace('/[^0-9]/', '', $cep);

    if (strlen($cep) != 8) {
        return "CEP inválido.";
    }

    $url = "https://viacep.com.br/ws/$cep/json/";

    $response = file_get_contents($url);

    $endereco = json_decode($response, true);

    if (isset($endereco['erro'])) {
        return "CEP não encontrado.";
    }

    $enderecoCompleto = "{$endereco['logradouro']}, {$endereco['bairro']} - {$endereco['localidade']} - {$endereco['uf']}";

    return $enderecoCompleto;
}

$cep = $_POST['cep'];

$resultado = buscarEnderecoPorCEP($cep);

echo "<h3>Endereço correspondente:</h3>";
echo "<p>$resultado</p>";

?>
