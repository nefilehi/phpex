<?php
include 'conexao.php';

$clientes = $conn->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* centraliza as divs horizontalmente */
            margin-top: 20px;
        }

        .quadrado {
            width: 400px;
            height: 450px;
            background-color: #fff; /* fundo branco */
            border: 1px solid #ccc; /* borda opcional */
            border-radius: 8px; /* bordas arredondadas */
            margin: 10px; /* margem entre as divs */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* sombra */
            display: flex;
            flex-direction: column;
            align-items: center; /* centraliza o conteúdo horizontalmente */
            padding: 15px; /* espaçamento interno */
            transition: transform 0.2s;
        }

        .quadrado:hover {
            transform: scale(1.05); /* efeito de zoom ao passar o mouse */
        }

        .quadrado img {
            width: 100%;
            height: auto; /* mantém a proporção da imagem */
            border-radius: 8px; /* bordas arredondadas para a imagem */
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #f1f1f1;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <h3>Sistema Shop</h3>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <?php
                            echo '<a href="login.php">Fazer login</a> ou <a href="cadastro_usuario.php">Criar conta</a>';
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="quadrado">
                <h3>Cadastro de Produtos</h3>
                <p>Faça o cadastro eficiente de todos os produtos disponíveis em nosso sistema.</p>
                <img src="img/cadastro_produto.jpg" alt="Cadastro de Produtos">
            </div>
            <div class="quadrado">
                <h3>Cadastro de Clientes</h3>
                <p>Se torne um cliente agora mesmo fazendo seu cadastro e aproveite nossas ofertas!</p>
                <img src="img/cadastro_cliente.jpg" alt="Cadastro de Clientes">
            </div>
            <div class="quadrado">
                <h3>Relatórios de Vendas</h3>
                <p>Acompanhe o desempenho das vendas e tome decisões mais informadas.</p>
                <img src="img/relatorio_vendas.jpg" alt="Relatórios de Vendas">
            </div>
            <div class="quadrado">
                <h3>Suporte ao Cliente</h3>
                <p>Nosso suporte está disponível para ajudar você em qualquer dúvida ou problema.</p>
                <img src="img/suporte_cliente.jpg" alt="Suporte ao Cliente">
            </div>
        </div>
    </main>
</body>

</html>