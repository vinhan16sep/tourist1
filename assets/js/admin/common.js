$(document).ready(function(){
	$('.btn-remove').click(function(){
		var controller = $(this).data('controller');
		var id = $(this).data('id');
		var url = HOSTNAME + 'admin/' + controller + '/remove';
		
		if(confirm('Chắc chắn xóa?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_myielts_token : csrf_hash
            },
            success: function(response){
                if(response.status == 200){
                    csrf_hash = response.reponse.csrf_hash;
                    $('.remove_' + id).fadeOut();
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
	});

    function formatNumber(nStr, decSeperate, groupSeperate) {
        nStr += '';
        x = nStr.split(decSeperate);
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
        }
        return x1 + x2;
    }

    $('#price_shared').on('input', function(e){        
        $(this).val(formatCurrency(this.value.replace(/[,VNĐ]/g,'')));
    }).on('keypress',function(e){
        if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
    }).on('paste', function(e){    
        var cb = e.originalEvent.clipboardData || window.clipboardData;      
        if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
    });
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('');
    }
    
});
var csrf_hash = $("input[name='csrf_myielts_token']").val();
function remove(controller, id){
    var url = HOSTNAMEADMIN + '/' + controller + '/remove';
    if(confirm('Chắc chắn xóa?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_myielts_token : csrf_hash
            },
            success: function(response){
                csrf_hash = response.reponse.csrf_hash;
                if(response.status == 200 && response.isExisted == true){
                    console.log(response);
                    console.log(response.message);
                    if(response.message != 'undefined'){
                        alert(response.message);
                    }
                    $('.remove_' + id).fadeOut();
                }
                if(response.status == 200 && response.isExisted == false){
                    alert('Danh mục này có chứa bài viết. Vui lòng xóa bài viết trước sau đó thực hiện lại thao tác');
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
                if(jqXHR.status == 404 && jqXHR.responseJSON.message != 'undefined'){
                    alert(jqXHR.responseJSON.message);
                    location.reload();
                }
            }
        });
    }
}
function remove_image(controller, id, image, key){
    var url = HOSTNAMEADMIN + '/' + controller + '/remove_image';
    if(confirm('Chắc chắn xóa ảnh này?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_myielts_token : csrf_hash, image : image
            },
            success: function(response){
                if(response.status == 200){
                    csrf_hash = response.reponse.csrf_hash;
                    $('.row_' + key).fadeOut();
                    $("input[name='csrf_myielts_token']").val(csrf_hash);
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
}
function errorHandle(jqXHR, exception){
    if (jqXHR.status === 0) {
        return ('Not connected.\nPlease verify your network connection.');
    } else if (jqXHR.status == 404) {
        return ('The requested page not found.');
    }  else if (jqXHR.status == 401) {
        return ('Sorry!! You session has expired. Please login to continue access.');
    } else if (jqXHR.status == 500) {
        return ('Internal Server Error.');
    } else if (exception === 'parsererror') {
        return ('Requested JSON parse failed.');
    } else if (exception === 'timeout') {
        return ('Time out error.');
    } else if (exception === 'abort') {
        return ('Ajax request aborted.');
    }

    return ('Unknown error occurred. Please try again.');
}