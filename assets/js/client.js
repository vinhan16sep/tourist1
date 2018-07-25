var csrf_hash = $("input[name='csrf_diamondtour_token']").val();
$("#inquire input,#customize input,#inquire #inquire_title,#customize #customize_title,#inquire textarea,#customize textarea").change(function(event) {
	name = $(this).attr("name");
	targetTab = "#inquire";
	if($(this).closest('.tab-pane').attr('id') == "inquire"){
		targetTab = "#customize";
	}
	$(targetTab + ' [name="'+name+'"]').val($(this).val());
});
var language = $("#language").val();
var inquire_required = {
		inquire_email:{vi:'Vui lòng nhập Email.', en:'Please enter Email.'},
		inquire_email_confirm:{vi:'Vui lòng nhập lại Email.', en:'The Confirmation Email must match your Email Address.'},
		inquire_first_name:{vi:'Vui lòng nhập Họ của ban.', en:'Please enter first name.'},
		inquire_last_name:{vi:'Vui lòng nhập Tên của ban.', en:'Please enter last name.'},
		inquire_phone_number:{vi:'Vui lòng nhập số điện thoại.', en:'Please enter your phone number.'},
		datepicker:{vi:'Vui lòng nhập ngày sẵn sàng.', en:'Please enter preferred departure date.'},
		inquire_country:{vi:'Vui lòng nhập quốc tịch.', en:'Please enter Country.'},
		inquire_number_adults:{vi:'Vui lòng nhập số người lớn đi.', en:'Please enter Adults.'},
		inquire_number_children_u11:{vi:'Vui lòng nhập số trẻ em đi.', en:'Please enter Children (2-11 years old).'},
		inquire_number_children_u2:{vi:'Vui lòng nhập số em bé đi.', en:'Please enter Children (Under 2 years old).'}
	};
$(document).off("click","#bookingsubmit,#customizesubmit").on("click","#bookingsubmit,#customizesubmit",function(){
	var idForm = $(this).parents('form')[0].id;
	$('#'+idForm).validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).addClass("input-error");
			$(element).closest('.col-xs-12').addClass("has-errors");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.col-xs-12').removeClass("has-errors");
			$(element).removeClass("input-error");
		},
		rules: {
			inquire_email: {
				required: true
			},
			inquire_first_name: {
				required: true
			},
			inquire_last_name: {
				required: true
			},
			inquire_email_confirm: {
				required: true
			},
			inquire_phone_number: {
				required: true
			},
			datepicker: {
				required: true
			},
			inquire_country: {
				required: true
			},
			inquire_number_adults: {
				required: true
			},
			inquire_number_children_u11: {
				required: true
			},
			inquire_number_children_u2: {
				required: true
			}
		},
		messages: {
			inquire_email: {
				required: inquire_required.inquire_email[language]
			},
			inquire_first_name: {
				required: inquire_required.inquire_first_name[language]
			},
			inquire_last_name: {
				required: inquire_required.inquire_last_name[language]
			},
			inquire_email_confirm: {
				required: inquire_required.inquire_email_confirm[language]
			},
			inquire_phone_number: {
				required: inquire_required.inquire_phone_number[language]
			},
			datepicker: {
				required: inquire_required.datepicker[language]
			},
			inquire_country: {
				required: inquire_required.inquire_country[language]
			},
			inquire_number_adults: {
				required: inquire_required.inquire_number_adults[language]
			},
			inquire_number_children_u11: {
				required: inquire_required.inquire_number_children_u11[language]
			},
			inquire_number_children_u2: {
				required: inquire_required.inquire_number_children_u2[language]
			}
		},

	});
	var content = [];
	if($("#"+idForm+" [name^=tour_change]").length > 0 && idForm == 'form-customize'){
		$("#"+idForm+" [name^=tour_change]").each(function(key,value){
			content[key] = $(value).val();
		});
	}
	if($("#"+idForm).valid() === true){
		if(idForm == 'form-customize'){
			url = "http://localhost/tourist1/customize";

		}else{
			url = "http://localhost/tourist1/booking";
		}
        $.ajax({
            method: "post",
            url: url,
            data: {
                title : $("#"+idForm+" [name=inquire_title]").val(),
                product_id : $("[name=product_id]").val(),
                email : $("#"+idForm+" [name=inquire_email]").val(),
                first_name : $("#"+idForm+" [name=inquire_first_name]").val(),
                last_name : $("#"+idForm+" [name=inquire_last_name]").val(),
                email_confirm : $("#"+idForm+" [name=inquire_email_confirm]").val(),
                phone : $("#"+idForm+" [name=inquire_phone_number]").val(),
                time : $("#"+idForm+" [name=datepicker]").val(),
                country : $("#"+idForm+" [name=inquire_country]").val(),
                adults : $("#"+idForm+" [name=inquire_number_adults]").val(),
                children : $("#"+idForm+" [name=inquire_number_children_u11]").val(),
                infants : $("#"+idForm+" [name=inquire_number_children_u2]").val(),
                message : $("#"+idForm+" [name=inquire_message]").val(),
                content : content,
                csrf_diamondtour_token : csrf_hash
            },
			success: function(response){
				if(response.status == 200){
					csrf_hash = response.reponse.csrf_hash;
					if (response.isExisted == true) {
						alert(response.message);
						location.reload();
					}else{
						alert(response.message);
					}
				}
			},
			error: function(jqXHR, exception){
				location.reload();
			}
        });
	}else{
		$("#"+idForm+" .col-xs-12.has-errors input[name^=inquire_]")[0].focus();
	}
});