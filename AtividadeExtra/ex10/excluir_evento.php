<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $arquivoEventos = 'eventos.json';
    $eventos = json_decode(file_get_contents($arquivoEventos), true) ?? [];

    if (isset($eventos[$id])) {
        unset($eventos[$id]);
    }

    file_put_contents($arquivoEventos, json_encode(array_values($eventos)));

    header('Location: ex10.php');
    exit;
}

?>
