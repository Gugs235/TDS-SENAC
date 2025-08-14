<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header('Location: ../../index.php');
}

require_once __DIR__ . '/../../controller/veiculoController.php';

$objVeiculos = new Veiculos();

if (isset($_POST['cadastrar_veiculos'])) {
    $fabricante = $_POST['fabricante'];
    $modelo = $_POST['modelo'];
    $ano_fabricacao = $_POST['ano_fabricacao'];
    $tipo_combustivel = $_POST['tipo_combustivel'];
    $nome_proprietario = $_POST['nome_proprietario'];
    $email_proprietario = $_POST['email_proprietario'];
    $telefone_proprietario = $_POST['telefone_proprietario'];

    $objVeiculos->fabricante = $fabricante;
    $objVeiculos->modelo = $modelo;
    $objVeiculos->ano_fabricacao = $ano_fabricacao;
    $objVeiculos->tipo_combustivel = $tipo_combustivel;
    $objVeiculos->nome_proprietario = $nome_proprietario;
    $objVeiculos->email_proprietario = $email_proprietario;
    $objVeiculos->telefone_proprietario = $telefone_proprietario;

    $res = $objVeiculos->cadastrar_veiculo();

    echo '<script>alert("' . ($res ? 'Cadastro do veiculo com sucesso' : 'Falha no Cadastro do veiculo') . '")</script>';
}

$veiculo = [];

if (isset($_POST['listar'])) {
    $veiculo = $objVeiculos->listar_todos_veiculos();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veiculos</title>

    <script>
        function carregaDadosVeiculo(id, nome, senha) {
            console.log(id, nome, senha);
            document.getElementById("id").value = id;
            document.getElementById("fabricante").value = fabricante;
            document.getElementById("modelo").value = modelo;
            document.getElementById("ano_fabricacao").value = ano_fabricacao;
            document.getElementById("tipo_combustivel").value = tipo_combustivel;
            document.getElementById("nome_proprietario").value = nome_proprietario;
            document.getElementById("email_proprietario").value = email_proprietario;
            document.getElementById("telefone_proprietario").value = telefone_proprietario;

            document.getElementById("submitButton").name = 'editar';
            document.getElementById("submitButton").innerText = 'editar';
        }
    </script>

</head>

<body>
    <?php if (!empty($veiculos)): ?>
        <h2>Usuários Cadastrados</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Senha</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($veiculos as $veiculo): ?>
                <tr>
                    <td><?= htmlspecialchars($veiculo['fabricante']) ?></td>
                    <td><?= htmlspecialchars($veiculo['modelo']) ?></td>
                    <td><?= htmlspecialchars($veiculo['ano_fabricacao']) ?></td>
                    <td><?= htmlspecialchars($veiculo['tipo_combustivel']) ?></td>
                    <td><?= htmlspecialchars($veiculo['nome_proprietario']) ?></td>
                    <td><?= htmlspecialchars($veiculo['email_proprietario']) ?></td>
                    <td><?= htmlspecialchars($veiculo['telefone_proprietario']) ?></td>

                    <!-- botão apagar -->
                    <td>
                        <a href="?delete_id=<?= $veiculo['id'] ?>" onclick="return confirm('Tem certeza que deseja remover este veiculo?')">
                            <img width="20" src="https://img.icons8.com/ios-glyphs/30/filled-trash.png" alt="Excluir" />
                        </a>
                    </td>

                    <td>
                        <!-- botão editar -->
                        <button type="button" onclick="carregaDadosVeiculo(
                                '<?= htmlspecialchars($veiculo['id']) ?>',
                                '<?= htmlspecialchars($veiculo['fabricante']) ?>',
                                '<?= htmlspecialchars($veiculo['modelo']) ?>')>
                                '<?= htmlspecialchars($veiculo['ano_fabricacao']) ?>')>
                                '<?= htmlspecialchars($veiculo['tipo_combustivel']) ?>')>
                                '<?= htmlspecialchars($veiculo['nome_proprietario']) ?>')>
                                '<?= htmlspecialchars($veiculo['email_proprietario']) ?>')>
                                '<?= htmlspecialchars($veiculo['telefone_proprietario']) ?>')">

                            <img width="20" src="https://img.icons8.com/ios-glyphs/30/edit--v1.png" alt="edit--v1">
                        </button>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Nenhum veiculo cadastrado.</p>
    <?php endif; ?>

</body>


</html>