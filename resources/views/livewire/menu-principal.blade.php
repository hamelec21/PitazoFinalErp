<div>
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

                    <!-- Menú lateral -->
                    <div x-show="open" @click.away="open = false"
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
        </div>
    </div>

</div>
