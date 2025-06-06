<div>
    <div class="mt-20 lg:mt-5 mb-10">

        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center  py-1 rounded-lg">
                <h1 class="uppercase text-h4 lg:text-h3 font-bold text-center text-gray-600">Campeonato Femenino</h1>
            </div>
        </div>

        <div class="bg-gray-100 mx-auto border border-gray-200 mt-2  overflow-x-auto px-1">
            <div class="flex flex-col items-center py-2  mt-1">
                <h1 class="text-h4 lg:text-h3 font-bold text-center text-gray-600">Tabla de Puntaje </h1>
            </div>

<<<<<<< HEAD
            <div class="w-full bg-white rounded-2xl shadow-lg p-4 md:p-6">
    <h2 class="text-xl md:text-2xl font-bold text-gray-800 text-center mb-4">
        🏆 Tabla General
    </h2>
    <div class="overflow-x-auto">
        <table class="min-w-[800px] w-full table-auto text-sm md:text-base text-center border-collapse">
            <thead class="sticky top-0 bg-gray-50 z-10 shadow-sm">
                <tr class="text-gray-600 uppercase text-xs md:text-sm">
                    <th class="px-3 py-2">#</th>
                    <th class="px-3 py-2">Logo</th>
                    <th class="px-3 py-2 text-left">Club</th>
                    <th class="px-3 py-2">PTS</th>
                    <th class="px-3 py-2">GF</th>
                    <th class="px-3 py-2">GC</th>
                    <th class="px-3 py-2">DG</th>
                    <th class="px-3 py-2">PJ</th>
                    <th class="px-3 py-2">PG</th>
                    <th class="px-3 py-2">PP</th>
                    <th class="px-3 py-2">PE</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach ($resultados as $index => $item)
                    <tr class="hover:bg-gray-50 transition duration-150 border-t border-gray-200">
                        <td class="px-3 py-3 font-semibold">{{ $index + 1 }}</td>
                        <td class="px-3 py-3">
                            <img
                                src="{{ $item['club_logo'] }}"
                                alt="{{ $item['club_nombre'] }}"
                                width="32"
                                height="32"
                                class="mx-auto object-contain"
                                style="width: 2rem; height: 2rem;"
                            >
                        </td>
                        <td class="px-3 py-3 text-left font-medium whitespace-nowrap">
                            {{ $item['club_nombre'] }}
                        </td>
                        <td class="px-3 py-3 font-bold text-gray-900">
                            {{ $item['total_puntos'] }}
                        </td>
                        <td class="px-3 py-3">{{ $item['goles_a_favor'] }}</td>
                        <td class="px-3 py-3">{{ $item['goles_en_contra'] }}</td>
                        <td class="px-3 py-3 font-semibold
                            @if ($item['diferencia_goles'] > 0) text-green-600
                            @elseif ($item['diferencia_goles'] < 0) text-red-600
                            @else text-gray-700 @endif">
                            {{ $item['diferencia_goles'] > 0 ? '+' : '' }}{{ $item['diferencia_goles'] }}
                        </td>
                        <td class="px-3 py-3">{{ $item['partidos_jugados'] }}</td>
                        <td class="px-3 py-3">{{ $item['partidos_ganados'] }}</td>
                        <td class="px-3 py-3">{{ $item['partidos_perdidos'] }}</td>
                        <td class="px-3 py-3">{{ $item['partidos_empatados'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

        </div>
    </div>
</div>

=======
            <div class="flex justify-center w-full overflow-x-auto">
                <table class="table-auto border-collapse mt-5 mb-5 min-w-max">
                    <thead>
                        <tr class="bg-header text-white">
                            <th class="px-1 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">Pos</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">Club</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg bg-violet-600">PTS</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PJ</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PG</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PE</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">PP</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">GF</th>
                            <th class="px-0 py-2 text-center text-[10px] md:text-[16px] lg:text-lg">GC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($femeninas as $item)
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
                                    class="px-[13px] md:px-4 text-center text-[10px] md:text-[16px] lg:text-lg font-bold bg-violet-600 text-white">
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

>>>>>>> 9ed20951d27992a39ce8f0545525175b0a6d8696
