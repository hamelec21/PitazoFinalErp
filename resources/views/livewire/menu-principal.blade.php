<div>
<<<<<<< HEAD
    <!-- resources/views/components/navbar.blade.php -->
<header class="w-full" x-data="{ mobileOpen: false }">
    {{-- Top red bar --}}
    <div class="bg-red-600 text-white text-xs py-2 px-4 flex justify-between items-center">
        <div class="space-x-4">
            {{-- Puedes agregar contenido aquí --}}
        </div>
        <div class="space-x-3 text-lg flex">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
=======
    <div class="bg-header shadow-lg fixed w-full z-40 top-0 sm:block">
        <div class="container mx-auto px-4 py-2">
            <nav class="flex justify-between items-center">
                <!--menu-->

                <div x-data="{ open: false }" class="relative flex mt-2">
                    <!-- Botón de menú -->
                    <div class="flex flex-col items-center">
                        <button @click="open = !open" class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                        <span class="text-gray-100 text-[12px]">Menú</span>
                    </div>

                    <!-- Menú lateral tipo modal-->
                    <div x-show="open" @click.away="open = false" x-cloak
                        class="fixed inset-y-0 left-0 w-64 bg-menu shadow-lg z-50 transform transition-transform"
                        x-transition:enter="transition-transform duration-300 ease-out"
                        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transition-transform duration-300 ease-in"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
                        <div class="text-white">
                            <div class="flex justify-end items-center bg-secundary-a w-full px-4 py-2">
                                <h2 class="text-md font-semibold text-center text-white mr-2" @click="open = false">
                                    Cerrar</h2>
                                <button @click="open = false" class="text-white hover:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <ul>
                                <li class="flex items-center justify-between w-full hover:bg-sky-700">
                                    @svg('iconpark-soccerone-o', ['class' => 'w-8 ml-2'])
                                    <a href="{{ route('campeonato-adulto') }}"
                                        class="px-1 py-2 flex items-center justify-between w-full">
                                        <span class="text-white">Campeonato Adultos</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 text-gray-100">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </li>
                                <hr class="h-1 text-">
                                <li class="flex items-center justify-between w-full hover:bg-sky-700">
                                    @svg('iconpark-soccerone-o', ['class' => 'w-8 ml-2'])
                                    <a href="{{ route('campeonato-femenino') }}"
                                        class="px-1 py-2 flex items-center justify-between w-full">
                                        <span class="text-white">Campeonato Femenino</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 text-gray-100">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </li>
                                <hr class="h-1 text-">
                                <li class="flex items-center justify-between w-full hover:bg-sky-700">
                                    @svg('iconpark-soccerone-o', ['class' => 'w-8 ml-2'])
                                    <a href="{{ route('campeonato-infantil') }}"
                                        class="px-1 py-2 flex items-center justify-between w-full">
                                        <span class="text-white">Campeonato Infantil</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 text-gray-100">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </li>
                                <hr class="h-1 text-">
                                <li class="flex items-center justify-between w-full hover:bg-sky-700">
                                    @svg('iconpark-soccerone-o', ['class' => 'w-8 ml-2'])
                                    <a href="{{ route('campeonato-sub45') }}"
                                        class="px-1 py-2 flex items-center justify-between w-full">
                                        <span class="text-white">Campeonato Sub45</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 text-gray-100">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </li>
                                <hr class="h-1 text-">
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Logo centrado -->
                <div class="flex-1 flex justify-center">
                    <a href="/">
                        <img src="{{ asset('img/logo/logo_asociacion.png') }}" class="w-20 lg:w-28">
                    </a>
                </div>

                <!-- Redes sociales a la derecha -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-white hover:text-gray-400">
                        @svg('fab-facebook', ['class' => 'w-6'])
                    </a>
                    <a href="#" class="text-white hover:text-gray-400">
                        @svg('fab-instagram', ['class' => 'w-6'])
                    </a>
                </div>
            </nav>
>>>>>>> 9ed20951d27992a39ce8f0545525175b0a6d8696
        </div>
    </div>

    {{-- Navigation bar --}}
    <div class="bg-[#1f4e79] text-white text-sm font-semibold shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="flex items-center justify-between py-3 relative">
                {{-- Mobile button --}}
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden text-2xl">
                    <template x-if="!mobileOpen">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor"><use href="#icon-menu" /></svg>
                    </template>
                    <template x-if="mobileOpen">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor"><use href="#icon-close" /></svg>
                    </template>
                </button>

                {{-- Left Menu --}}
                <ul class="hidden lg:flex space-x-5 items-center">
                    <li><a href="#" class="hover:text-sky-400">NOSOTROS</a></li>
                    <li><a href="#" class="hover:text-sky-400">DIRECTORIO</a></li>
                    <li class="group relative">
                        <a href="#" class="hover:text-sky-400">REGLAMENTO</a>
                        <ul class="absolute hidden group-hover:block bg-white text-black mt-2 py-2 rounded shadow-md z-10">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Reglamentos</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="hover:text-sky-400">CLUBES</a></li>
                    <li><a href="#" class="hover:text-sky-400">SELECCIONES</a></li>
                </ul>

                {{-- Logo --}}
                <div class="mx-4">
                    <a href="/">
                        <img src="{{ asset('img/logo/logo_asociacion.png') }}" alt="Logo" class="h-12 w-auto object-contain">
                    </a>
                </div>

                {{-- Right Menu --}}
                <ul class="hidden lg:flex space-x-5 items-center">
                    <li><a href="#" class="hover:text-sky-400">GRUPO A</a></li>
                    <li><a href="#" class="hover:text-sky-400">GRUPO B</a></li>
                    <li><a href="#" class="hover:text-sky-400">INFANTILES</a></li>
                    <li><a href="#" class="hover:text-sky-400">FEMENINAS</a></li>
                    <li><a href="#" class="hover:text-sky-400">SUB 45</a></li>
                </ul>
            </nav>

            {{-- Mobile Menu --}}
            <ul x-show="mobileOpen" class="lg:hidden flex flex-col gap-3 py-4">
                <li><a href="#">NOSOTROS</a></li>
                <li><a href="#">ÁRBITROS</a></li>
                <li><a href="#">BASES DE CAMPEONATOS</a></li>
                <li><a href="#">CLUBES</a></li>
                <li><a href="#">SELECCIONES</a></li>
                <li><a href="#">RES. DE TRIBUNALES</a></li>
                <li><a href="#">ESTATUTOS Y REGLAMENTOS</a></li>
                <li><a href="#">GESTIÓN FINANCIERA</a></li>
                <li><a href="#">TRANSPARENCIA</a></li>
            </ul>
        </div>
    </div>
</header>

{{-- Íconos (puedes usar heroicons o fontawesome) --}}
<svg style="display: none">
    <symbol id="icon-menu" viewBox="0 0 20 20">
        <path d="M3 6h14M3 10h14M3 14h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
    </symbol>
    <symbol id="icon-close" viewBox="0 0 20 20">
        <path d="M6 6l8 8M6 14L14 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
    </symbol>
</svg>

</div>
