<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "files";
$conn = new mysqli($host, $usuario, $senha, $bd);

if ($conn->connect_error) {
    die("Erro na conexão:" . $conn->connect_error);
} else {
    echo ("conectado com sucesso!<br>");
}
