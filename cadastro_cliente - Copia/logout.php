<?php
session_start();

if (!isset($_SESSION['usuario_nome'])) {
    header('location: login.php');
    exit;
}
