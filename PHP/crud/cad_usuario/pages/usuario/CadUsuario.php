<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header('Location: ../../index.php');
}



require_once __DIR__ . '/../../controller/UsuarioController.php';

$objUsuario = new Usuario();

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $objUsuario->nome = $nome;
    $objUsuario->senha = $senha;

    $res = $objUsuario->cadastrar();

    echo '<script>alert("' . ($res ? 'Cadastro com sucesso' : 'Falha no Cadastro') . '")</script>';
}

$usuarios = [];

if (isset($_POST['listar'])) {
    $usuarios = $objUsuario->listar_todos();
}

if (isset($_GET['delete_id'])) {
    $id_user = $_GET['delete_id'];
    $objUsuario->deletar($id_user);
    $usuarios = $objUsuario->listar_todos();
}

if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $objUsuario->id = $id;
    $objUsuario->nome = $nome;
    $objUsuario->senha = $senha;

    $res = $objUsuario->atualizar();
    echo '<script> alert("' . ($res ? 'Editado com sucesso' : 'Falha na Edição') . '") </script>';

    $usuarios = $objUsuario->listar_todos();
}



?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: white;
            text-align: center;
            margin: 0;
            padding: 40px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px auto;
            display: block;
            border-radius: 5px;
            border: none;
        }

        button {
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.1);
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            color: white;
        }

        a img {
            cursor: pointer;
        }

        a:hover img {
            filter: brightness(0.7);
        }

        p {
            margin-top: 20px;
            color: #ccc;
        }
    </style>


    <script>
        function carregaDados(id, nome, senha) {
            console.log(id, nome, senha);
            document.getElementById("id").value = id;

            document.getElementById("nome").value = nome;
            document.getElementById("senha").value = senha;

            document.getElementById("submitButton").name = 'editar';
            document.getElementById("submitButton").innerText = 'editar';
        }
    </script>


</head>

<body>

    <div class="container">
        <h2>Cadastrar Novo Usuário</h2>
        <form method="POST">
            <input type="hidden" id="id" name="id" value="">
            <input type="text" id="nome" name="nome" placeholder="Nome" required>
            <input type="text" id="senha" name="senha" placeholder="Senha" required>
            <button type="submit" name="cadastrar" id="submitButton">Cadastrar</button>
        </form>

        <!-- botão para listar usuarios -->
        <form method="POST" style="margin-top: 20px;">
            <button type="submit" name="listar">Listar Usuários</button>
        </form>


        <?php if (!empty($usuarios)): ?>
            <h2>Usuários Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Apagar</th>
                    <th>Editar</th>
                </tr>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['id']) ?></td>
                        <td><?= htmlspecialchars($usuario['nome']) ?></td>
                        <td><?= htmlspecialchars($usuario['senha']) ?></td>
                        <!-- botão apagar -->
                        <td>
                            <a href="?delete_id=<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja remover este usuário?')">
                                <img width="20" src="https://img.icons8.com/ios-glyphs/30/filled-trash.png" alt="Excluir" />
                            </a>
                        </td>

                        <td>
                            <!-- botão editar -->
                            <button type="button" onclick="carregaDados(
                                '<?= htmlspecialchars($usuario['id']) ?>',
                                '<?= htmlspecialchars($usuario['nome']) ?>',
                                '<?= htmlspecialchars($usuario['senha']) ?>')">
                                <img width="20" src="https://img.icons8.com/ios-glyphs/30/edit--v1.png" alt="edit--v1">
                            </button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Nenhum usuário cadastrado.</p>
        <?php endif; ?>
    </div>

</body>

</html>