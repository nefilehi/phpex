<?php

    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $senha = $_POST['txtSenha'];

    echo "<h3>Cadastro de Usuário</h3>";

    if ($nome == "" || $email == "" || $senha == "") {
        echo "Falha no cadastro! Nenhum campo pode ficar vazio!";
    }
    elseif (strlen($senha) < 6) {
        echo "Falha no cadastro! Senha deve conter pelo menos 6 caracteres!";
    }
    else {
        echo "Cadastro realizado com sucesso para o usuário $nome.";
    }

?>