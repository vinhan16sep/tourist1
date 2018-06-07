$(document).ready(function(){
	var csrf_hash = $("input[name='csrf_myielts_token']").val();
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