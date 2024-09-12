<?php

    $num = $_POST['num'];

    $magico = rand(1, 100);

    echo "<h3>Jogo da Adivinhação</h3>";
        
    if ($num == $magico) {
        echo "<p>Parabéns! Você adivinhou corretamente o número $magico!</p>";
    } elseif ($num < $magico) {
        echo "<p>Seu palpite ($num) é muito baixo.</p>";
    } else {
        echo "<p>Seu palpite ($num) é muito alto.</p>";
    }

?>
