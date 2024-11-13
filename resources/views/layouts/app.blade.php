<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Título -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Flowbite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Estilos de Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Añadir SwiperJS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    @livewireStyles

</head>
<body class="font-sans antialiased">
    <div class="">
        <!-- Menú Principal -->
        @livewire('menu-principal')
        <div class="lg:h-[90px]"></div>

        <main>
            <!-- Asegúrate de usar el contenido de la sección 'content' si no está definido $slot -->
            @isset($slot)
                {{ $slot }}
            @endisset
            <div class="">
                @yield('content')
            </div>


        </main>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts


    <!-- Flowbite JS -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <!-- Svelte JS -->
    <script src="https://cdn.jsdelivr.net/npm/svelte@4.2.10/src/runtime/index.min.js"></script>

    <!-- Añadir SwiperJS JavaScript -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="{{ asset('swiper/swiper-config.js') }}"></script>
</body>
</html>
