<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    @livewireStyles
</head>

<body>
    @livewire('menu-principal')
    <main class="h-auto z-10">
        <!-- Banner principal -->
        <div class="w-full mb-2">
            <img src="{{ asset('img/banners/banner_home_1.png') }}" class="object-cover w-full" alt="banner">
        </div>

        <!-- Slider de equipos -->
        <div class="lg:mt-2 lg:mb-5 mt-7 container mx-auto px-4">
            @livewire('sliderclub')
        </div>

        <div class="lg:mt-2 lg:mb-5 mt-7 container mx-auto px-4">

        </div>



        <!-- Tabla General -->
        <div class="mb-5">
        {{--  --}}
        </div>

        <!-- Botones Campeonatos -->
        <div class="mt-5 mb-5 container mx-auto px-4">
            <div class="flex flex-col lg:flex-row justify-between gap-4">
                <a href="#">
                    <div class="bg-header w-full lg:w-full h-20 flex justify-center items-center px-4 rounded-lg relative group">
                        @svg('iconpark-soccerone-o', ['class' => ' text-white w-8 mr-5 icon-soccer transition-all duration-300'])
                        <div class="flex justify-center">
                            <h4 class="text-white">Campeonato Adulto</h4>
                        </div>
                    </div>
                </a>
                <a href="{{route('campeonato-femenino')}}">
                    <div class="bg-violet-600 w-full lg:w-full h-20 flex justify-center items-center px-4 rounded-lg relative group">
                        @svg('iconpark-soccerone-o', ['class' => ' text-white w-8 mr-5 icon-soccer transition-all duration-300'])
                        <div class="flex justify-center">
                            <h4 class="text-white">Campeonato Femenino</h4>
                        </div>
                    </div>
                </a>
                <a href="{{route('campeonato-infantil')}}">
                    <div class="bg-sky-600 w-full lg:w-full h-20 flex justify-center items-center px-4 rounded-lg relative group">
                        @svg('iconpark-soccerone-o', ['class' => ' text-white w-8 mr-5 icon-soccer transition-all duration-300'])
                        <div class="flex justify-center">
                            <h4 class="text-white">Campeonato Infantil</h4>
                        </div>
                    </div>
                </a>
                <a href="{{route('campeonato-sub45')}}">
                    <div class="bg-[#ff6b00] w-full lg:w-full h-20 flex justify-center items-center px-4 rounded-lg relative group">
                        @svg('iconpark-soccerone-o', ['class' => ' text-white w-8 mr-5 icon-soccer transition-all duration-300'])
                        <div class="flex justify-center">
                            <h4 class="text-white">Campeonato Sub45</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Sección del footer -->

        @livewire('footer')
    </main>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @livewireScripts
    <script src="{{ asset('swiper/swiper-config.js') }}"></script>
    <!-- Flowbite JS -->

<!-- Svelte JS -->
<script src="https://cdn.jsdelivr.net/npm/svelte@4.2.10/src/runtime/index.min.js"></script
</body>

</html>
