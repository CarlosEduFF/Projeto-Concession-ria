<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionária - Home</title>
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.5/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-900 text-white">

    @if (Route::has('login'))

        <!-- Navbar -->
        <nav class="bg-gray-900 text-white shadow-lg border-b border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <a href="#" class="text-2xl font-bold text-yellow-500">Concessionária</a>
                    </div>
                    <div class="hidden space-x-8 sm:flex items-center">
                        <a href="#home" class="text-lg font-semibold hover:text-yellow-400">Home</a>
                        <a href="#inventory" class="text-lg font-semibold hover:text-yellow-400">Estoque</a>
                        <a href="#offers" class="text-lg font-semibold hover:text-yellow-400">Ofertas</a>
                        <a href="#contact" class="text-lg font-semibold hover:text-yellow-400">Contato</a>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-lg font-semibold hover:text-yellow-400">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-lg font-semibold hover:text-yellow-400">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-lg font-semibold hover:text-yellow-400">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    @endif
    <!-- Hero Section with Carrossel -->
   <!-- Hero Section with Carrossel -->
<div id="home" class="relative bg-gray-800 h-screen">
    <div class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
    <div x-data="{ currentSlide: 0, slides: ['https://hips.hearstapps.com/hmg-prod/images/2021-porsche-panamera-114-1649257326.jpg?crop=1.00xw:0.753xh;0,0.0856xh&resize=1200:*', 'https://imgs.search.brave.com/Lr6a31K-CYO1icAXf7RWb7nXbGleyTR756cXmoThQDc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9xdWF0/cm9yb2Rhcy5hYnJp/bC5jb20uYnIvd3At/Y29udGVudC91cGxv/YWRzLzIwMjMvMDIv/MTEwOTA2MC1lMTY3/NjY2NzA5MjQ3NC5q/cGc_cXVhbGl0eT03/MCZzdHJpcD1pbmZv/Jnc9MTI4MCZoPTcy/MCZjcm9wPTE', 'https://imgs.search.brave.com/SKbYNdEY4jUnqUw7jT3I4DkJ8EMEv8H6IaIMmtvTziY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9xdWF0/cm9yb2Rhcy5hYnJp/bC5jb20uYnIvd3At/Y29udGVudC91cGxv/YWRzLzIwMjQvMDQv/MUZMUDU2MjAtZTE3/MjAwMDUwNDcxMTgu/anBnP3F1YWxpdHk9/NzAmc3RyaXA9aW5m/byZ3PTEyODAmaD03/MjAmY3JvcD0x', 'https://imgs.search.brave.com/n8vInIOK_wISJIPmlPPRaiQ89JoKzllO7PZYlZdsohQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9ibG9n/Z2VyLmdvb2dsZXVz/ZXJjb250ZW50LmNv/bS9pbWcvYi9SMjl2/WjJ4bC9BVnZYc0Vo/RWlqd0VvNWJweGtp/bGszNDFQZzRxeWRz/cnNJODMtbE56djZ0/dVNKTGx3OFlIbXRv/VTUtaGZTazFlWXlh/RXUzcjgxbVNwbEZo/NzQ0Y0tMZS1qaU44/ZEE3RHNDcEZyU2U1/dFY2LW02WG85TURP/ejdhXzFFMlB3SEpu/aWg2b2dPdnJzdlpI/azA5THh3TFpoNXVn/Q0JBUmxPVVgzcHRF/emlIWi1fbTRFTXBy/MmEtQTRBRmRjY1hI/TmVvRG5kVFl4L3M2/MDAtcncvMDIlMjAy/MDI1JTIwSG9uZGEl/MjBDaXZpYyUyMFNl/ZGFuJTIwU3BvcnQl/MjBUb3VyaW5nJTIw/SHlicmlkLmpwZw'] }" class="relative h-full w-full">
        <!-- Carrossel Imagens -->
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="currentSlide === index" class="absolute inset-0 bg-cover bg-center transition-opacity duration-700" :style="'background-image: url(' + slide + ')';"></div>
        </template>

        <!-- Controles -->
        <div class="absolute inset-0 flex justify-between items-center px-4">
            <button @click="currentSlide = (currentSlide === 0) ? slides.length - 1 : currentSlide - 1" class="text-yellow-500 hover:text-yellow-400 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button @click="currentSlide = (currentSlide === slides.length - 1) ? 0 : currentSlide + 1" class="text-yellow-500 hover:text-yellow-400 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        <!-- Texto do Carrossel -->
        <div class="absolute bottom-0 left-0 right-0 p-4 text-center text-white bg-black bg-opacity-50">
            <h1 class="text-4xl font-bold">Seja Bem-vindo à Concessionária</h1>
            <p class="mt-2 text-lg">Encontre o carro dos seus sonhos com as melhores ofertas!</p>
        </div>
    </div>
</div>





    <!-- Inventory Section -->
    <section id="inventory" class="py-16 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-yellow-500 mb-8">Nosso Estoque</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-800 p-6 rounded-lg">
                    <img src="{{ asset('images/porsche.png') }}" alt="Car 1"
                        class="w-full h-48 object-cover mb-4 rounded-lg">
                    <h3 class="text-2xl font-semibold text-yellow-500">Porsche Carreira</h3>
                    <p class="text-gray-400">R$ 800.000</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg">
                    <img src="{{ asset('images/mobi.png') }}" alt="Car 2"
                        class="w-full h-48 object-cover mb-4 rounded-lg">
                    <h3 class="text-2xl font-semibold text-yellow-500">Fiat Mobi</h3>
                    <p class="text-gray-400">R$ 90.000</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg">
                    <img src="{{ asset('images/porsche-panamera.png') }}" alt="Car 3"
                        class="w-full h-48 object-cover mb-4 rounded-lg">
                    <h3 class="text-2xl font-semibold text-yellow-500">Porsche 911 GT</h3>
                    <p class="text-gray-400">R$ 2.300.000</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Offers Section -->
    <section id="offers" class="py-16 bg-gray-800">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-yellow-500 mb-8">Ofertas Especiais</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-yellow-500 p-6 rounded-lg text-black">
                    <h3 class="text-2xl font-semibold">Desconto de 10% em Carros Novos!</h3>
                    <p class="mt-2">Aproveite o nosso super desconto e saia com o seu carro zero quilômetro agora mesmo.
                    </p>
                </div>
                <div class="bg-yellow-500 p-6 rounded-lg text-black">
                    <h3 class="text-2xl font-semibold">Taxa Zero no Financiamento</h3>
                    <p class="mt-2">Compre agora e financie com taxas de 0%. É a sua oportunidade de sair motorizado!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-yellow-500 mb-8">Entre em Contato</h2>
            <form action="#" class="max-w-3xl mx-auto space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" placeholder="Nome"
                        class="w-full p-3 bg-gray-800 text-white rounded-lg focus:outline-none">
                    <input type="email" placeholder="E-mail"
                        class="w-full p-3 bg-gray-800 text-white rounded-lg focus:outline-none">
                </div>
                <textarea placeholder="Mensagem"
                    class="w-full p-3 bg-gray-800 text-white rounded-lg focus:outline-none h-32"></textarea>
                <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 p-3 rounded-lg text-black font-semibold">Enviar</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 bg-gray-800 text-center text-gray-400">
        <p>&copy; 2024 Concessionária. Todos os direitos reservados.</p>
    </footer>

</body>

</html>