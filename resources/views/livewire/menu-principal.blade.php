<div>
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
