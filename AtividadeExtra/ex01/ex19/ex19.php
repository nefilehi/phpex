<?php

    $distancia = $_POST['distancia'];
    $velocidade = $_POST['velocidade'];

    $tempo_horas = $distancia / $velocidade;

    $horas = floor($tempo_horas);
    $minutos = round(($tempo_horas - $horas) * 60);

    echo "O tempo estimado de viagem é de $horas horas e $minutos minutos.";

?>
