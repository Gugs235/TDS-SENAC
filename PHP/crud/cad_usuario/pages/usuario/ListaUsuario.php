<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (!empty($usuarios)): ?>
        <h2>Usuários Cadastrados</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Senha</th>
                <th>Ações</th>
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

</body>

</html>