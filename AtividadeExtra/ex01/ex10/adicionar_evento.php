<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['titulo']) && isset($_POST['data'])) {
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];

    $arquivoEventos = 'eventos.json';
    $eventos = json_decode(file_get_contents($arquivoEventos), true) ?? [];

    $eventos[] = [
        'titulo' => $titulo,
        'data' => $data,
    ];

    file_put_contents($arquivoEventos, json_encode($eventos));

    header('Location: ex10.php');
    exit;
}

?>
