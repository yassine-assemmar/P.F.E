function afficherCommentaires(e) {
    var div_list_com = e.parentNode;
    var list_com = div_list_com.childNodes;
    for (var i = 0; i < list_com.length; i++) {
        if (list_com[i].className == 'commentaire') {
            list_com[i].style.display = "flex";
        }
    }
}
// ------------------- JS inscription-----------


var totalSteps = $(".steps li").length;

$(".steps li:nth-of-type(1)").addClass("active");
$(".myContainer .form-container:nth-of-type(1)").addClass("active");

$(".form-container").on("click", ".next", function() {
    $(".steps li")
        .eq(
            $(this)
            .parents(".form-container")
            .index() + 1
        )
        .addClass("active");
    $(this)
        .parents(".form-container")
        .removeClass("active")
        .next()
        .addClass("active flipInX");
});

$(".form-container").on("click", ".back", function() {
    $(".steps li")
        .eq(
            $(this)
            .parents(".form-container")
            .index() - totalSteps
        )
        .removeClass("active");
    $(this)
        .parents(".form-container")
        .removeClass("active flipInX")
        .prev()
        .addClass("active flipInY");
});

$(".steps li").on("click", function() {
    var stepVal = $(this)
        .find("span")
        .text();
    $(this)
        .prevAll()
        .addClass("active");
    $(this).addClass("active");
    $(this)
        .nextAll()
        .removeClass("active");
    $(".myContainer .form-container").removeClass("active flipInX");
    $(".myContainer .form-container:nth-of-type(" + stepVal + ")").addClass(
        "active flipInX"
    );
});
// to top
jQuery(function() {
    $(function() {
        $(window).scroll(function() { //Fonction appelée quand on descend la page
            if ($(this).scrollTop() > 200) { // Quand on est à 200pixels du haut de page,
                $('#scrollUp').css('right', '10px'); // Replace à 10pixels de la droite l'image
            } else {
                $('#scrollUp').removeAttr('style'); // Enlève les attributs CSS affectés par javascript
            }
        });
    });
});
// WHO ARE WE
$(document).ready(function() {
    var divs = $("header");
    var range = 200;
    $(window).on("scroll", function() {
        var st = $(this).scrollTop();
        divs.each(function() {
            var offset = $(this).offset().top;
            var height = $(this).outerHeight();
            offset = offset + height / 2;
            $(this).css({
                opacity: 1 - (st - offset + range) / range
            });
        });
    });
});
