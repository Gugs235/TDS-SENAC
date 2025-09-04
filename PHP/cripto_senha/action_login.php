<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $conn->real_escape_string($_POST['usuario']);
    $senha   = $conn->real_escape_string($_POST['senha']);

    $sql = "SELECT id, nome, senha FROM usuarios WHERE usuario = '$usuario' LIMIT 1";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();

        if (password_verify($senha, $user['senha'])) {
            echo "Login bem-sucedido! Bem-vindo, " . $user['nome'];
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $conn->close();
}

?>