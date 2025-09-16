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
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .sidebar {
            transition: all 0.3s ease;
        }
        
        .stats-card {
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }
        
        .stats-card:hover {
            transform: translateY(-3px);
        }
        
        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
        }
        
        .stats-card:nth-child(1)::before { background-color: #ff7700; }
        .stats-card:nth-child(2)::before { background-color: #3b82f6; }
        .stats-card:nth-child(3)::before { background-color: #10b981; }
        .stats-card:nth-child(4)::before { background-color: #ef4444; }
        
        .active-menu {
            background-color: #e56d00;
            border-left: 4px solid white;
        }
        
        .nav-item {
            transition: all 0.2s ease;
        }
        
        .chart-bar {
            transition: all 0.3s ease;
        }
        
        .chart-bar:hover {
            opacity: 0.8;
        }
        
        .activity-item {
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }
        
        .activity-item:hover {
            background-color: #f9fafb;
            border-left-color: #ff7700;
        }
        
        .quick-action-btn {
            transition: all 0.3s ease;
        }
        
        .quick-action-btn:hover {
            transform: translateY(-2px);
        }
        
        .modal-content {
            animation: fadeIn 0.3s ease-out;
        }
        
        [x-cloak] { display: none !important; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #ff7700;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #e56d00;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50 flex h-screen" x-data="{ openModal: false, modalType: '', sidebarOpen: window.innerWidth >= 768 }">
    <!-- Sidebar -->
    <div class="sidebar bg-orange-school-700 text-white w-64 fixed h-full overflow-y-auto z-10" :class="sidebarOpen ? 'ml-0' : 'ml-[-100%] md:ml-0'">
        <div class="p-5 text-center border-b border-orange-school-600">
            <div class="flex items-center justify-center mb-2">
                <i class="fas fa-book text-3xl text-orange-school-100"></i>
            </div>
            <h1 class="text-xl font-bold">BIBLIOTECA ESCOLAR</h1>
            <p class="text-sm text-orange-school-100 mt-1">Painel do Administrador</p>
        </div>
        
        <nav class="mt-6">
            <a href="#" class="px-4 py-3 flex items-center text-white active-menu nav-item">
                <i class="fas fa-tachometer-alt w-6 text-center"></i>
                <span class="ml-4">Dashboard</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-600 nav-item" @click="openModal = true; modalType = 'book'">
                <i class="fas fa-book-open w-6 text-center"></i>
                <span class="ml-4">Acervo</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-600 nav-item" @click="openModal = true; modalType = 'user'">
                <i class="fas fa-users w-6 text-center"></i>
                <span class="ml-4">Usuários</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-600 nav-item" @click="openModal = true; modalType = 'loan'">
                <i class="fas fa-exchange-alt w-6 text-center"></i>
                <span class="ml-4">Empréstimos</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-600 nav-item" @click="openModal = true; modalType = 'reservation'">
                <i class="fas fa-clock w-6 text-center"></i>
                <span class="ml-4">Reservas</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-600 nav-item" @click="openModal = true; modalType = 'overdue'">
                <i class="fas fa-exclamation-circle w-6 text-center"></i>
                <span class="ml-4">Devoluções Atrasadas</span>
                <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">5</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-600 nav-item" @click="openModal = true; modalType = 'report'">
                <i class="fas fa-chart-bar w-6 text-center"></i>
                <span class="ml-4">Relatórios</span>
            </a>
            
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-600 nav-item" @click="openModal = true; modalType = 'settings'">
                <i class="fas fa-cog w-6 text-center"></i>
                <span class="ml-4">Configurações</span>
            </a>
        </nav>
        
        <div class="absolute bottom-0 w-full p-4 border-t border-orange-school-600">
            <a href="#" class="px-4 py-3 flex items-center text-orange-school-100 hover:bg-orange-school-600 nav-item">
                <i class="fas fa-sign-out-alt w-6 text-center"></i>
                <span class="ml-4">Sair</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto" :class="sidebarOpen ? 'md:ml-64' : 'ml-0'">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="flex justify-between items-center p-4">
                <div class="flex items-center">
                    <button class="text-orange-school-700 mr-4 md:hidden" @click="sidebarOpen = !sidebarOpen">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Dashboard da Biblioteca</h1>
                        <p class="text-sm text-gray-500">Bem-vindo, Administrador</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="relative hidden md:block">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" placeholder="Pesquisar..." class="bg-gray-100 rounded-full py-2 pl-10 pr-4 w-64 focus:outline-none focus:ring-2 focus:ring-orange-school-500 focus:bg-white transition-all duration-300">
                    </div>
                    
                    <div class="relative">
                        <button class="bg-gray-100 rounded-full h-10 w-10 flex items-center justify-center hover:bg-gray-200 transition-colors duration-300">
                            <i class="fas fa-bell text-orange-school-700"></i>
                        </button>
                        <span class="absolute -top-1 -right-1 bg-orange-school-500 text-white rounded-full h-5 w-5 text-xs flex items-center justify-center">3</span>
                    </div>
                    
                    <div class="relative">
                        <button class="bg-orange-school-100 rounded-full h-10 w-10 flex items-center justify-center hover:bg-orange-school-200 transition-colors duration-300">
                            <i class="fas fa-user text-orange-school-700"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-6">
            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stats-card bg-white p-5 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total de Livros</p>
                            <h2 class="text-2xl font-bold text-gray-800 mt-1">2,543</h2>
                            <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 5% desde o mês passado</p>
                        </div>
                        <div class="bg-orange-school-100 p-3 rounded-full">
                            <i class="fas fa-book text-orange-school-500 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card bg-white p-5 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Empréstimos Ativos</p>
                            <h2 class="text-2xl font-bold text-gray-800 mt-1">324</h2>
                            <p class="text-red-500 text-xs mt-2"><i class="fas fa-arrow-down"></i> 2% desde o mês passado</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-exchange-alt text-blue-500 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card bg-white p-5 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Usuários Cadastrados</p>
                            <h2 class="text-2xl font-bold text-gray-800 mt-1">1,258</h2>
                            <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 10% desde o mês passado</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-users text-green-500 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card bg-white p-5 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Devoluções Atrasadas</p>
                            <h2 class="text-2xl font-bold text-gray-800 mt-1">47</h2>
                            <p class="text-red-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 8% desde o mês passado</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-5 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-lg font-bold text-gray-800">Empréstimos por Mês</h2>
                        <div class="flex space-x-2">
                            <span class="px-2 py-1 bg-orange-school-100 text-orange-school-800 text-xs rounded-full">2023</span>
                        </div>
                    </div>
                    <div class="h-60 flex items-end justify-around">
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-8 h-40 rounded-t hover:bg-orange-school-600 chart-bar" style="height: 40%"></div>
                            <p class="text-gray-500 text-xs mt-2">Jan</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-8 h-52 rounded-t hover:bg-orange-school-600 chart-bar" style="height: 52%"></div>
                            <p class="text-gray-500 text-xs mt-2">Fev</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-8 h-60 rounded-t hover:bg-orange-school-600 chart-bar" style="height: 60%"></div>
                            <p class="text-gray-500 text-xs mt-2">Mar</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-8 h-48 rounded-t hover:bg-orange-school-600 chart-bar" style="height: 48%"></div>
                            <p class="text-gray-500 text-xs mt-2">Abr</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-8 h-56 rounded-t hover:bg-orange-school-600 chart-bar" style="height: 56%"></div>
                            <p class="text-gray-500 text-xs mt-2">Mai</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="bg-orange-school-500 w-8 h-36 rounded-t hover:bg-orange-school-600 chart-bar" style="height: 36%"></div>
                            <p class="text-gray-500 text-xs mt-2">Jun</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-5 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-lg font-bold text-gray-800">Categorias de Livros</h2>
                    </div>
                    <div class="flex items-center justify-center relative">
                        <div class="relative w-40 h-40">
                            <svg class="w-full h-full" viewBox="0 0 100 100">
                                <!-- Setor Literatura -->
                                <circle class="text-orange-school-500" stroke="currentColor" stroke-width="10" fill="transparent" r="40" cx="50" cy="50" stroke-dasharray="126 251" stroke-dashoffset="0" />
                                <!-- Setor Ciências -->
                                <circle class="text-blue-500" stroke="currentColor" stroke-width="10" fill="transparent" r="40" cx="50" cy="50" stroke-dasharray="71 251" stroke-dashoffset="-126" />
                                <!-- Setor História -->
                                <circle class="text-green-500" stroke="currentColor" stroke-width="10" fill="transparent" r="40" cx="50" cy="50" stroke-dasharray="59 251" stroke-dashoffset="-197" />
                                <!-- Setor Matemática -->
                                <circle class="text-yellow-500" stroke="currentColor" stroke-width="10" fill="transparent" r="40" cx="50" cy="50" stroke-dasharray="47 251" stroke-dashoffset="-256" />
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center">
                                    <p class="text-xl font-bold">12</p>
                                    <p class="text-gray-500 text-xs">Categorias</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 grid grid-cols-2 gap-3">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-orange-school-500 rounded-full mr-2"></div>
                            <p class="text-xs">Literatura (32%)</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                            <p class="text-xs">Ciências (18%)</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                            <p class="text-xs">História (15%)</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                            <p class="text-xs">Matemática (12%)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities and Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-5 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-lg font-bold text-gray-800">Atividades Recentes</h2>
                        <a href="#" class="text-orange-school-500 text-sm hover:text-orange-school-700 transition-colors duration-300">Ver todas</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start activity-item p-3 rounded">
                            <div class="bg-orange-school-100 p-2 rounded-full mr-3">
                                <i class="fas fa-exchange-alt text-orange-school-500"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">Novo empréstimo registrado</p>
                                <p class="text-gray-500 text-xs">Maria Silva pegou "Dom Casmurro" emprestado</p>
                                <p class="text-gray-400 text-xs mt-1">Há 2 minutos</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start activity-item p-3 rounded">
                            <div class="bg-green-100 p-2 rounded-full mr-3">
                                <i class="fas fa-undo-alt text-green-500"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">Devolução realizada</p>
                                <p class="text-gray-500 text-xs">João Santos devolveu "O Cortiço"</p>
                                <p class="text-gray-400 text-xs mt-1">Há 15 minutos</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start activity-item p-3 rounded">
                            <div class="bg-blue-100 p-2 rounded-full mr-3">
                                <i class="fas fa-book text-blue-500"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">Novo livro adicionado</p>
                                <p class="text-gray-500 text-xs">"Memórias Póstumas de Brás Cubas" foi adicionado ao acervo</p>
                                <p class="text-gray-400 text-xs mt-1">Há 1 hora</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-5 rounded-lg shadow">
                    <h2 class="text-lg font-bold text-gray-800 mb-5">Ações Rápidas</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <button class="bg-orange-school-500 hover:bg-orange-school-600 text-white p-4 rounded-lg text-center transition-all duration-300 quick-action-btn" @click="openModal = true; modalType = 'newLoan'">
                            <i class="fas fa-exchange-alt text-xl mb-2"></i>
                            <p class="font-medium text-sm">Novo Empréstimo</p>
                        </button>
                        
                        <button class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-lg text-center transition-all duration-300 quick-action-btn" @click="openModal = true; modalType = 'return'">
                            <i class="fas fa-undo-alt text-xl mb-2"></i>
                            <p class="font-medium text-sm">Registrar Devolução</p>
                        </button>
                        
                        <button class="bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-lg text-center transition-all duration-300 quick-action-btn" @click="openModal = true; modalType = 'newBook'">
                            <i class="fas fa-book text-xl mb-2"></i>
                            <p class="font-medium text-sm">Adicionar Livro</p>
                        </button>
                        
                        <button class="bg-purple-500 hover:bg-purple-600 text-white p-4 rounded-lg text-center transition-all duration-300 quick-action-btn" @click="openModal = true; modalType = 'newUser'">
                            <i class="fas fa-user-plus text-xl mb-2"></i>
                            <p class="font-medium text-sm">Cadastrar Usuário</p>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal -->
    <div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" x-cloak @click.self="openModal = false">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md max-h-screen overflow-y-auto modal-content" @click.stop>
            <div class="p-5">
                <div class="flex justify-between items-center pb-3 border-b">
                    <h2 class="text-lg font-bold text-gray-800" x-text="modalType === 'newLoan' ? 'Novo Empréstimo' : 
                                                                        modalType === 'return' ? 'Registrar Devolução' :
                                                                        modalType === 'newBook' ? 'Adicionar Livro' :
                                                                        modalType === 'newUser' ? 'Cadastrar Usuário' : 'Detalhes'"></h2>
                    <button @click="openModal = false" class="text-gray-500 hover:text-gray-700 transition-colors duration-300">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="mt-4">
                    <template x-if="modalType === 'newLoan'">
                        <div>
                            <p class="text-gray-600 mb-4 text-sm">Registrar um novo empréstimo de livro</p>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Selecionar Usuário</label>
                                    <select class="w-full rounded border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50 py-2 px-3">
                                        <option>João Silva</option>
                                        <option>Maria Santos</option>
                                        <option>Pedro Alves</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Selecionar Livro</label>
                                    <select class="w-full rounded border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50 py-2 px-3">
                                        <option>Dom Casmurro</option>
                                        <option>O Cortiço</option>
                                        <option>Iracema</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Data de Devolução</label>
                                    <input type="date" class="w-full rounded border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50 py-2 px-3">
                                </div>
                            </div>
                        </div>
                    </template>
                    
                    <template x-if="modalType === 'return'">
                        <div>
                            <p class="text-gray-600 mb-4 text-sm">Registrar a devolução de um livro</p>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Código do Empréstimo</label>
                                    <input type="text" class="w-full rounded border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50 py-2 px-3" placeholder="Digite o código do empréstimo">
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
                            <p class="text-gray-600 mb-4 text-sm">Adicionar um novo livro ao acervo</p>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Título do Livro</label>
                                    <input type="text" class="w-full rounded border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50 py-2 px-3">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Autor</label>
                                    <input type="text" class="w-full rounded border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50 py-2 px-3">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">ISBN</label>
                                    <input type="text" class="w-full rounded border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50 py-2 px-3">
                                </div>
                            </div>
                        </div>
                    </template>
                    
                    <template x-if="modalType === 'newUser'">
                        <div>
                            <p class="text-gray-600 mb-4 text-sm">Cadastrar um novo usuário no sistema</p>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
                                    <input type="text" class="w-full rounded border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50 py-2 px-3">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                                    <input type="email" class="w-full rounded border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50 py-2 px-3">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Usuário</label>
                                    <select class="w-full rounded border-gray-300 shadow-sm focus:border-orange-school-500 focus:ring focus:ring-orange-school-200 focus:ring-opacity-50 py-2 px-3">
                                        <option>Aluno</option>
                                        <option>Professor</option>
                                        <option>Funcionário</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                
                <div class="mt-5 flex justify-end space-x-3">
                    <button @click="openModal = false" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition-colors duration-300 text-sm">
                        Cancelar
                    </button>
                    <button class="px-4 py-2 bg-orange-school-500 text-white rounded hover:bg-orange-school-600 focus:outline-none focus:ring-2 focus:ring-orange-school-500 focus:ring-opacity-50 transition-colors duration-300 text-sm">
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
        });
    </script>
</body>
</html>