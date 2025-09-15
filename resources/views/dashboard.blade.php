<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Biblioteca Escolar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'orange-school': {
                            100: '#ffe8d6',
                            500: '#ff7700',
                            600: '#e56d00',
                            700: '#cc6200',
                            800: '#b25700',
                            900: '#994c00',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        .active-menu {
            background-color: #e56d00;
        }
        [x-cloak] { display: none !important; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 flex h-screen" x-data="{ openModal: false, modalType: '', sidebarOpen: window.innerWidth >= 768 }">
    <!-- Sidebar -->
    <div class="sidebar bg-orange-school-800 text-white w-64 fixed h-full overflow-y-auto z-10" :class="sidebarOpen ? 'ml-0' : 'ml-[-100%] md:ml-0'">
        <div class="p-5 text-center border-b border-orange-school-700">
            <h1 class="text-xl font-bold"><i class="fas fa-book mr-2"></i>BIBLIOTECA ESCOLAR</h1>
            <p class="text-sm text-orange-school-100 mt-1">Painel do Administrador</p>
        </div>
        
        <nav class="mt-6">
            <a href="#" class="px-4 py-3 flex items-center text-white active-menu">
                <i class="fas fa-tachometer-alt w-8 text-center"></i>
                <span class="ml-4">Dashboard</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-700" @click="openModal = true; modalType = 'book'">
                <i class="fas fa-book-open w-8 text-center"></i>
                <span class="ml-4">Acervo</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-700" @click="openModal = true; modalType = 'user'">
                <i class="fas fa-users w-8 text-center"></i>
                <span class="ml-4">Usuários</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-700" @click="openModal = true; modalType = 'loan'">
                <i class="fas fa-exchange-alt w-8 text-center"></i>
                <span class="ml-4">Empréstimos</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-700" @click="openModal = true; modalType = 'reservation'">
                <i class="fas fa-clock w-8 text-center"></i>
                <span class="ml-4">Reservas</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-700" @click="openModal = true; modalType = 'overdue'">
                <i class="fas fa-exclamation-circle w-8 text-center"></i>
                <span class="ml-4">Devoluções Atrasadas</span>
                <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">5</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-700" @click="openModal = true; modalType = 'report'">
                <i class="fas fa-chart-bar w-8 text-center"></i>
                <span class="ml-4">Relatórios</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-700" @click="openModal = true; modalType = 'settings'">
                <i class="fas fa-cog w-8 text-center"></i>
                <span class="ml-4">Configurações</span>
            </a>
        </nav>
        
        <div class="absolute bottom-0 w-full p-4 border-t border-orange-school-700">
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-700">
                <i class="fas fa-sign-out-alt w-8 text-center"></i>
                <span class="ml-4">Sair</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto" :class="sidebarOpen ? 'md:ml-64' : 'ml-0'">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="flex justify-between items-center p-4">
                <div class="flex items-center">
                    <button class="text-orange-school-800 mr-4 md:hidden" @click="sidebarOpen = !sidebarOpen">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Dashboard da Biblioteca</h1>
                        <p class="text-sm text-gray-500">Bem-vindo, Administrador</p>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="relative mr-4">
                        <input type="text" placeholder="Pesquisar..." class="bg-gray-100 rounded-full py-2 px-4 w-64 focus:outline-none focus:ring-2 focus:ring-orange-school-500">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-500"></i>
                    </div>
                    
                    <div class="relative mr-4">
                        <button class="bg-gray-200 rounded-full h-10 w-10">
                            <i class="fas fa-bell text-orange-school-800"></i>
                        </button>
                        <span class="absolute -top-1 -right-1 bg-orange-school-500 text-white rounded-full h-5 w-5 text-xs flex items-center justify-center">3</span>
                    </div>
                    
                    <div class="relative">
                        <button class="bg-orange-school-100 rounded-full h-10 w-10">
                            <i class="fas fa-user text-orange-school-800"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-6">
            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stats-card bg-white p-6 rounded-lg shadow-md border-l-4 border-orange-school-500">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500">Total de Livros</p>
                            <h2 class="text-3xl font-bold text-gray-800">2,543</h2>
                        </div>
                        <div class="bg-orange-school-100 p-3 rounded-full">
                            <i class="fas fa-book text-orange-school-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-green-500 text-sm mt-2"><i class="fas fa-arrow-up"></i> 5% desde o mês passado</p>
                </div>
                
                <div class="stats-card bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500">Empréstimos Ativos</p>
                            <h2 class="text-3xl font-bold text-gray-800">324</h2>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-exchange-alt text-blue-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-arrow-down"></i> 2% desde o mês passado</p>
                </div>
                
                <div class="stats-card bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500">Usuários Cadastrados</p>
                            <h2 class="text-3xl font-bold text-gray-800">1,258</h2>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-users text-green-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-green-500 text-sm mt-2"><i class="fas fa-arrow-up"></i> 10% desde o mês passado</p>
                </div>
                
                <div class="stats-card bg-white p-6 rounded-lg shadow-md border-l-4 border-red-500">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500">Devoluções Atrasadas</p>
                            <h2 class="text-3xl font-bold text-gray-800">47</h2>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-red-500 text-sm mt-2"><i class="fas fa-arrow-up"></i> 8% desde o mês passado</p>
                </div>
            </div>

            <!-- Charts and Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Empréstimos por Mês</h2>
                    <div class="h-64 flex items-end justify-around">
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-10 h-40 rounded-t"></div>
                            <p class="text-gray-500 mt-2">Jan</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-10 h-52 rounded-t"></div>
                            <p class="text-gray-500 mt-2">Fev</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-10 h-60 rounded-t"></div>
                            <p class="text-gray-500 mt-2">Mar</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-10 h-48 rounded-t"></div>
                            <p class="text-gray-500 mt-2">Abr</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-10 h-56 rounded-t"></div>
                            <p class="text-gray-500 mt-2">Mai</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-10 h-36 rounded-t"></div>
                            <p class="text-gray-500 mt-2">Jun</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Categorias de Livros</h2>
                    <div class="flex items-center justify-center">
                        <div class="relative w-48 h-48 rounded-full border-4 border-orange-school-500 flex items-center justify-center">
                            <div class="text-center">
                                <p class="text-2xl font-bold">12</p>
                                <p class="text-gray-500">Categorias</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-2">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-orange-school-500 rounded-full mr-2"></div>
                            <p class="text-sm">Literatura (32%)</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                            <p class="text-sm">Ciências (18%)</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                            <p class="text-sm">História (15%)</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                            <p class="text-sm">Matemática (12%)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities and Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Atividades Recentes</h2>
                        <a href="#" class="text-orange-school-500 text-sm">Ver todas</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-orange-school-100 p-2 rounded-full mr-3">
                                <i class="fas fa-exchange-alt text-orange-school-500"></i>
                            </div>
                            <div>
                                <p class="font-semibold">Novo empréstimo registrado</p>
                                <p class="text-gray-500 text-sm">Maria Silva pegou "Dom Casmurro" emprestado</p>
                                <p class="text-gray-400 text-xs">Há 2 minutos</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-green-100 p-2 rounded-full mr-3">
                                <i class="fas fa-undo-alt text-green-500"></i>
                            </div>
                            <div>
                                <p class="font-semibold">Devolução realizada</p>
                                <p class="text-gray-500 text-sm">João Santos devolveu "O Cortiço"</p>
                                <p class="text-gray-400 text-xs">Há 15 minutos</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-2 rounded-full mr-3">
                                <i class="fas fa-book text-blue-500"></i>
                            </div>
                            <div>
                                <p class="font-semibold">Novo livro adicionado</p>
                                <p class="text-gray-500 text-sm">"Memórias Póstumas de Brás Cubas" foi adicionado ao acervo</p>
                                <p class="text-gray-400 text-xs">Há 1 hora</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-red-100 p-2 rounded-full mr-3">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </div>
                            <div>
                                <p class="font-semibold">Atraso na devolução</p>
                                <p class="text-gray-500 text-sm">Pedro Alves está com "Iracema" atrasado</p>
                                <p class="text-gray-400 text-xs">Há 3 horas</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Ações Rápidas</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <button class="bg-orange-school-500 hover:bg-orange-school-600 text-white p-4 rounded-lg text-center transition duration-300" @click="openModal = true; modalType = 'newLoan'">
                            <i class="fas fa-exchange-alt text-2xl mb-2"></i>
                            <p>Novo Empréstimo</p>
                        </button>
                        
                        <button class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-lg text-center transition duration-300" @click="openModal = true; modalType = 'return'">
                            <i class="fas fa-undo-alt text-2xl mb-2"></i>
                            <p>Registrar Devolução</p>
                        </button>
                        
                        <button class="bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-lg text-center transition duration-300" @click="openModal = true; modalType = 'newBook'">
                            <i class="fas fa-book text-2xl mb-2"></i>
                            <p>Adicionar Livro</p>
                        </button>
                        
                        <button class="bg-purple-500 hover:bg-purple-600 text-white p-4 rounded-lg text-center transition duration-300" @click="openModal = true; modalType = 'newUser'">
                            <i class="fas fa-user-plus text-2xl mb-2"></i>
                            <p>Cadastrar Usuário</p>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal -->
    <div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-1/2 lg:w-1/3 max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center pb-4 border-b">
                    <h2 class="text-xl font-bold text-gray-800" x-text="modalType === 'newLoan' ? 'Novo Empréstimo' : 
                                                                        modalType === 'return' ? 'Registrar Devolução' :
                                                                        modalType === 'newBook' ? 'Adicionar Livro' :
                                                                        modalType === 'newUser' ? 'Cadastrar Usuário' : 'Detalhes'"></h2>
                    <button @click="openModal = false" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="mt-4">
                    <template x-if="modalType === 'newLoan'">
                        <div>
                            <p class="text-gray-600 mb-4">Registrar um novo empréstimo de livro</p>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Selecionar Usuário</label>
                                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50">
                                        <option>João Silva</option>
                                        <option>Maria Santos</option>
                                        <option>Pedro Alves</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Selecionar Livro</label>
                                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50">
                                        <option>Dom Casmurro</option>
                                        <option>O Cortiço</option>
                                        <option>Iracema</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Data de Devolução</label>
                                    <input type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </template>
                    
                    <template x-if="modalType === 'return'">
                        <div>
                            <p class="text-gray-600 mb-4">Registrar a devolução de um livro</p>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Código do Empréstimo</label>
                                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50" placeholder="Digite o código do empréstimo">
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="fine" class="rounded border-gray-300 text-orange-school-600 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50">
                                    <label for="fine" class="ml-2 block text-sm text-gray-700">Aplicar multa por atraso</label>
                                </div>
                            </div>
                        </div>
                    </template>
                    
                    <template x-if="modalType === 'newBook'">
                        <div>
                            <p class="text-gray-600 mb-4">Adicionar um novo livro ao acervo</p>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Título do Livro</label>
                                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Autor</label>
                                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">ISBN</label>
                                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </template>
                    
                    <template x-if="modalType === 'newUser'">
                        <div>
                            <p class="text-gray-600 mb-4">Cadastrar um novo usuário no sistema</p>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nome Completo</label>
                                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">E-mail</label>
                                    <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Tipo de Usuário</label>
                                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50">
                                        <option>Aluno</option>
                                        <option>Professor</option>
                                        <option>Funcionário</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                
                <div class="mt-6 flex justify-end space-x-3">
                    <button @click="openModal = false" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                        Cancelar
                    </button>
                    <button class="px-4 py-2 bg-orange-school-500 text-white rounded-md hover:bg-orange-school-600 focus:outline-none focus:ring-2 focus:ring-orange-school-500 focus:ring-opacity-50">
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script para destacar menu ativo
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('nav a');
            
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    menuItems.forEach(i => i.classList.remove('active-menu'));
                    this.classList.add('active-menu');
                });
            });
            
            // Fechar modal ao pressionar ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    openModal = false;
                }
            });
        });
    </script>
</body>
</html>