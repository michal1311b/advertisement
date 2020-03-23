$("#val1").text(0);
$("#val2").text(16000);

$("#range").change(function () {
    var sliderArr = $("#range").val().split(',');

    $("#val1").val(sliderArr[0]);
    $("#val1").text(sliderArr[0]);
    $("#val2").val(sliderArr[1]);
    $("#val2").text(sliderArr[1]);

});