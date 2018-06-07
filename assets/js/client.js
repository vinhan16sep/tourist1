switch(window.location.origin){
    case 'http://myielts.vn':
        var HOSTNAME = 'http://myielts.vn/';
        break;
    default:
        var HOSTNAME = 'http://localhost/myielts/';
}
$(document).ready(function(){
	var csrf_hash = $("input[name='csrf_myielts_token']").val();
	$('#register-form').validate({
		submitHandler: function () {
        	var url = HOSTNAME + 'client/register';
        	var name = $('#register_name').val();
        	var email = $('#register_mail').val();
        	var phone = $('#register_phone').val();
        	var age = $('#register_age').val();
        	var company = $('#register_workplace').val();
        	var password = $('#register_password').val();
        	$.ajax({
                method: "post",
                url: url,
                data: {
                    name : name, email : email, phone : phone, age : age, company : company, password : password, csrf_myielts_token : csrf_hash
                },
                beforeSend: function() {
                	$("#encypted_ppbtn").show();
                },
                success: function(response){
                    $("#encypted_ppbtn").css('display','none');
                    if(response.status == 200){
                    	csrf_hash = response.reponse.csrf_hash;
                    	$("input[name='csrf_myielts_token']").val(response.reponse.csrf_hash);
                    	if (response.isExits == true) {
                    		alert('Đăng ký tài khoản thành công. Vui lòng đăng nhập!');
                    		location.reload();
                    		// window.location.href = HOSTNAME + "client/login";
                    	}else{
                    		alert('Vui lòng điển đầy đủ thông tin');
                    	}
                    }
                },
                error: function(jqXHR, exception){
                    // console.log(errorHandle(jqXHR, exception));
                }
            });
        },
		rules: {
			register_name: {
				required: true
			},
			register_mail: {
				required: true,
				email: true,
				remote: {
					url: HOSTNAME + "client/register_email_exists",
					type: "get",
					data: {
						email: $('#register_mail').val(), csrf_myielts_token : csrf_hash
					}
				}
			},
			register_phone: {
				required: true,
				number: true
			},
			register_password: {
				required: true,
				minlength: 6
			},
			register_confirm_password: {
				required: true,
				equalTo: "#register_password"
			}
		}, 
		messages: {
			register_name: {
				required: "FULL NAME field is required."
			},
			register_mail: {
				required: "EMAIL field is required.",
				email: "EMAIL field must contain a valid email address.",
				remote: "EMAIL already used."
			},
			register_phone: {
				required: "YOUR PHONE NUMBER field is required.",
				number: "YOUR PHONE NUMBER field must contain only numbers."
			},
			register_password: {
				required: "PASSWORD field is required.",
				minlength: "PASSWORD field must be at least 6 characters in length."
			},
			register_confirm_password: {
				required: "CONFIRM PASSWORD field is required.",
				equalTo: "CONFIRM PASSWORD field does not match the PASSWORD field."
			}
		}
	});

	$('#register-courses-form').validate({
		submitHandler: function () {
        	var url = HOSTNAME + 'client/register_courses';
        	var name = $('#register-courses-name').val();
        	var email = $('#register-courses-mail').val();
        	var phone = $('#register-courses-phone').val();
        	var age = $('#register-courses-age').val();
        	var company = $('#register-courses-workplace').val();
        	var courses_id = $('#courses-id').val();
        	$.ajax({
                method: "post",
                url: url,
                data: {
                    name : name, email : email, phone : phone, age : age, company : company, courses_id : courses_id, csrf_myielts_token : csrf_hash
                },
                beforeSend: function() {
                	$("#encypted_ppbtn").show();
                },
                success: function(response){
                    $("#encypted_ppbtn").css('display','none');
                    if(response.status == 200){
                    	csrf_hash = response.reponse.csrf_hash;
                    	$("input[name='csrf_myielts_token']").val(response.reponse.csrf_hash);
                    	if (response.isExits == true) {
                    		alert('Đăng ký khóa học thành công!');
                    		$('#register-courses-name').val('');
                    		$('#register-courses-mail').val('');
                    		$('#register-courses-phone').val('');
                    		$('#register-courses-age').val('');
                    		$('#register-courses-workplace').val('');
                    		// window.location.href = HOSTNAME + "client/login";
                    	}else{
                    		alert('Vui lòng điển đầy đủ thông tin');
                    	}
                    }
                },
                error: function(jqXHR, exception){
                    // console.log(errorHandle(jqXHR, exception));
                }
            });
        },
		rules: {
			register_courses_name: {
				required: true
			},
			register_courses_mail: {
				required: true,
				email: true
			},
			register_courses_phone: {
				required: true,
				number: true
			}
		}, 
		messages: {
			register_courses_name: {
				required: "FULL NAME field is required."
			},
			register_courses_mail: {
				required: "EMAIL field is required.",
				email: "EMAIL field must contain a valid email address."
			},
			register_courses_phone: {
				required: "YOUR PHONE NUMBER field is required.",
				number: "YOUR PHONE NUMBER field must contain only numbers."
			}
		}
	});
});