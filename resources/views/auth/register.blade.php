<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Laranja e Branco</title>
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

        .register-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(255, 107, 53, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            position: relative;
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #ff6b35, #f7931e, #ff8c42);
        }

        .register-header {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            text-align: center;
            padding: 35px 30px 25px;
            position: relative;
        }

        .register-header h1 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .register-header p {
            opacity: 0.9;
            font-size: 1rem;
        }

        .register-form {
            padding: 35px 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .form-label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #e5e5e5;
            border-radius: 10px;
            font-size: 0.95rem;
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
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 25px;
        }

        .login-link {
            color: #ff6b35;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-link:hover {
            color: #e55a2b;
            text-decoration: underline;
        }

        .register-button {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
        }

        .register-button:active {
            transform: translateY(0);
        }

        /* Responsividade */
        @media (max-width: 600px) {
            .register-container {
                margin: 10px;
                border-radius: 16px;
            }

            .register-header {
                padding: 25px 20px 20px;
            }

            .register-header h1 {
                font-size: 1.6rem;
            }

            .register-form {
                padding: 25px 20px;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .register-button {
                width: 100%;
                margin-top: 10px;
            }
        }

        @media (max-width: 480px) {
            .form-input {
                padding: 11px 12px;
                font-size: 0.9rem;
            }
            
            .form-label {
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1>Criar Conta</h1>
            <p>Preencha os dados para se cadastrar</p>
        </div>

        <form class="register-form" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name" class="form-label">Nome</label>
                <input 
                    id="name" 
                    class="form-input" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Digite seu nome completo"
                />
                <div class="error-message" style="display: none;">
                    Mensagem de erro do nome
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input 
                    id="email" 
                    class="form-input" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="username"
                    placeholder="Digite seu email"
                />
                <div class="error-message" style="display: none;">
                    Mensagem de erro do email
                </div>
            </div>

            <!-- CPF -->
            <div class="form-group">
                <label for="cpf" class="form-label">CPF</label>
                <input 
                    id="cpf" 
                    class="form-input"
                    type="text"
                    name="cpf"
                    value="{{ old('cpf') }}"
                    autocomplete="newcpf"
                    placeholder="999.999.999-99"
                />
                <div class="error-message" style="display: none;">
                    Mensagem de erro do CPF
                </div>
            </div>

            <!-- Password Row -->
            <div class="form-row">
                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Senha</label>
                    <input 
                        id="password" 
                        class="form-input"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        placeholder="Digite sua senha"
                    />
                    <div class="error-message" style="display: none;">
                        Mensagem de erro da senha
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                    <input 
                        id="password_confirmation" 
                        class="form-input"
                        type="password"
                        name="password_confirmation" 
                        autocomplete="new-password"
                        placeholder="Confirme sua senha"
                    />
                    <div class="error-message" style="display: none;">
                        Mensagem de erro da confirmação
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <a class="login-link" href="{{ route('login') }}">
                    Já tem uma conta?
                </a>
                <button type="submit" class="register-button">
                    Cadastrar
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
                this.parentElement.style.transform = 'translateY(-1px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Validação visual da confirmação de senha
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password_confirmation');

        function validatePasswordMatch() {
            if (passwordConfirm.value && password.value !== passwordConfirm.value) {
                passwordConfirm.style.borderColor = '#e53e3e';
            } else {
                passwordConfirm.style.borderColor = '#e5e5e5';
            }
        }

        password.addEventListener('input', validatePasswordMatch);
        passwordConfirm.addEventListener('input', validatePasswordMatch);
    </script>
</body>
</html>