<?php

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$idade = $_POST['idade'];

if ($sexo == "M" && $idade >= 18) {
    echo $nome . " , você já pode realizar seu alistamento militar.";
} elseif ($sexo == "M" && $idade < 18) {
    echo $nome . " , você só pode se alistar quando completar 18 anos.";
} else {
    echo $nome . " , você não pode se alistar.";
}
