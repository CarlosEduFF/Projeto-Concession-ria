<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://unpkg.com/flowbite@1.5.0/dist/flowbite.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="w-full">
    <div class="bg-gradient-to-b from-red-600 to-black h-96"></div>
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
    <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
        <p class="text-3xl font-bold leading-7 text-center">Editar</p>
        <form method="POST" action="/atualizar/{{$ca->id}}" enctype="multipart/form-data">
            @csrf
            <!-- Primeira linha de inputs -->
            <div class="md:flex items-center mt-12">
                <div class="w-full md:w-1/2 flex flex-col mt-4">
                    <label class="font-semibold leading-none">Título</label>
                    <input type="text"  name="titulo" placeholder="Título" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
                <div class="w-full md:w-1/2 flex flex-col mt-4 md:ml-4">
                    <label class="font-semibold leading-none">Lançamento</label>
                    <input type="date" name="anolanc"  placeholder="Ex: 2024/05/10" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
            </div>
            
            <!-- Segunda linha de inputs -->
            <div class="md:flex items-center mt-6">
                <div class="w-full md:w-1/2 flex flex-col mt-4">
                    <label class="font-semibold leading-none">Classificação</label>
                    <input type="text" name="classi"  placeholder="Ex: A10" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
                <div class="w-full md:w-1/2 flex flex-col mt-4 md:ml-4">
                    <label class="font-semibold leading-none">Gênero Jogo</label>
                    <input type="text" name="genero"  placeholder="Ficção" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
            </div>

            <!-- Terceira linha de inputs -->
            <div class="md:flex items-center mt-6">
                <div class="w-full md:w-1/3 flex flex-col mt-4">
                    <label class="font-semibold leading-none">Pontuação</label>
                    <input type="text" name="pontuacao"  placeholder="Ex: 4,2" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
                <div class="w-full md:w-1/3 flex flex-col mt-4 md:ml-4">
                    <label class="font-semibold leading-none">Plataforma</label>
                    <input type="text" name="plataforma"  placeholder="Nome da plataforma" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
                <div class="w-full md:w-1/3 flex flex-col mt-4 md:ml-4">
                    <label class="font-semibold leading-none">Empresa</label>
                    <input type="text" name="empresa"  placeholder="Empresa" class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-3 bg-gray-200 border rounded border-gray-200" />
                </div>
            </div>

            <div class="md:flex items-center mt-12">
                        <div class="w-full flex md:w-1/2 flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none">Capa Atual</label>
                          @if($jogo->capa)
                           <img src="{{asset('storage/' . $jogo->capa)}}" alt="capa anterior " class="leading-none text-gray-900 p-2 focus:outline-none focus:border-blue-700 mt-2 bg-gray-200 border rounded border-gray-200 size-3/5">
                           @endif
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Capa</label>
                        <input type="file" name="capa" value="{{$jogo->capa}}"  class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-2 bg-gray-200 border rounded border-gray-200"/>
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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <!-- Footer -->
 <footer class="mt-16 p-6 bg-white dark:bg-zinc-800 shadow-inner">
        <div class="text-center text-sm text-gray-500 dark:text-gray-400">
            © 2024 Laravel Breeze. Todos os direitos reservados.
        </div>
    </footer>
</body>
</html>