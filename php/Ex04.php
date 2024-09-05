<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <?php
  $idade = $_POST['txtnum'];

  echo "<h3>Exercicio 04</h3>";
  if ($idade >= 10) {
    echo "<p>Parabéns! Você está apto para participar da excursão!</p>";
  }
  echo "<p>Programa encerrado</p>";
  ?>
</body>

</html>