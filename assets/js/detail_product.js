if($('#count-comment').val() > 5){
	$('#comment_readmore').css('display', 'block');
}

$('.submit-comment').click(function(e){
	e.preventDefault();
	var name = $('#name').val();
	var email = $('#email').val();
	var content = $('#content').val();
	var product_id = $('#product_id').val();
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(name.length == 0){
		$('.name_error').text('Họ và Tên không được trống!');
	}else{
		$('.name_error').text('');
	}

	if(email.length == 0){
		$('.email_error').text('Email không được trống!');
	}
	else{
		$('.email_error').text('');
	}

	if(content.length == 0){
		$('.content_error').text('Nội dung không được trống!');
	}
	else{
		$('.content_error').text('');
	}
	if(name.length != 0 && email.length != 0 && content.length != 0){

		if(filter.test(email)){
			$('.submit-comment').attr('disabled','disabled');
			$('.cmt_error').hide();
			jQuery.ajax({
				type: "get",
	                // url: "http://localhost/tourist1/comment/create_comment",
	                url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tourist1/comment/create_comment",
	                data: {name : name, email : email, content : content, product_id : product_id},
	                success: function(result){
	                	if ($('#count-comment').val() != 0) {
	                		$('#comment > .show-comment > .cmt:first-child').before(JSON.parse(result).comment);
	                	}else{
	                		$('#comment > .cmt:first-child').before(JSON.parse(result).comment);
	                	}
	                	
	                	$('#name').val('');
	                	$('#email').val('');
	                	$('#content').val('');
	                	$('.submit-comment').removeAttr('disabled');
	                }
	            })
		}else{
			$('.email_error').text('Định dạng email không đúng, Vui lòng kiểm tra lại!');
		}

	}

	return false;
});


	// see more comment
	var page = 1;
	$('#comment_readmore').click(function () {
		var product_id = $('#product_id').val();
		page ++;
		jQuery.ajax({
			type: "get",
            // url: "http://localhost/tuoithantien/comment/see_more_comment",
            url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tourist1/comment/see_more_comment",
            data: {page : page, product_id : product_id},
            success: function(result){
            	console.log(result);
            	comment = result.comment;
            	// var html = '';
            	$.each(comment, function(key, value) {
            		html = '<div class="media cmt">'
            		+ '<div class="media-left">'
            		+ '<img class="media-object" src="' + location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + '/tourist1/assets/img/comment_ava.png" alt="Comment Avatar" width="64">'
            		+ '</div>'
            		+ '<div class="media-body">'
            		+ '<h3 class="media-heading" style="color: #f4aa1c">'+ value.name +':</h3>'
            		+ '<span>'+ value.content +'</span>'
            		+ '<span style="float: right; font-size: 1em">'+ value.created_at +'</span>'
            		+ '</div>'
            		+ '</div>';
            		$('.show-comment').append(html);
            	});
            	
            	
            	if(result.stop >= page){
            		$('#comment_readmore').fadeOut();
            	}
            }
        })
	});