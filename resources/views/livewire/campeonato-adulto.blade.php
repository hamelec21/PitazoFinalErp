<div>

    <div class="mt-20 lg:mt-5 mb-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center bg-sky-600 py-2 rounded-lg">
                <h1 class="uppercase text-h3 lg:text-h3 font-bold text-center text-white">Campeonato Adulto</h1>
            </div>
        </div>


        <div class="container mx-auto px-4">
            @livewire('tabla-general')
        </div>

        {{-- Tabla puntaje tercera --}}

        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center bg-sky-600 py-2 rounded-lg">
                <h1 class="uppercase text-h3 lg:text-h3 font-bold text-center text-white">puntaje Tercera Serie</h1>
            </div>
        </div>
        <div class="container mx-auto border border-gray-100 mt-5 rounded-lg overflow-x-auto px-2">
            <div class="flex  lg:justify-center overflow-x-auto">
                <table class="table-auto border-collapse mt-5 mb-5  min-w-max">
                    <thead>
                        <tr class="bg-header text-white">
                            <th class="px-4 py-2 text-left w-1 rounded-l-lg">Pos</th>
                            <th class="px-4 py-2 text-center">Club</th>
                            <th class="px-4 py-2 text-center w-3 bg-menu">PTS</th>
                            <th class="px-4 py-2 text-center w-1">PJ</th>
                            <th class="px-4 py-2 text-center w-1">PG</th>
                            <th class="px-4 py-2 text-center w-1">PE</th>
                            <th class="px-4 py-2 text-center w-1">PP</th>
                            <th class="px-4 py-2 text-center w-1">GF</th>
                            <th class="px-4 py-2 text-center w-1 rounded-r-lg">GC</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terceras as $tercera)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="text-center text-gray-800 mt-1">{{ $loop->iteration }}</td>
                                <td class="flex items-center space-x-4 px-4 mt-1 mb-1whitespace-nowrap mr-2">
                                    <img src="{{ Storage::url($tercera->clubnombre->logo) }}"
                                        alt="{{ $tercera->clubnombre->clubnombre }}" class="h-6 w-6 flex-shrink-0">
                                    <span class=" lg:text-lg text-gray-800">{{ $tercera->clubnombre->nombre }}</span>
                                </td>
                                <td class="px-4 text-center  font-bold bg-menu text-white">{{ $tercera->total_puntos }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $tercera->partidos_jugados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $tercera->partidos_ganados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $tercera->partidos_empatados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $tercera->partidos_perdidos }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $tercera->goles_a_favor }}</td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $tercera->goles_en_contra }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        {{-- Tabla puntaje Segunda --}}

        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center bg-sky-600 py-2 rounded-lg">
                <h1 class="uppercase text-h3 lg:text-h3 font-bold text-center text-white">Tabla puntaje Segunda Serie</h1>
            </div>
        </div>

        <div class="container mx-auto border border-gray-100 mt-5 rounded-lg overflow-x-auto px-2">
            <div class="flex  lg:justify-center overflow-x-auto">
                <table class="table-auto border-collapse mt-5 mb-5  min-w-max">
                    <thead>
                        <tr class="bg-header text-white">
                            <th class="px-4 py-2 text-left w-1 rounded-l-lg">Pos</th>
                            <th class="px-4 py-2 text-center">Club</th>
                            <th class="px-4 py-2 text-center w-3 bg-menu">PTS</th>
                            <th class="px-4 py-2 text-center w-1">PJ</th>
                            <th class="px-4 py-2 text-center w-1">PG</th>
                            <th class="px-4 py-2 text-center w-1">PE</th>
                            <th class="px-4 py-2 text-center w-1">PP</th>
                            <th class="px-4 py-2 text-center w-1">GF</th>
                            <th class="px-4 py-2 text-center w-1 rounded-r-lg">GC</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($segundas as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="text-center text-gray-800 mt-1">{{ $loop->iteration }}</td>
                                <td class="flex items-center space-x-4 px-4 mt-1 mb-1whitespace-nowrap mr-2">
                                    <img src="{{ Storage::url($item->clubnombre->logo) }}"
                                        alt="{{ $item->clubnombre->clubnombre }}" class="h-6 w-6 flex-shrink-0">
                                    <span class=" lg:text-lg text-gray-800">{{ $item->clubnombre->nombre }}</span>
                                </td>
                                <td class="px-4 text-center  font-bold bg-menu text-white">{{ $item->total_puntos }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_jugados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_ganados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_empatados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_perdidos }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->goles_a_favor }}</td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->goles_en_contra }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tabla puntaje Senior --}}
        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center bg-sky-600 py-2 rounded-lg">
                <h1 class="uppercase text-h3 lg:text-h3 font-bold text-center text-white"> puntaje Sub 35</h1>
            </div>
        </div>
        <div class="container mx-auto border border-gray-100 mt-5 rounded-lg overflow-x-auto px-2">
            <div class="flex  lg:justify-center overflow-x-auto">
                <table class="table-auto border-collapse mt-5 mb-5  min-w-max">
                    <thead>
                        <tr class="bg-header text-white">
                            <th class="px-4 py-2 text-left w-1 rounded-l-lg">Pos</th>
                            <th class="px-4 py-2 text-center">Club</th>
                            <th class="px-4 py-2 text-center w-3 bg-menu">PTS</th>
                            <th class="px-4 py-2 text-center w-1">PJ</th>
                            <th class="px-4 py-2 text-center w-1">PG</th>
                            <th class="px-4 py-2 text-center w-1">PE</th>
                            <th class="px-4 py-2 text-center w-1">PP</th>
                            <th class="px-4 py-2 text-center w-1">GF</th>
                            <th class="px-4 py-2 text-center w-1 rounded-r-lg">GC</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seniors as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="text-center text-gray-800 mt-1">{{ $loop->iteration }}</td>
                                <td class="flex items-center space-x-4 px-4 mt-1 mb-1whitespace-nowrap mr-2">
                                    <img src="{{ Storage::url($item->clubnombre->logo) }}"
                                        alt="{{ $item->clubnombre->clubnombre }}" class="h-6 w-6 flex-shrink-0">
                                    <span class=" lg:text-lg text-gray-800">{{ $item->clubnombre->nombre }}</span>
                                </td>
                                <td class="px-4 text-center  font-bold bg-menu text-white">{{ $item->total_puntos }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_jugados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_ganados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_empatados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_perdidos }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->goles_a_favor }}</td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->goles_en_contra }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tabla puntaje sub45 --}}
        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center bg-sky-600 py-2 rounded-lg">
                <h1 class="uppercase text-h3 lg:text-h3 font-bold text-center text-white"> puntaje Sub 45</h1>
            </div>
        </div>
        <div class="container mx-auto border border-gray-100 mt-5 rounded-lg overflow-x-auto px-2">

            <div class="flex  lg:justify-center overflow-x-auto">
                <table class="table-auto border-collapse mt-5 mb-5  min-w-max">
                    <thead>
                        <tr class="bg-header text-white">
                            <th class="px-4 py-2 text-left w-1 rounded-l-lg">Pos</th>
                            <th class="px-4 py-2 text-center">Club</th>
                            <th class="px-4 py-2 text-center w-3 bg-menu">PTS</th>
                            <th class="px-4 py-2 text-center w-1">PJ</th>
                            <th class="px-4 py-2 text-center w-1">PG</th>
                            <th class="px-4 py-2 text-center w-1">PE</th>
                            <th class="px-4 py-2 text-center w-1">PP</th>
                            <th class="px-4 py-2 text-center w-1">GF</th>
                            <th class="px-4 py-2 text-center w-1 rounded-r-lg">GC</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub45s as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="text-center text-gray-800 mt-1">{{ $loop->iteration }}</td>
                                <td class="flex items-center space-x-4 px-4 mt-1 mb-1whitespace-nowrap mr-2">
                                    <img src="{{ Storage::url($item->clubnombre->logo) }}"
                                        alt="{{ $item->clubnombre->clubnombre }}" class="h-6 w-6 flex-shrink-0">
                                    <span class=" lg:text-lg text-gray-800">{{ $item->clubnombre->nombre }}</span>
                                </td>
                                <td class="px-4 text-center  font-bold bg-menu text-white">{{ $item->total_puntos }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_jugados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_ganados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_empatados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_perdidos }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->goles_a_favor }}</td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->goles_en_contra }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tabla puntaje primera --}}
        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center bg-sky-600 py-2 rounded-lg">
                <h1 class="uppercase text-h3 lg:text-h3 font-bold text-center text-white"> puntaje Primera Serie</h1>
            </div>
        </div>
        <div class="container mx-auto border border-gray-100 mt-5 rounded-lg overflow-x-auto px-2">

            <div class="flex  lg:justify-center overflow-x-auto">
                <table class="table-auto border-collapse mt-5 mb-5  min-w-max">
                    <thead>
                        <tr class="bg-header text-white">
                            <th class="px-4 py-2 text-left w-1 rounded-l-lg">Pos</th>
                            <th class="px-4 py-2 text-center">Club</th>
                            <th class="px-4 py-2 text-center w-3 bg-menu">PTS</th>
                            <th class="px-4 py-2 text-center w-1">PJ</th>
                            <th class="px-4 py-2 text-center w-1">PG</th>
                            <th class="px-4 py-2 text-center w-1">PE</th>
                            <th class="px-4 py-2 text-center w-1">PP</th>
                            <th class="px-4 py-2 text-center w-1">GF</th>
                            <th class="px-4 py-2 text-center w-1 rounded-r-lg">GC</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($primeras as $item)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="text-center text-gray-800 mt-1">{{ $loop->iteration }}</td>
                                <td class="flex items-center space-x-4 px-4 mt-1 mb-1whitespace-nowrap mr-2">
                                    <img src="{{ Storage::url($item->clubnombre->logo) }}"
                                        alt="{{ $item->clubnombre->clubnombre }}" class="h-6 w-6 flex-shrink-0">
                                    <span class=" lg:text-lg text-gray-800">{{ $item->clubnombre->nombre }}</span>
                                </td>
                                <td class="px-4 text-center  font-bold bg-menu text-white">{{ $item->total_puntos }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_jugados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_ganados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_empatados }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->partidos_perdidos }}
                                </td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->goles_a_favor }}</td>
                                <td class="px-4 text-center text-gray-800 font-light">{{ $item->goles_en_contra }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
