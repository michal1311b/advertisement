$(document).ready(function() {
    let url = window.location.href;

    if(url.includes('?read=')) {
        var offset = 350; //Offset of 20px

        $('html, body').animate({
            scrollTop: $("#paginate").offset().top - offset
        }, 2000);
    }
});