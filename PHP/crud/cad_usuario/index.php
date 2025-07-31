<?php

require 'Usuario.php';

$objUsuario = new Usuario();


if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $objUsuario->nome = $nome;
    $objUsuario->senha = $senha;

    $res = $objUsuario->cadastrar();

    if ($res) {
        echo '<script> alert("Cadastrado com sucesso")</script>';
    } else {
        echo '<script> alert("Falha no cadastro")</script>';
    }
}

// Carrega todos os usuários sempre
$usuarios = $objUsuario->listar_todos();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="" method="post">
            <input type="hidden" name="id" id="id">
            <input type="text" name="nome" id="nome">
            <input type="text" name="senha" id="senha">
            <button type="submit" name="cadastrar" id="submitButton">Cadastrar</button>
        </form>
    </div>

    <div>
        <!-- Botão para listar usuários (toggle) -->
        <button type="button" id="toggleLista" style="margin-top:10px;">Listar Usuários</button>

        <div id="listaUsuarios" style="display:none;">
            <h3>Lista de Usuários</h3>
            <ul>
                <?php foreach ($usuarios as $usuario): ?>
                    <li><?php echo htmlspecialchars($usuario['nome']); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <script>
        const btn = document.getElementById('toggleLista');
        const lista = document.getElementById('listaUsuarios');
        btn.addEventListener('click', function() {
            if (lista.style.display === 'none') {
                lista.style.display = 'block';
                btn.textContent = 'Ocultar Usuários';
            } else {
                lista.style.display = 'none';
                btn.textContent = 'Listar Usuários';
            }
        });
    </script>
</body>

</html>