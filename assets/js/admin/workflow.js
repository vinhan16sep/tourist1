$('.status-success').click(function(){
	var id = $(this).data('id');
	var controller = $(this).data('controller');
	var url = HOSTNAMEADMIN + '/'+ controller +'/status_success';
	switch(controller){
		case 'booking':
			var message = 'Xác nhận đặt lịch?'
			break;
		case 'customize': 
			var message = 'Xác nhận tùy biến của khách hàng'
			break;
	}

	if(confirm(message)){
		$.ajax({
			method: "get",
			url: url,
			data: {
				id : id
			},
			success: function(response){
				if (response.status == 200) {
					$('.row-status-'+ id).fadeOut();
				}
				
			},
			error: function(jqXHR, exception){
				// console.log(errorHandle(jqXHR, exception));
			}
		});
	}
});


$('.status-cancel').click(function(){
	var id = $(this).data('id');
	var controller = $(this).data('controller');
	var url = HOSTNAMEADMIN + '/'+ controller +'/status_cancel';

	switch(controller){
		case 'booking':
			var message = 'Hủy đặt lịch?'
			break;
		case 'customize': 
			var message = 'Hủy tùy biến của khách hàng'
			break;
	}
	
	if(confirm(message)){
		$.ajax({
			method: "get",
			url: url,
			data: {
				id : id
			},
			success: function(response){
				if (response.status == 200) {
					$('.row-status-'+ id).fadeOut();
				}
				
			},
			error: function(jqXHR, exception){
				// console.log(errorHandle(jqXHR, exception));
			}
		});
	}
});