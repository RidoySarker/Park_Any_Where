// /* Scroll Top */
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 40) {
            $("#topBtn").fadeIn();
        } else {
            $("#topBtn").fadeOut();
        }
    });

    $("#topBtn").click(function () {
        $("html ,body").animate({ scrollTop: 0 }, 800);
    });
    
});
// /* Scroll Top */

// PreLoader Start
var preloader = document.getElementById("loading");
function PreLoaderFunction(){
    preloader.style.display = 'none';
};
// PreLoader End

// -----------
// Booking Section Start
// ----------- 

(function ($) {
    // USE STRICT
    "use strict";
    $("#date_from").datepicker({
        dateFormat: "dd-mm-yy",
        showOn: "both",
        buttonText: '<i class="zmdi zmdi-calendar-alt"></i>',
    });

    $("#date_to").datepicker({
        dateFormat: "dd-mm-yy",
        showOn: "both",
        buttonText: '<i class="zmdi zmdi-calendar-alt"></i>',
    });

})(jQuery);
function Tang() {
    var x = document.getElementById("quantity").value;//lay gia tri cu trong text
    if (parseInt(x) >= 0) {
        document.getElementById("quantity").value = parseInt(x) + 1;// + gia tri lay dc len 1 roi gan kq vao o text
    }
}
function Giam() {
    var x = document.getElementById("quantity").value;
    if (parseInt(x) >= 1) {
        document.getElementById("quantity").value = parseInt(x) - 1;
    }
}

// -----------
// Booking Section End
// ----------- 