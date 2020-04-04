$(".blue-tooltip").tooltip({});

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$('#envelope').hover(function () {
    $(this).removeClass('fa-envelope');
    $(this).addClass('fa-envelope-open-text');
}, function () {
    $(this).removeClass('fa-envelope-open-text');
    $(this).addClass('fa-envelope');
});

$(document).click(function (event) {
    var clickover = $(event.target);
    var _opened = $(".navbar-collapse").hasClass("show");
    if (_opened === true && !clickover.hasClass("navbar-toggler")) {
        $(".navbar-toggler").click();
    }
});