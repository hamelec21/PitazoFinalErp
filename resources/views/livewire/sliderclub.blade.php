<div>
    <!-- Estructura del carrusel -->

    <div class="container mx-auto -mt-5 mb-1 lg:mt-5 lg:mb-8">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($clubes as $club)
                    <div class="swiper-slide">
                            <div class="bg-gray-100 flex justify-center lg:h-48 h-14 items-center">
                                <img src="{{ Storage::url($club->logo) }}" class="w-[48px]  lg:w-[120px]" alt="{{ $club->logo }}" >
                            </div>

                            <div class="flex justify-center ">
                               <span class="text-center  text-[10px] lg:text-lg">{{$club->nombre}}</span>
                            </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
