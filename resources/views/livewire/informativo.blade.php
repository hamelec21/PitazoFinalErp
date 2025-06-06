<div>
    @if(!empty($comunicado) && !empty($comunicado->comunicado))
    <section class="bg-red-50 border border-red-300 marca-agua">
        <div class="py-3 px-4 mx-auto max-w-screen-lg text-center lg:py-5">
            <h1 class="mb-4 text-xl font-extrabold tracking-tight leading-none text-red-950 md:text-h2 lg:text-h1">
                Comunicado Oficial
            </h1>
            <p class="mb-8 text-[18px] font-normal text-red-950 sm:px-16 text-justify">
                {{ strip_tags($comunicado->comunicado) }}
            </p>
        </div>
    </section>
@else

@endif

</div>
