var csrf_hash = $("input[name='csrf_diamondtour_token']").val();
$("[href$=customize],[href$=inquire]").click(function(){
    var href = '#customize';
    if($(this)[0].hash == '#customize'){
        href = '#inquire';
    }
    $($(this)[0].hash+" [name=inquire_title]").val($(href+" [name=inquire_title]").val());
    $($(this)[0].hash+" input[name=inquire_first_name]").val($(href+" input[name=inquire_first_name]").val());
    $($(this)[0].hash+" input[name=inquire_last_name]").val($(href+" input[name=inquire_last_name]").val());
    $($(this)[0].hash+" input[name=inquire_email]").val($(href+" input[name=inquire_email]").val());
    $($(this)[0].hash+" input[name=inquire_email_confirm]").val($(href+" input[name=inquire_email_confirm]").val());
    $($(this)[0].hash+" input[name=inquire_phone_number]").val($(href+" input[name=inquire_phone_number]").val());
    $($(this)[0].hash+" input[name=datepicker]").val($(href+" input[name=datepicker]").val());
    $($(this)[0].hash+" input[name=inquire_country]").val($(href+" input[name=inquire_country]").val());
    $($(this)[0].hash+" input[name=inquire_number_adults]").val($(href+" input[name=inquire_number_adults]").val());
    $($(this)[0].hash+" input[name=inquire_number_children_u11]").val($(href+" input[name=inquire_number_children_u11]").val());
    $($(this)[0].hash+" input[name=inquire_number_children_u2]").val($(href+" input[name=inquire_number_children_u2]").val());
});
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
				required: "Vui lòng nhập Email."
			},
			inquire_first_name: {
				required: "Vui lòng nhập first name."
			},
			inquire_last_name: {
				required: "Vui lòng nhập last name."
			},
			inquire_email_confirm: {
				required: "Vui lòng nhập lại Email."
			},
			inquire_phone_number: {
				required: "Vui lòng nhập số điện thoại."
			},
			datepicker: {
				required: "Vui lòng nhập ngày sẵn sàng."
			},
			inquire_country: {
				required: "Vui lòng nhập quốc tịch."
			},
			inquire_number_adults: {
				required: "Vui lòng nhập số người lớn đi."
			},
			inquire_number_children_u11: {
				required: "Vui lòng nhập số trẻ em đi."
			},
			inquire_number_children_u2: {
				required: "Vui lòng nhập số em bé đi."
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
			url = "http://diamondtour.vn/customize";

		}else{
			url = "http://diamondtour.vn/booking";
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
				console.log(response);
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