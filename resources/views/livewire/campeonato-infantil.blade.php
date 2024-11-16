<div>
    <div class="mt-20 lg:mt-5 mb-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center  py-1 rounded-lg">
                <h1 class="uppercase text-h4 lg:text-h3 font-bold text-center text-gray-600">Campeonato Infantil</h1>
            </div>
        </div>


        <div class=" mx-auto ">
            <div class="bg-menu w-full">
                <div class="container mx-auto  h-auto mt-5 mb-2">
                    <div class="flex justify-center">
                        <h2 class="text-white font-bold lg:text-h3 mt-5">Tabla de Puntaje General Infantil </h2>
                    </div>
                    <div class="flex justify-center items-center">
                        <table class=" lg:w-1/2 table-auto border-collapse  mt-2 mb-2">
                            <thead>
                                <tr class="bg-header text-white">
                                    <th class="px-4 py-2 text-left w-3">Pos</th>
                                    <th class="px-4 py-2 text-center lg:w-20">Club</th>
                                    <th class="px-4 py-2 text-center w-3 ">Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resultados as $resultado)
                                    <tr class="border-b hover:bg-sky-700">
                                        <td class="text-center text-white mt-1">{{ $loop->iteration }}</td>
                                        <td class="flex  space-x-4 px-4 mt-1 mb-1 items-center">
                                            <img src="{{ Storage::url($resultado->clubnombre->logo) }}"
                                                alt="{{ $resultado->clubnombre->clubnombre }}" class="h-10 w-10">
                                            <span
                                                class="text-[14px] lg:text-lg text-white">{{ $resultado->clubnombre->nombre }}</span>
                                        </td>

                                        <td class="px-4 text-center text-white font-bold">{{ $resultado->total_puntos }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Tabla de Resultados -->

                </div>







            </div>

        </div>


        {{-- Tabla puntaje tercera --}}
        <div class="bg-gray-100 mx-auto border border-gray-200 mt-2  overflow-x-auto px-1">
            <div class="flex flex-col items-center py-2  mt-1">
                <h1 class="text-h4 lg:text-h3 font-bold text-center text-gray-600">Tabla de Puntaje Tercera Serie</h1>
            </div>

            <div class="flex justify-center w-full overflow-x-auto">
                <table class="table-auto border-collapse mt-5 mb-5 min-w-max">
                    <thead>
                        <tr class="bg-header text-white">
                            <th class="px-1 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">Pos</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">Club</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg bg-menu">PTS</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PJ</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PG</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PE</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PP</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">GF</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">GC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terceras as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="text-center text-gray-800 mt-1 text-[10px] md:text-[14px]">
                                    {{ $loop->iteration }}</td>
                                <td
                                    class="flex items-center space-x-4 px-4 mt-1 mb-1 whitespace-nowrap text-[10px] md:text-[16px] lg:text-lg">
                                    <img src="{{ Storage::url($item->clubnombre->logo) }}"
                                        alt="{{ $item->clubnombre->clubnombre }}" class="h-6 w-6 flex-shrink-0">
                                    <span class="lg:text-lg text-gray-800">{{ $item->clubnombre->nombre }}</span>
                                </td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg font-bold bg-menu text-white">
                                    {{ $item->total_puntos }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_jugados }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_ganados }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_empatados }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_perdidos }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->goles_a_favor }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->goles_en_contra }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tabla puntaje segundas --}}
        <div class=" bg-gray-100 mx-auto border border-gray-200 mt-2  overflow-x-auto px-1">
            <div class="flex flex-col items-center py-2  mt-1">
                <h1 class="text-h4 lg:text-h3 font-bold text-center text-gray-600">Tabla de Puntaje Segunda Serie</h1>
            </div>

            <div class="flex justify-center w-full overflow-x-auto">
                <table class="table-auto border-collapse mt-5 mb-5 min-w-max">
                    <thead>
                        <tr class="bg-header text-white">
                            <th class="px-1 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">Pos</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">Club</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg bg-menu">PTS</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PJ</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PG</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PE</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PP</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">GF</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">GC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($segundas as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="text-center text-gray-800 mt-1 text-[10px] md:text-[14px]">
                                    {{ $loop->iteration }}</td>
                                <td
                                    class="flex items-center space-x-4 px-4 mt-1 mb-1 whitespace-nowrap text-[10px] md:text-[16px] lg:text-lg">
                                    <img src="{{ Storage::url($item->clubnombre->logo) }}"
                                        alt="{{ $item->clubnombre->clubnombre }}" class="h-6 w-6 flex-shrink-0">
                                    <span class="lg:text-lg text-gray-800">{{ $item->clubnombre->nombre }}</span>
                                </td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg font-bold bg-menu text-white">
                                    {{ $item->total_puntos }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_jugados }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_ganados }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_empatados }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_perdidos }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->goles_a_favor }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->goles_en_contra }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

         {{-- Tabla puntaje Primeras --}}
         <div class=" bg-gray-100 mx-auto border border-gray-200 mt-2  overflow-x-auto px-1">
            <div class="flex flex-col items-center py-2  mt-1">
                <h1 class="text-h4 lg:text-h3 font-bold text-center text-gray-600">Tabla de Puntaje Primera Serie</h1>
            </div>

            <div class="flex justify-center w-full overflow-x-auto">
                <table class="table-auto border-collapse mt-5 mb-5 min-w-max">
                    <thead>
                        <tr class="bg-header text-white">
                            <th class="px-1 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">Pos</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">Club</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg bg-menu">PTS</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PJ</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PG</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PE</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PP</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">GF</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">GC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($primeras as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="text-center text-gray-800 mt-1 text-[10px] md:text-[14px]">
                                    {{ $loop->iteration }}</td>
                                <td
                                    class="flex items-center space-x-4 px-4 mt-1 mb-1 whitespace-nowrap text-[10px] md:text-[16px] lg:text-lg">
                                    <img src="{{ Storage::url($item->clubnombre->logo) }}"
                                        alt="{{ $item->clubnombre->clubnombre }}" class="h-6 w-6 flex-shrink-0">
                                    <span class="lg:text-lg text-gray-800">{{ $item->clubnombre->nombre }}</span>
                                </td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg font-bold bg-menu text-white">
                                    {{ $item->total_puntos }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_jugados }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_ganados }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_empatados }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->partidos_perdidos }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->goles_a_favor }}</td>
                                <td
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg text-gray-800 font-light">
                                    {{ $item->goles_en_contra }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>




    </div>
</div>
