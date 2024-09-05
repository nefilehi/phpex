<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <?php
  $num = $_GET['txtnum'];

  echo "<h3>Calcula Porcentagem</h3>";

  $porcentagem = ($num * 0.15);
  $desc = $num - $porcentagem;

  echo "15% de $num é: $porcentagem<br>";
  echo "Valor com desconto: R$$desc";
  ?>
</body>

</html>