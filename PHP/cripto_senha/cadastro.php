<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome    = $conn->real_escape_string($_POST['nome']);
    $usuario = $conn->real_escape_string($_POST['usuario']);
    $senha   = $conn->real_escape_string($_POST['senha']);

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, usuario, senha) VALUES ('$nome', '$usuario', '$senhaHash')";

    if ($conn->query($sql)){
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }

    $conn->close();
}



?>