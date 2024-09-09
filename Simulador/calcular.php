<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Empréstimos</title>
</head>

<body>
    <?php
        $cliente = $_POST['cliente']; //s para sim ou n para não
        $valor = $_POST['valor']; // valor do emprestimo
        $score = $_POST['score']; // score do serasa
        $parcela = $_POST['parcela']; // numero de parcelas
        //$seguro = $_POST['seguro']; // quer seguro desemprego?

        if (isset($_POST['seguro'])){
            $seguro = 0;
        } else {
            $seguro = 49.90;
        }

        if($cliente == "s"){
            $juros = 0.03;
            $valor = $valor + $valor * ($juros * $parcela) + 35 + $seguro;
            $valor_total = $valor + $valor * 0.0038;
            $valor_parcela = $valor_total / $parcela;
        } else {
            switch ($score) {
                case $score <= 299:
                    $juros = 0.2;
                    break;

                case $score <= 499:
                    $juros = 0.15;
                    break;

                case $score <= 699:
                    $juros = 0.1;
                    break;
                
                default:
                    $juros = 0.05;
                    break;
            }
            $valor = ($valor + $valor * (0.03 * $parcela)) + 35;
            $valor_total = $valor + $valor * 0.0038;
            $valor_parcela = $valor_total / $parcela;

        }
    ?>
    <h2>Seja bem vindo ao MyBank</h2>
    <h3>Resultado da Simulação</h3>
    <p>Valor das parcelas: R$<?= number_format($valor_parcela, 2, ',', ',') ?></p>
    <p>Quantidade das parcelas: <?= $parcela ?></p>
    <p>Juros: <?= $juros * 100 ?>%</p>
    <p>Valor Total CET: R$ <?= number_format($valor_total, 2, ',', ',') ?></p>
</body>

</html>