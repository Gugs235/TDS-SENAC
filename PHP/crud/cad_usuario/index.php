<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
        color: white;
        text-align: center;
        margin: 0;
        padding: 40px;
    }

    .container {
        max-width: 400px;
        margin: auto;
        background: rgba(255, 255, 255, 0.05);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
    }

    h2 {
        margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"] {
        width: 90%;
        padding: 10px;
        margin: 10px auto;
        display: block;
        border-radius: 5px;
        border: none;
        outline: none;
    }

    button {
        padding: 10px 20px;
        margin-top: 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    p {
        margin-top: 15px;
        color: #ccc;
    }
</style>

<body>

    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="./routers/loginRouter.php?acao=validarLogin">
            <div>
                <input type="text" name="nome" placeholder="Nome">
                <input type="text" name="senha" placeholder="Senha">
                <button type="submit"> Logar</button>
            </div>
        </form>
        <p>Não tem conta? <a href="pages/usuario/CadUsuario.php" style="color:#4CAF50;">Cadastre-se</a></p>
    </div>

</body>