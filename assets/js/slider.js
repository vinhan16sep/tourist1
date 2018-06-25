$(document).ready(function(){

    $('.slider').carousel({ interval: 3000 });

    $('.slider .item').each(function(){
        var itemToClone = $(this);

        for (var i=1;i<3;i++) {
            itemToClone = itemToClone.next();

            if (!itemToClone.length) {
                itemToClone = $(this).siblings(':first');
            }

            itemToClone.children(':first-child').clone()
                .addClass("cloneditem-"+(i))
                .appendTo($(this));
        }
    });
});