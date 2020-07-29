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