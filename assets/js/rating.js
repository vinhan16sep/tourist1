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
	                word = res.captcha.word;
	            }
            }
        });
    });
    $('#captcha').change(function(){
    	console.log(word);
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
    					alert('Cám ơn bạn đã đánh giá!');
    					window.location.reload(true);
    				}else{
    					alert('Bạn đã đánh giá cho sản phẩm này rồi, không thể đánh giá thêm. Cảm ơn!');
    				}
    			}
    		});
    	}else{
    		if($('#captcha').val() == ''){
    			$('.message').text('Vui Lòng Nhập Trường Này');
    		}else{
    			$('.message').text('Mã không đúng, vui lòng kiểm tra lại');
    		}
    	}
    	
    })
});