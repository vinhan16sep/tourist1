$('.status-success').click(function(){
	var id = $(this).data('id');
	var url = HOSTNAMEADMIN + '/customize/status_success';

	if(confirm('Xác nhận đặt lịch?')){
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
	var url = HOSTNAMEADMIN + '/customize/status_cancel';

	if(confirm('Hủy đặt lịch?')){
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