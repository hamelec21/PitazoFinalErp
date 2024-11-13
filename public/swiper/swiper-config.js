function initializeSwiper(selector, config) {
    return new Swiper(selector, config);
}

// Configuración original
var originalConfig = {
    slidesPerView: 4, // Muestra 4 slides a la vez en pantallas grandes
    spaceBetween: 10, // Espacio entre slides
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        640: {
            slidesPerView: 2, // Muestra 3 slides a la vez en pantallas medianas
            spaceBetween: 10, // Espacio entre slides
        },
        1024: {
            slidesPerView: 7, // Muestra 7 slides a la vez en pantallas grandes
            spaceBetween: 10, // Espacio entre slides
        },
    },
};



// Inicializar el Swiper con la configuración original
var swiper1 = initializeSwiper('.swiper-container', originalConfig);

// Configuración personalizada
var customConfig = {
    slidesPerView: 2, // Muestra 2 slides a la vez en pantallas grandes
    spaceBetween: 2, // Espacio entre slides
    navigation: {
       nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        640: {
            slidesPerView: 2, // Muestra 2 slides a la vez en pantallas medianas
            spaceBetween: 5, // Espacio entre slides
        },
        1024: {
            slidesPerView: 4, // Muestra 3 slides a la vez en pantallas grandes
            spaceBetween: 10, // Espacio entre slides
        },
    },
};

// Inicializar otro Swiper con la configuración personalizada
var swiper2 = initializeSwiper('.custom-swiper-container', customConfig);
