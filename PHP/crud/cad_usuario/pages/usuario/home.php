<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header('Location: ../../index.php');
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Locadora de Carros</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: #fff;
        }

        /* HEADER */
        header {
            position: sticky;
            top: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 50px;
            background: rgba(0, 0, 0, 0.6);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .brand {
            font-size: 1.8rem;
            color: #ffcc00;
            font-weight: 700;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            margin: 0 12px;
        }

        nav a:hover {
            color: #ffcc00;
        }

        /* actions (SEUS FORMS) */
        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .actions form {
            display: inline;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-weight: 700;
            cursor: pointer;
            transition: transform .08s ease, filter .2s ease;
        }

        .btn:active {
            transform: translateY(1px);
        }

        .btn_user {
            background: #4CAF50;
            color: #fff;
        }

        .btn_user:hover {
            filter: brightness(0.92);
        }

        .btn_log {
            background: #c0392b;
            color: #fff;
        }

        .btn_log:hover {
            filter: brightness(0.92);
        }

        /* HERO */
        .hero {
            height: 60vh;
            min-height: 420px;
            display: grid;
            place-items: center;
            text-align: center;
            background: url('https://images.unsplash.com/photo-1605559424843-9a3a65cfb5c2') no-repeat center/cover;
            position: relative;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .55);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            padding: 0 20px;
        }

        .hero h2 {
            font-size: 2.6rem;
            margin-bottom: 12px;
        }

        .hero p {
            font-size: 1.15rem;
            color: #e6e6e6;
            margin-bottom: 20px;
        }

        .hero .btn-cta {
            background: #ffcc00;
            color: #000;
        }

        .hero .btn-cta:hover {
            filter: brightness(0.92);
        }

        /* CARDS */
        .section {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .section h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 24px;
        }

        .cars-grid {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .car-card {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            overflow: hidden;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .car-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, .35);
            background: rgba(255, 255, 255, 0.09);
        }

        .car-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .car-card .content {
            padding: 16px;
        }

        .car-card h3 {
            font-size: 1.15rem;
            margin-bottom: 6px;
        }

        .car-card p {
            color: #d3d3d3;
            margin-bottom: 10px;
        }

        .price {
            font-weight: 700;
            color: #ffcc00;
            margin-bottom: 12px;
            display: block;
        }

        .car-card .btn {
            background: #ffcc00;
            color: #000;
        }

        /* BENEFÍCIOS */
        .benefits {
            display: grid;
            gap: 18px;
            max-width: 1000px;
            margin: 45px auto 0;
            padding: 0 20px;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .benefit-card {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
        }

        .benefit-card h4 {
            color: #ffcc00;
            margin-bottom: 8px;
        }

        /* FOOTER */
        footer {
            margin-top: 60px;
            padding: 22px;
            text-align: center;
            background: rgba(0, 0, 0, 0.75);
            color: #cfcfcf;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
        }

        /* layout helper */
        .header-right {
            display: flex;
            align-items: center;
            gap: 24px;
        }
    </style>
</head>

<body>

    <header>
        <div class="brand">AutoPrime</div>

        <div class="header-right">
            <nav>
                <a href="#">Home</a>
                <a href="#">Estoque</a>
                <a href="#">Aluguel</a>
                <a href="#">Contato</a>
            </nav>

            <!-- >>> seus forms (CADASTRAR e SAIR) no header, lado a lado <<< -->
            <div class="actions">
                <form method="POST" action="../../routers/HomeRouter.php?acao=cadastrar">
                    <button type="submit" class="btn btn_user">Cadastrar</button>
                </form>

                <form method="POST" action="../../routers/HomeRouter.php?acao=listar">
                    <button type="submit" class="btn btn_list">Lista</button>
                </form>

                <form method="POST" action="../../routers/HomeRouter.php?acao=sair">
                    <button type="submit" class="btn btn_log">Sair</button>
                </form>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h2>O carro ideal para você está aqui</h2>
            <p>Venda e aluguel com qualidade, segurança e rapidez</p>
            <button class="btn btn-cta">Ver Estoque</button>
        </div>
    </section>

    <section class="section">
        <h2>Carros em Destaque</h2>
        <div class="cars-grid">
            <article class="car-card">
                <img src="https://images.unsplash.com/photo-1597007510321-d51c1b11316b" alt="Honda Civic 2022">
                <div class="content">
                    <h3>Honda Civic 2022</h3>
                    <span class="price">R$ 120.000 • R$ 300/dia</span>
                    <p>Completo, baixo consumo e ótimo desempenho.</p>
                    <button class="btn">Ver mais</button>
                </div>
            </article>

            <article class="car-card">
                <img src="https://images.unsplash.com/photo-1589394811180-bd03d1b53a48" alt="Jeep Compass 2021">
                <div class="content">
                    <h3>Jeep Compass 2021</h3>
                    <span class="price">R$ 145.000 • R$ 350/dia</span>
                    <p>Conforto, tecnologia e traçado firme em qualquer terreno.</p>
                    <button class="btn">Ver mais</button>
                </div>
            </article>

            <article class="car-card">
                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70" alt="BMW X1 2023">
                <div class="content">
                    <h3>BMW X1 2023</h3>
                    <span class="price">R$ 280.000 • R$ 700/dia</span>
                    <p>Premium, potente e com pacote de segurança completo.</p>
                    <button class="btn">Ver mais</button>
                </div>
            </article>
        </div>
    </section>

    <section class="benefits">
        <div class="benefit-card">
            <h4>Entrega Rápida</h4>
            <p>Levamos o carro até você com segurança e agilidade.</p>
        </div>
        <div class="benefit-card">
            <h4>Planos Flexíveis</h4>
            <p>Venda ou aluguel sob medida para o seu bolso.</p>
        </div>
        <div class="benefit-card">
            <h4>Carros Revisados</h4>
            <p>Todos os veículos passam por inspeção rigorosa.</p>
        </div>
        <div class="benefit-card">
            <h4>Suporte 24h</h4>
            <p>Atendimento rápido e dedicado para você.</p>
        </div>
    </section>

    <footer>
        © 2025 AutoPrime — Todos os direitos reservados • (11) 5555-5555
    </footer>

</body>

</html>