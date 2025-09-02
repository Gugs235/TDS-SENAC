<?php

$nome = $_POST['nome'];
$sistema = $_POST['sistema'];
$sistemas = $_POST['sistemas'];

echo "O nome digitado foi: $nome<br>";

echo "O sistema operacional selecionado foi: $sistema<br>";

for ($i = 0; $i < count($sistemas); $i++) {
    echo "O sistema JÁ USADO é: " . $sistemas[$i] . "<br>";
}
