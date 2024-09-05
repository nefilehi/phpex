<?php

$pt = $_POST['pt'];
$qt = $_POST['qt'];
$razao = $_POST['razao'];
echo "Progressão geometrica: <br>";

$aux = $pt;
for ($i = $pt; $i <= $qt; $i++) {
   echo $aux . "<br>";
   $aux = $aux * $razao;
}
