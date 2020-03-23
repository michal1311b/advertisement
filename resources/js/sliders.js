var mySlider = $("#range").bootstrapSlider({
    min: 0,
    max: 100000,
    step: 20,
    value: [0, 16000],
    tooltip: 'always',
    range: true,
    ticks_tooltip: true,
    labelledby: ['ex18-label-2a', 'ex18-label-2b']
});

$('.customer-logos').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: false,
    dots: false,
        pauseOnHover: false,
        responsive: [{
        breakpoint: 768,
        settings: {
            slidesToShow: 3
        }
    }, {
        breakpoint: 520,
        settings: {
            slidesToShow: 2
        }
    }]
});