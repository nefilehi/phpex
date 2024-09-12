<?php

    $comprimento = $_POST['comprimento'];
    $incluirNumeros = $_POST['incluirNumeros'];
    $incluirEspeciais = $_POST['incluirEspeciais'];

    if ($incluirNumeros == 's') {
        $incluirNumeros = true;
    } else {
        $incluirNumeros = false;
    }

    if ($incluirEspeciais == 's') {
        $$incluirEspeciais = true;
    } else {
        $incluirEspeciais = false;
    }

    function gerarSenha($comprimento, $incluirNumeros, $incluirEspeciais) {
        // Definindo os caracteres base
        $letras = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numeros = '0123456789';
        $caracteresEspeciais = '!@#$%^&*()-_=+<>?';

        // Cria um conjunto de caracteres com base nas preferências do usuário
        $conjuntoCaracteres = $letras;

        if ($incluirNumeros) {
            $conjuntoCaracteres .= $numeros;
        }

        if ($incluirEspeciais) {
            $conjuntoCaracteres .= $caracteresEspeciais;
        }

        // Geração da senha
        $senha = '';
        $comprimentoConjunto = strlen($conjuntoCaracteres);

        for ($i = 0; $i < $comprimento; $i++) {
            $senha .= $conjuntoCaracteres[random_int(0, $comprimentoConjunto - 1)];
        }

        return $senha;
    }

    echo "<h3>Gerador de Senhas</h3>";

    $senhaGerada = gerarSenha($comprimento, $incluirNumeros, $incluirEspeciais);
    echo "A senha gerada é: $senhaGerada";

?>
