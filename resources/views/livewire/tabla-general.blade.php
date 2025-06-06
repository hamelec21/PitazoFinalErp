<div>
<<<<<<< HEAD
    <div class="bg-menu w-full">
=======
    <div class=" w-full tabla">
>>>>>>> 9ed20951d27992a39ce8f0545525175b0a6d8696
        <div class="mx-auto  h-auto mt-2 mb-2">
            <div class="flex justify-center">
                <h2 class="text-white font-bold lg:text-h3 mt-5">Tabla de Puntaje General</h2>
            </div>
            <div class="flex justify-center items-center">
                <table class=" lg:w-1/2 table-auto border-collapse  mt-5 mb-5">
                    <thead>
                        <tr class="bg-header text-white">
                            <th class="px-4 py-2 text-center w-3">Pos</th>
                            <th class="px-4 py-2 text-center lg:w-20">Club</th>
                            <th class="px-4 py-2 text-center w-3 ">Puntos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resultados as $resultado)
                            <tr class="border-b hover:bg-sky-700">
                                <td class="text-center lg:text-center text-white mt-1">{{ $loop->iteration }}</td>
                                <td class="flex  space-x-4 px-4 mt-1 mb-1 items-center">
                                    <img src="{{ Storage::url($resultado->clubnombre->logo) }}" alt="{{ $resultado->clubnombre->clubnombre }}" class="h-10 w-10">
                                   <span class="text-[14px] lg:text-lg text-white">{{ $resultado->clubnombre->nombre }}</span>
                                </td>

                                <td class="px-4 text-center text-white font-bold">{{ $resultado->total_puntos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Tabla de Resultados -->

        </div>







    </div>


</div>
