<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laranja e Branco</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff8c42 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(255, 107, 53, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
            position: relative;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #ff6b35, #f7931e, #ff8c42);
        }

        .login-header {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            text-align: center;
            padding: 40px 30px 30px;
            position: relative;
        }

        .login-header h1 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .login-header p {
            opacity: 0.9;
            font-size: 1rem;
        }

        .login-form {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e5e5e5;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-input:focus {
            outline: none;
            border-color: #ff6b35;
            background: white;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }

        .error-message {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 6px;
        }

        .remember-section {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            accent-color: #ff6b35;
            cursor: pointer;
        }

        .remember-label {
            color: #666;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 30px;
        }

        .forgot-password {
            color: #ff6b35;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #e55a2b;
            text-decoration: underline;
        }

        .login-button {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            border: none;
            padding: 14px 32px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .status-message {
            background: #e6fffa;
            border: 1px solid #38d9a9;
            color: #087f5b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        /* Responsividade */
        @media (max-width: 480px) {
            .login-container {
                margin: 10px;
                border-radius: 16px;
            }

            .login-header {
                padding: 30px 20px 20px;
            }

            .login-header h1 {
                font-size: 1.6rem;
            }

            .login-form {
                padding: 30px 20px;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .login-button {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Bem-vindo</h1>
            <p>Faça login em sua conta</p>
        </div>

        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Status Message -->
            <div class="status-message" style="display: none;">
                Mensagem de status aqui
            </div>

            <!-- CPF Field -->
            <div class="form-group">
                <label for="cpf" class="form-label">CPF</label>
                <input 
                    id="cpf" 
                    class="form-input" 
                    type="text" 
                    name="cpf" 
                    value="{{ old('cpf') }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                    placeholder="Digite seu CPF"
                />
                <div class="error-message" style="display: none;">
                    Mensagem de erro do CPF
                </div>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password" class="form-label">Senha</label>
                <input 
                    id="password" 
                    class="form-input"
                    type="password"
                    name="password"
                    required 
                    autocomplete="current-password"
                    placeholder="Digite sua senha"
                />
                <div class="error-message" style="display: none;">
                    Mensagem de erro da senha
                </div>
            </div>

            <!-- Remember Me -->
            <div class="remember-section">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="checkbox" 
                    name="remember"
                >
                <label for="remember_me" class="remember-label">
                    Lembrar de mim
                </label>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <a class="forgot-password" href="{{ route('password.request') }}">
                    Esqueceu sua senha?
                </a>
                <button type="submit" class="login-button">
                    Entrar
                </button>
            </div>
        </form>
    </div>

    <script>
        // Máscara para CPF
        document.getElementById('cpf').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            e.target.value = value;
        });

        // Efeito visual nos inputs
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>