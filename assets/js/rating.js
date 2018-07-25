$(function () {
	$('#rateit_star').rateit({min: 0, max: 5, step: 0.5});
	$('#rateit_star').bind('rated', function (e) {
		var ri = $(this);
		var value = ri.rateit('value');
		var productID = ri.data('productid');
		$('#re_rateit').val(value);
    	// ri.rateit('readonly', true);
	});
});
var language = $("#language").val();
console.log(language);
var ratings = {
        thank:{vi:'Cám ơn bạn đã đánh giá!', en:'Thanks for your review!'},
        thank_you:{vi:'Bạn đã đánh giá cho sản phẩm này rồi, không thể đánh giá thêm. Cảm ơn!', en:'You have already rated this product, you can not add it. Thank you!'},
        please:{vi:'Vui Lòng Nhập Trường Này', en:'Please enter this school'},
        code_error:{vi:'Mã không đúng, vui lòng kiểm tra lại', en:'Incorrect code, please check again'},
    };
$(document).ready(function(){
    var url_captcha = $('.created_captcha').val();
    var url_rating = $('.created_rating').val();
	var word = '';
	$(window).each(function() {
        jQuery.ajax({
            type: "get",
            url: url_captcha,
            success: function(res) {
	            if (res.captcha){
	                jQuery("div.image").html(res.captcha.image);
                    jQuery("div.image img").css({'height':'35px','padding':'0px','padding-left':'5px','width':'97%'});
	                word = res.captcha.word;
	            }
            }
        });
    });
    $(".refresh").click(function() {
    	$('.btn-rating').prop('disabled', true);
        jQuery.ajax({
            type: "get",
            url: url_captcha,
            success: function(res) {
	            if (res.captcha){
                    jQuery("div.image").html(res.captcha.image);
                    console.log(res.captcha.image);
	                jQuery("div.image img").css({'height':'35px','padding':'0px','padding-left':'5px','width':'97%'});
	                word = res.captcha.word;
	            }
            }
        });
    });
    $('#captcha').change(function(){
        if($(this).val() == word){
            $('.btn-rating').prop('disabled', false);
        }
    })
    $('.btn-rating').click(function(){
    	var product_id = $('.product_id').val();
    	if($('#re_rateit').val() != ''){
    		var rating = $('#re_rateit').val();
    	}else{
    		rating = 0
    	}
    	if($('#captcha').val() == word){
    		jQuery.ajax({
    			type: "get",
    			url: url_rating,
    			data: {
    				product_id : product_id, rating : rating
    			},
    			success: function(res) {
    				if(res.isExits == true){
    					alert(ratings.thank[language]);
    					window.location.reload(true);
    				}else{
    					alert(ratings.thank_you[language]);
    				}
    			}
    		});
    	}else{
    		if($('#captcha').val() == ''){
    			$('.message').text(ratings.please[language]);
    		}else{
    			$('.message').text(ratings.code_error[language]);
    		}
    	}
    	
    })
});