<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://unpkg.com/flowbite@1.5.0/dist/flowbite.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar Carro</title>
</head>
<body  class="bg-gradient-to-b from-gray-800 to-black min-h-screen flex flex-col">

<nav x-data="{ open: false }" class="bg-gray-900 text-white shadow-lg border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                    <a href="#" class="text-2xl font-bold text-yellow-500">Concessionária</a>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 items-center sm:flex">
                    <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-white hover:text-yellow-400">
                        {{ __('Dashboard') }}
                    </a>
                    <a  class="text-lg font-semibold text-white hover:text-yellow-400">
                        Inventario
                    </a>
                    <a href="" class="text-lg font-semibold text-white hover:text-yellow-400">
                        carros
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md bg-yellow-500 text-white hover:bg-yellow-600 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-yellow-500 hover:text-yellow-400 hover:bg-gray-800 focus:outline-none focus:bg-gray-800 focus:text-yellow-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block text-base font-semibold text-yellow-500 hover:bg-gray-800 hover:text-yellow-400">
                {{ __('Dashboard') }}
            </a>
            <a href="" class="block text-base font-semibold text-yellow-500 hover:bg-gray-800 hover:text-yellow-400">
                Inventario
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-base font-semibold text-yellow-500 hover:bg-gray-800 hover:text-yellow-400">
                    {{ __('Perfil') }}
                </a>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       class="block px-4 py-2 text-base font-semibold text-yellow-500 hover:bg-gray-800 hover:text-yellow-400">
                        {{ __('Sair') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
<!-- FINAL DO Navbar-->

        <div class="w-full">
    <div class="h-96"></div>
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
    <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
        <p class="text-3xl font-bold leading-7 text-center">Editar</p>
        <form method="POST" action="/atualizar/{{$carro->id}}" enctype="multipart/form-data">
            @csrf
            <!-- Primeira linha de inputs -->
            <div class="md:flex items-center mt-12">
                <div class="w-full md:w-1/2 flex flex-col mt-4">
                    <label class="font-semibold leading-none">Marca</label>
                    <input type="text"  name="titulo" placeholder="Marca" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
                <div class="w-full md:w-1/2 flex flex-col mt-4 md:ml-4">
                    <label class="font-semibold leading-none">ano</label>
                    <input type="date" name="ano"  placeholder="Ex: 2024/05/10" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
            </div>
            
            <!-- Segunda linha de inputs -->
            <div class="md:flex items-center mt-6">
                <div class="w-full md:w-1/2 flex flex-col mt-4">
                    <label class="font-semibold leading-none">Cambio</label>
                    <input type="text" name="cambio"  placeholder="Ex: A10" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
                <div class="w-full md:w-1/2 flex flex-col mt-4 md:ml-4">
                    <label class="font-semibold leading-none">Ar-Condicionado</label>
                    <input type="text" name="Ar-con"  placeholder="Ficção" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
            </div>

            <!-- Terceira linha de inputs -->
            <div class="md:flex items-center mt-6">
                <div class="w-full md:w-1/3 flex flex-col mt-4">
                    <label class="font-semibold leading-none">Cor</label>
                    <input type="text" name="pontuacao"  placeholder="Ex: Azul" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
                 <!-- quarta linha de inputs -->
                <div class="w-full md:w-1/3 flex flex-col mt-4 md:ml-4">
                    <label class="font-semibold leading-none">Combustivel</label>
                    <input type="text" name="combustivel"  placeholder="Ex: Gasolina" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
                 <!-- Quinta linha de inputs -->
                <div class="w-full md:w-1/3 flex flex-col mt-4 md:ml-4">
                    <label class="font-semibold leading-none">placa</label>
                    <input type="text" name="empresa"  placeholder="CAD-E190" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
            </div>
               <!-- TSexta linha de inputs -->
            <div class="md:flex items-center mt-12">
                        <div class="w-full flex md:w-1/2 flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none">Foto Atual</label>
                          @if($carro->capa)
                           <img src="{{asset('storage/' . $carro->foto)}}" alt="capa anterior " class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-2 bg-gray-200 border rounded border-gray-200 size-3/5">
                           @endif
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Foto</label>
                        <input type="file" name="capa" value="{{$carro->foto}}"  class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-2 bg-gray-200 border rounded border-gray-200"/>
                    </div>
                </div>

            <!-- Botão de enviar -->
            <div class="flex items-center justify-center w-full mt-9">
                <button type="submit" class="font-semibold leading-none text-white py-3 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</div>

 <!-- Footer -->
 <footer class="mt-16 p-6 bg-white dark:bg-zinc-800 shadow-inner">
        <div class="text-center text-sm text-gray-500 dark:text-gray-400">
            © 2024 Laravel Breeze. Todos os direitos reservados.
        </div>
    </footer>
    
</body>
</html>