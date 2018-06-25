$(document).ready(function(){

    // Mobile NAV expand

    var i = 0;

    $('#brand .container .btn-expand button#btn-expand').click(function(){
        if (i === 0){
            $('header.header').animate({
                left : '0'
            }, 500);
            i = 1;
        } else {
            $('header.header').animate({
                left : '-100%'
        }, 500);
            i = 0;
        }
    });
});
