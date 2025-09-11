<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca do Cristo - Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #333;
            line-height: 1.6;
        }

        .header {
            background-color: #fff;
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background: #ff7700;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .logo-text {
            font-size: 1.6rem;
            font-weight: 700;
            color: #ff7700;
            letter-spacing: -0.5px;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 11px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
        }

        .btn-login {
            color: #ff7700;
            border: 2px solid #ff7700;
            background: transparent;
        }

        .btn-login:hover {
            background-color: #ff7700;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 119, 0, 0.2);
        }

        .btn-register {
            background-color: #ff7700;
            color: white;
            border: none;
        }

        .btn-register:hover {
            background-color: #e56a00;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 119, 0, 0.25);
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem 4rem;
            text-align: center;
        }

        .welcome-card {
            background: white;
            border-radius: 20px;
            padding: 3.5rem 3rem;
            box-shadow: 0 15px 50px rgba(0,0,0,0.08);
            max-width: 700px;
            width: 100%;
            margin: 2rem auto;
            position: relative;
            overflow: hidden;
        }

        .welcome-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #ff7700, #ffb347);
        }

        .admin-badge {
            display: inline-block;
            background: #fff8f0;
            color: #ff7700;
            font-weight: 700;
            padding: 0.4rem 1.2rem;
            border-radius: 30px;
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
            border: 1px solid #ffe0c0;
            box-shadow: 0 2px 6px rgba(255, 119, 0, 0.1);
        }

        h1 {
            font-size: 2.6rem;
            color: #ff7700;
            margin-bottom: 0.5rem;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .subtitle {
            font-size: 1.25rem;
            color: #555;
            margin-bottom: 1.8rem;
            font-weight: 500;
        }

        .divider {
            height: 4px;
            width: 70px;
            background: #ff7700;
            margin: 1.8rem auto;
            border-radius: 2px;
            position: relative;
        }

        .divider::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            background: #ffb347;
            top: 1px;
            left: 0;
        }

        .description {
            font-size: 1.15rem;
            color: #555;
            margin-bottom: 2.2rem;
            line-height: 1.7;
        }

        .admin-highlight {
            background: #fff8f0;
            border-left: 4px solid #ff7700;
            padding: 1.5rem;
            border-radius: 12px;
            margin: 2rem 0;
            text-align: left;
            box-shadow: 0 4px 12px rgba(255,119,0,0.06);
        }

        .admin-highlight p {
            margin: 0.5rem 0;
            font-size: 1.05rem;
            color: #444;
        }

        .admin-highlight p strong {
            color: #ff7700;
        }

        .admin-highlight i {
            color: #ff7700;
            margin-right: 8px;
        }

        h2 {
            font-size: 1.9rem;
            color: #ff7700;
            margin: 2rem 0 1.2rem;
            font-weight: 600;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }

        .feature {
            flex: 1;
            min-width: 160px;
            padding: 2rem 1.5rem;
            background: #fff8f0;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
            border: 1px solid #ffe0c0;
        }

        .feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 119, 0, 0.12);
        }

        .feature i {
            font-size: 2.6rem;
            color: #ff7700;
            margin-bottom: 1.1rem;
            display: block;
            transition: transform 0.3s ease;
        }

        .feature:hover i {
            transform: scale(1.1);
        }

        .feature h3 {
            color: #ff7700;
            margin-bottom: 0.7rem;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .feature p {
            margin-bottom: 0;
            font-size: 0.95rem;
            color: #777;
        }

        .footer {
            text-align: center;
            padding: 2rem;
            background: #fff;
            border-top: 1px solid #f0f0f0;
            color: #777;
            font-size: 0.95rem;
            margin-top: 2rem;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.03);
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 1.2rem;
                gap: 1rem;
            }

            .logo-text {
                font-size: 1.4rem;
            }

            .welcome-card {
                padding: 2.5rem 1.8rem;
                margin: 1rem;
            }

            h1 {
                font-size: 2.1rem;
            }

            .features {
                flex-direction: column;
                gap: 1.5rem;
            }

            .admin-highlight {
                padding: 1.2rem;
                margin: 1.5rem 0;
            }

            .admin-highlight p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-book"></i>
            </div>
            <div class="logo-text">Biblioteca do Cristo</div>
        </div>
        <div class="nav-buttons">
            <a href="{{ route('login') }}" class="btn btn-login">Entrar</a>
            <a href="{{ route('register') }}" class="btn btn-register">Criar Conta</a>
        </div>
    </header>

    <main class="main-content">
        <div class="welcome-card">
            <!-- Badge destacando que é o administrador -->
            <span class="admin-badge">
                <i class="fas fa-user-shield"></i> Área Administrativa
            </span>

            <h1>Bem-vindo à Biblioteca do Cristo</h1>
            <p class="subtitle">Painel de Gerenciamento do Colégio Cristo</p>

            <div class="divider"></div>

            <p class="description">
                Uma plataforma moderna e intuitiva para gerenciar acervo, usuários e eventos com eficiência e praticidade.
            </p>

            <!-- Seção integrada para administrador -->
            <div class="admin-highlight">
                <p><i class="fas fa-hand-sparkles"></i> <strong>Bem-vindo, Administrador!</strong></p>
                <p>Você tem acesso total ao sistema para gerenciar <strong>acervo</strong>, <strong>usuários</strong> e <strong>eventos</strong>.</p>
                <p>Utilize os botões acima para <strong>entrar</strong> ou <strong>criar novas contas</strong> de colaboradores.</p>
            </div>

            <h2>Principais Recursos</h2>

            <div class="features">
                <div class="feature">
                    <i class="fas fa-book-open"></i>
                    <h3>Acervo Digital</h3>
                    <p>Livros, periódicos e materiais</p>
                </div>
                <div class="feature">
                    <i class="fas fa-users"></i>
                    <h3>Gerenciamento de Usuários</h3>
                    <p>Controle de acesso e perfis</p>
                </div>
                <div class="feature">
                    <i class="fas fa-calendar-alt"></i>
                    <h3>Agenda de Eventos</h3>
                    <p>Atividades culturais e empréstimos</p>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p>© {{ date('Y') }} Biblioteca do Cristo. Todos os direitos reservados.</p>
    </footer>
</body>
</html>